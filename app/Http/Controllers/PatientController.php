<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use DB;
use App\Models\Patient;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

/** ------------ Patient Identification ID Generator --------------
 * @param int $registryCount
 */
function generatePatientNumber(int $registryCount): string
{
    $number = $registryCount + 1; //sequence stepper
    $year = date('Y') % 100;
    $month = date('m');
    $day = date('d');
    $label = $year . $month . $day . $number;
    $reg_num = strval($label);

    return $reg_num;
}

/* ------------------------------------------------------------ */

class PatientController extends Controller
{
    /**
     * Display a listing of patients.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::orderBy('id')->get();

        return view('patient.patients_list', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patient.register_patient');
    }

    /**
     * Store a newly created patient resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'contactnumber' => 'required',
            'address' => 'required',
            'sex' => 'required',
            'dob' => 'required'
        ]);

        try {

            $today_registrations = (int)Patient::whereDate('created_at', date("Y-m-d"))->count();
            $reg_num = generatePatientNumber($today_registrations);

            $patient = new Patient([
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'email' => $request->get('email'),
                'registration_id' => $reg_num,
                'contactnumber' => $request->get('contactnumber'),
                'address' => $request->get('address'),
                'sex' => $request->get('sex'),
                'dob' => $request->get('dob'),
                'birth_place' => $request->get('birth_place'),
                'nationality' => $request->get('nationality'),
                'religion' => $request->get('religion'),
                'language' => $request->get('language'),
                'guardian' => $request->get('guardian'),
                'guardian_address' => $request->get('guardian_address'),
                'guardian_contact' => $request->get('guardian_contact'),
                'occupation' => $request->get('occupation'),
                'nrc' => $request->get('nrc'),
                'image' => $request->get('image')
            ]);

            $patient->save();
            session()->flash('pid', "$reg_num");

            $image = $request->image; // base64 encoded profile picture
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            \Storage::disk('local')->put("public/" . $reg_num . ".png", base64_decode($image));

            return redirect('/patients')->with('success', 'Patient ' . $request->first_name . ' created successfully.');
        } catch (\Exception $e) {
            $code = $e->getCode();
            $message = $e->getMessage();
            $error_response = 'Error enrolling patient[' . $request->first_name . '] due to; ' . $message . '. Response Status=' . $code;
            Log::error($error_response);

            if ($code == '23000') {
                session()->flash('regfail', 'Patient ' . $request->first_name . ' is already registered!');
                Log::notice('Patient registration duplication disallowed.');
                return redirect()->back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Patient  patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        $patient_id = $patient->id;
        $appointment = DB::table('appointments')
            ->where('patient_id', $patient_id)
            ->whereNull('deleted_at')
            ->get();
        $outpatient = DB::table('outpatients')
            ->where('patient_id', $patient_id)
            ->whereNull('deleted_at')
            ->get();
        $inpatient = DB::table('inpatients')
            ->where('patient_id', $patient_id)
            ->whereNull('deleted_at')
            ->get();
        $medicines = Medicine::all();
        $pharmacy = DB::table('pharmacies')
            ->join('medicines', 'pharmacies.dispensation_id', '=', 'medicines.id')
            ->select(
                'pharmacies.*',
                'medicines.name',
            )
            ->whereNull('pharmacies.deleted_at')
            ->orderBy('pharmacies.created_at', 'DESC')
            ->get();
        $wardens = DB::table('users')->where('user_type', 'Nurse')->get();

        return view(
            'patient.show_patient', [
                'patient' => $patient,
                'appointments' => $appointment,
                'outpatients' => $outpatient,
                'inpatients' => $inpatient,
                'pharmacies' => $pharmacy,
                'medicines' => $medicines,
                'wardens' => $wardens
            ]
        );
    }

    public function edit($id)
    {
        $patient = Patient::find($id);
        return view('patient.edit_patient', compact('patient'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'contactnumber' => 'required',
            'address' => 'required',
            'sex' => 'required',
            'dob' => 'required'
        ]);
        $patient = Patient::find($id);

        $patient->first_name = $request->get('first_name');
        $patient->last_name = $request->get('last_name');
        $patient->email = $request->get('email');
        $patient->contactnumber = $request->get('contactnumber');
        $patient->address = $request->get('address');
        $patient->sex = $request->get('sex');
        $patient->dob = $request->get('dob');
        $patient->birthdate = $request->get('birth_place');
        $patient->nationality = $request->get('nationality');
        $patient->religion = $request->get('religion');
        $patient->language = $request->get('language');
        $patient->guardian = $request->get('guardian');
        $patient->guardian_address = $request->get('guardian_address');
        $patient->guardian_contact = $request->get('guardian_contact');
        $patient->occupation = $request->get('occupation');
        $patient->nrc = $request->get('nrc');
        $patient->image = $request->get('image');
        $patient->save();
        return redirect("/patients/${id}")->with('success', 'Patient updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     *
     */
    public function destroy($id)
    {
        $patient = Patient::find($id);
        $patient->delete();
        return redirect('/patients')->with('success', 'Patient deleted!');
    }

}
