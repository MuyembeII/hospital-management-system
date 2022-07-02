<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Pharmacy;
use App\Models\Patient;
use App\Models\Medicine;
use Illuminate\Support\Facades\Log;

class PharmacyController extends Controller
{

    /**
     * Display a listing of inpatient services.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pharmacies = DB::table('pharmacies')
            ->join('medicines', 'pharmacies.dispensation_id', '=', 'medicines.id')
            ->join('patients', 'pharmacies.patient_id', '=', 'patients.id')
            ->select(
                'pharmacies.*',
                'patients.first_name',
                'patients.last_name',
                'patients.sex',
                'patients.dob',
                DB::raw('TIMESTAMPDIFF(YEAR, patients.dob, CURDATE()) as age'),
                'medicines.name as dispensation',
                'medicines.quantity',
            )
            ->orderBy('pharmacies.created_at', 'DESC')
            ->get();
        return view("services.pharmacy_list", compact("pharmacies"));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Appointment $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Pharmacy $pharmacy)
    {
        $pid = $pharmacy->patient_id;
        $mid = $pharmacy->dispensation_id;

        $patient = Patient::find($pid);
        $medicine = Medicine::find($mid);

        $age = DB::table('patients')
            ->selectRaw(
                'CONCAT(
                       FLOOR((TIMESTAMPDIFF(MONTH, patients.dob, CURDATE()) / 12)), \' year(s) \',
                       MOD(TIMESTAMPDIFF(MONTH, patients.dob, CURDATE()), 12) , \' month(s)\'
                     ) AS age'
            )
            ->where('id', $pid)
            ->value('age');

        return view("services.pharmacy_show", [
            "pharmacy" => $pharmacy,
            "patient" => $patient,
            "medicine" => $medicine,
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
        return view('services.pharmacy');
    }

    public function store(Request $request)
    {
        $pharmacy = new Pharmacy();
        $pid = $request->patient_id;

        $pharmacy->patient_id = $request->patient_id;
        $pharmacy->doctor_id = $request->doctor_id;
        $pharmacy->dispensation_id = $request->dispensation_id;
        $pharmacy->dispensation_date = $request->dispensation_date;
        $pharmacy->quantity = $request->quantity;
        $pharmacy->dispensation_description = $request->dispensation_description;

        try {
            $pharmacy->save();
            return redirect("/patients/{$pid}")->with(
                "success",
                "Pharmacy drug dispensed successfully."
            );
        } catch (Throwable $th) {
            return redirect("/patients/{$pid}")->with(
                "fail",
                "Error dispensing drug!"
            );
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
        $pharmacy = Pharmacy::find($id);
        return view('services.pharmacy_edit', compact('pharmacy'));
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
            'dispensation_id' => 'required',
            'doctor_id' => 'required',
            'quantity' => 'required',
            'dispensation_date' => 'required',
            'dispensation_description' => 'required'
        ]);
        $pharmacy = Pharmacy::find($id);
        $pid = $request['patient_id'];

        try {
            $pharmacy->patient_id = pid;
            $pharmacy->doctor_id = $request->doctor_id;
            $pharmacy->dispensation_id = $request->doctor_id;
            $pharmacy->quantity = $request->quantity;
            $pharmacy->dispensation_date = $request->dispensation_date;
            $pharmacy->dispensation_description = $request->dispensation_description;
            $pharmacy->save();
        } catch (\Exception $e) {
            if (!($e instanceof SQLException)) {
                app()
                    ->make(\App\Exceptions\Handler::class)
                    ->report($e); // Report the exception if you don't know what actually caused it
                Log::error("Error updating dispensation details due to; \n ${e}");
            }

            $code = $e->getCode();
            $message = $e->getMessage();
            $error_response = 'Error occurred attempting dispensation edit due to; \n' . $message . '. RESPONSE STATUS=' . $code;

            request()->session()->flash('updatePharmacyFail', $error_response);
            return redirect()->back();
        }
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
        $pharmacy = Pharmacy::find($id);
        $pharmacy->delete();
        return redirect('/pharmacy')->with('deletePharmacySuccess', 'Dispensation Deleted!');
    }
}
