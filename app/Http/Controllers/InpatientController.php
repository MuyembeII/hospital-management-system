<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Inpatient;
use App\Models\Patient;
use App\Models\Medicine;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class InpatientController extends Controller
{

    /**
     * Display a listing of inpatient services.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inpatients = DB::table('inpatients')
            ->join('medicines', 'inpatients.prescription_id', '=', 'medicines.id')
            ->join('patients', 'inpatients.patient_id', '=', 'patients.id')
            ->join('users', 'inpatients.doctor_id', '=', 'users.id')
            ->select(
                'inpatients.*',
                'patients.first_name',
                'patients.last_name',
                'patients.sex',
                'patients.dob',
                DB::raw('TIMESTAMPDIFF(YEAR, patients.dob, CURDATE()) as age'),
                'users.name',
                'medicines.name',
                'medicines.quantity',
            )
            ->orderBy('inpatients.created_at', 'DESC')
            ->get();
        return view("services.inpatient_list", compact("inpatients"));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Inpatient $inpatient
     * @return \Illuminate\Http\Response
     */
    public function show(Inpatient $inpatient)
    {
        $pid = $inpatient->patient_id;
        $did = $inpatient->doctor_id;
        $mid = $inpatient->prescription_id;
        $wid = $inpatient->warden_id;

        $patient = Patient::find($pid);
        $medicine = Medicine::find($mid);
        $user = User::find($did);
        $warden = User::find($wid);

        $age = DB::table('patients')
            ->selectRaw(
                'CONCAT(
                        FLOOR((TIMESTAMPDIFF(MONTH, patients.dob, CURDATE()) / 12)), \' year(s) \',
                        MOD(TIMESTAMPDIFF(MONTH, patients.dob, CURDATE()), 12) , \' month(s)\'
                      ) AS age'
            )
            ->where('id', $pid)
            ->value('age');

        return view("services.inpatient_show", [
            "$inpatient" => $inpatient,
            "patient" => $patient,
            "medicine" => $medicine,
            "user" => $user,
            "warden" => $warden,
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
        return view('services.inpatient');
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required',
            'prescription_id' => 'required',
            'doctor_id' => 'required',
            'warden_id' => 'required',
            'ward' => 'ward',
            'bp_systolic' => 'required',
            'bp_diastolic' => 'required',
            'weight' => 'required',
            'temperature' => 'required',
            'diagnosis' => 'required',
            'visit_summary' => 'required',
            'discharged' => 'required'
        ]);

        $inpatient = new Inpatient();
        $pid = $request->patient_id;
        $dis_flag = $request->discharged;
        $discharge = 0;
        if ($dis_flag) {
            $discharge = $dis_flag;
        }

        $inpatient->patient_id = $request->patient_id;
        $inpatient->doctor_id = $request->user_id;
        $inpatient->prescription_id = $request->prescription_id;
        $inpatient->warden_id = $request->warden_id;
        $inpatient->temperature = $request->temperature;
        $inpatient->weight = $request->weight;
        $inpatient->height = $request->height;
        $inpatient->diagnosis = $request->diagnosis;
        $inpatient->bp_systolic = $request->bp_systolic;
        $inpatient->bp_diastolic = $request->bp_diastolic;
        $inpatient->visit_summary = $request->visit_summary;
        $inpatient->discharged = $discharge;
        $inpatient->discharged_date = $request->discharged_date;
        $inpatient->duration = $request->duration;
        $inpatient->ward = $request->ward;
        try {
            $inpatient->save();
            Log::notice("New Patient Admission.");
            return redirect("/patients/{$pid}")->with(
                "storeIpdSuccess",
                "New IPD service created successfully."
            );
        } catch (\Throwable $th) {
            Log::error($th);
            return redirect("/patients/{$pid}")->with(
                "storeIpdError",
                "Error creating IPD service! Details ${th}."
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
        $inpatient = Inpatient::find($id);
        $pid = $inpatient->patient_id;
        $patient = Patient::find($pid);
        $medicines = Medicine::all();
        return view('services.inpatient_edit',
            ["inpatient" => $inpatient, "patient" => $patient, "medicines" => $medicines]
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
            'warden_id' => 'required',
            'ward' => 'ward',
            'bp_systolic' => 'required',
            'bp_diastolic' => 'required',
            'weight' => 'required',
            'temperature' => 'required',
            'diagnosis' => 'required',
            'visit_summary' => 'required',
            'discharged' => 'required'
        ]);

        $inpatient = Inpatient::find($id);
        $pid = $request['patient_id'];

        try {
            $dis_flag = $request->discharged;
            $discharge = 0;
            if ($dis_flag) {
                $discharge = $dis_flag;
            }

            $inpatient->patient_id = $request->patient_id;
            $inpatient->doctor_id = $request->user_id;
            $inpatient->prescription_id = $request->prescription_id;
            $inpatient->warden_id = $request->warden_id;
            $inpatient->temperature = $request->temperature;
            $inpatient->weight = $request->weight;
            $inpatient->height = $request->height;
            $inpatient->diagnosis = $request->diagnosis;
            $inpatient->bp_systolic = $request->bp_systolic;
            $inpatient->bp_diastolic = $request->bp_diastolic;
            $inpatient->visit_summary = $request->visit_summary;
            $inpatient->discharged = $discharge;
            $inpatient->discharged_date = $request->discharged_date;
            $inpatient->duration = $request->duration;
            $inpatient->ward = $request->ward;
            $inpatient->save();
        } catch (\Exception $e) {
            if (!($e instanceof SQLException)) {
                app()
                    ->make(\App\Exceptions\Handler::class)
                    ->report($e); // Report the exception if you don't know what actually caused it
                Log::error("Error updating IPD Visit due to; \n ${e}");
            }

            $code = $e->getCode();
            $message = $e->getMessage();
            $error_response = 'Error occurred attempting IPD Visit edit due to; \n' . $message . '. RESPONSE STATUS=' . $code;

            request()->session()->flash('updateIpdFail', $error_response);
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
        $inpatient = Inpatient::find($id);
        $patient_id = $inpatient->patient_id;
        $inpatient->delete();
        return redirect("/patients/${$patient_id}")->with('deleteIpdSuccess', 'IPD Visit Deleted!');
    }

    /**
     * restore specific IPD
     *
     * @return void
     */
    public function restore($id)
    {
        Inpatient::withTrashed()->find($id)->restore();

        return redirect("/inpatient/{$id}")->with('success', 'IPD Visit Restored!');
    }

    /**
     * restore all IPD Visits
     *
     * @return response()
     */
    public function restoreAll()
    {
        Inpatient::onlyTrashed()->restore();

        return redirect("/inpatient");
    }
}
