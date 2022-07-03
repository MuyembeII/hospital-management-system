<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Outpatient;
use App\Models\Patient;
use App\Models\Medicine;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class OutpatientController extends Controller
{

    /**
     * Display a listing of outpatient services.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outpatients = DB::table('outpatients')
            ->join('medicines', 'outpatients.prescription_id', '=', 'medicines.id')
            ->join('patients', 'outpatients.patient_id', '=', 'patients.id')
            ->join('users', 'outpatients.doctor_id', '=', 'users.id')
            ->select(
                'outpatients.*',
                'patients.first_name',
                'patients.last_name',
                'patients.sex',
                'patients.dob',
                DB::raw('TIMESTAMPDIFF(YEAR, patients.dob, CURDATE()) as age'),
                'users.name',
                'medicines.name',
                'medicines.quantity',
            )
            ->orderBy('outpatients.created_at', 'DESC')
            ->whereNull('outpatients.deleted_at')
            ->get();


        return view("services.outpatient_list", compact("outpatients"));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Outpatient $outpatient
     * @return \Illuminate\Http\Response
     */
    public function show(Outpatient $outpatient)
    {
        $pid = $outpatient->patient_id;
        $did = $outpatient->doctor_id;
        $mid = $outpatient->prescription_id;

        $opd = DB::table('outpatients')->where('patient_id', $pid)->get();
        $patient = Patient::find($pid);
        $medicine = Medicine::find($mid);
        $user = User::find($did);

        $age = DB::table('patients')
            ->selectRaw(
                'CONCAT(
                        FLOOR((TIMESTAMPDIFF(MONTH, patients.dob, CURDATE()) / 12)), \' year(s) \',
                        MOD(TIMESTAMPDIFF(MONTH, patients.dob, CURDATE()), 12) , \' month(s)\'
                      ) AS age'
            )
            ->where('id', $pid)
            ->value('age');

        return view("services.outpatient_show", [
            "outpatient" => $outpatient,
            "opd" => $opd,
            "patient" => $patient,
            "medicine" => $medicine,
            "user" => $user,
            "verbose_age" => $age,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicines = DB::table('medicines')->pluck('name', 'id');
        return view(
            'services.outpatient_start',
            ["medicines", $medicines]
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required',
            'prescription_id' => 'required',
            'doctor_id' => 'required',
            'bp_systolic' => 'required',
            'bp_diastolic' => 'required',
            'weight' => 'required',
            'temperature' => 'required',
            'diagnosis' => 'required'
        ]);

        $outpatient = new Outpatient();
        $pid = $request->patient_id;

        $outpatient->patient_id = $request->patient_id;
        $outpatient->doctor_id = $request->doctor_id;
        $outpatient->prescription_id = $request->prescription_id;
        $outpatient->temperature = $request->temperature;
        $outpatient->weight = $request->weight;
        $outpatient->height = $request->height;
        $outpatient->diagnosis = $request->diagnosis;
        $outpatient->bp_systolic = $request->bp_systolic;
        $outpatient->bp_diastolic = $request->bp_diastolic;
        $outpatient->reason_for_visit = $request->reason_for_visit;
        try {
            $outpatient->save();
            return redirect("/patients/{$pid}")->with(
                "storeOpdSuccess",
                "New OPD visit created successfully."
            );
        } catch (\Throwable $th) {
            Log::error($th);
            return redirect("/patients/{$pid}")->withError(
                "Error creating OPD service! Details ${th}."
            )->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $outpatient = Outpatient::find($id);
        $pid = $outpatient->patient_id;
        $patient = Patient::find($pid);
        $medicines = Medicine::all();
        return view('services.outpatient_edit',
            ["outpatient" => $outpatient, "patient" => $patient, "medicines" => $medicines]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'patient_id' => 'required',
            'prescription_id' => 'required',
            'doctor_id' => 'required',
            'bp_systolic' => 'required',
            'bp_diastolic' => 'required',
            'weight' => 'required',
            'temperature' => 'required',
            'diagnosis' => 'required'
        ]);
        $outpatient = Outpatient::find($id);
        $pid = $request['patient_id'];

        try {
            $outpatient->patient_id = $request->patient_id;
            $outpatient->doctor_id = $request->doctor_id;
            $outpatient->prescription_id = $request->prescription_id;
            $outpatient->temperature = $request->temperature;
            $outpatient->weight = $request->weight;
            $outpatient->height = $request->height;
            $outpatient->diagnosis = $request->diagnosis;
            $outpatient->bp_systolic = $request->bp_systolic;
            $outpatient->bp_diastolic = $request->bp_diastolic;
            $outpatient->reason_for_visit = $request->reason_for_visit;
            $outpatient->save();
        } catch (\Exception $e) {
            if (!($e instanceof SQLException)) {
                app()
                    ->make(\App\Exceptions\Handler::class)
                    ->report($e); // Report the exception if you don't know what actually caused it
                Log::error("Error updating OPD Visit due to; \n ${e}");
            }

            $code = $e->getCode();
            $message = $e->getMessage();
            $error_response = 'Error occurred attempting OPD Visit edit due to; \n' . $message . '. RESPONSE STATUS=' . $code;

            request()->session()->flash('updateOpdFail', $error_response);
            return redirect()->back();
        }
        return redirect("/outpatient/${id}")
            ->with('updateOpdSucces', 'OPD Visit updated successfully.');
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
        $outpatient = Outpatient::find($id)->firstOrFail();
        $patient_id = $outpatient->patient_id;
        $outpatient->delete();
        return redirect("/patients/${$patient_id}")->with('deleteOpdSuccess', 'OPD Visit Deleted!');
    }

    /**
     * restore specific OPD
     *
     * @return void
     */
    public function restore($id)
    {
        Outpatient::withTrashed()->find($id)->restore();

        return redirect("/outpatient/{$id}")->with('success', 'OPD Visit Restored!');
    }
}
