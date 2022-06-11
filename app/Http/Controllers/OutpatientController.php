<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Outpatient;
use App\Models\Patient;
use App\Models\Medicine;
use App\Models\User;

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
                         ->get();

      
       return view("services.outpatient_list", compact("outpatients"));
   }

   /**
   * Display the specified resource.
   *
   * @param  \App\Models\Appointment  $appointment
   * @return \Illuminate\Http\Response
   */
  public function show(Outpatient $outpatient)
  {
      $pid = $outpatient->patient_id;
      $did = $outpatient->doctor_id;
      $mid = $outpatient->prescription_id;
      $patient = Patient::find($pid);
      $medicine = Medicine::find($pid);
      $user = User::find($did);

      return view("services.outpatient_show", [
          "outpatient" => $outpatient,
          "patient" => $patient,
          "medicine" => $medicine,
          "user" => $user,
      ]);
  }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('services.outpatient_start');
   }

   public function store(Request $request)
   {
       $outpatient = new Outpatient();
       $pid = $request->patient_id;

       $outpatient->patient_id = $request->patient_id;
       $outpatient->doctor_id = $request->user_id;
       $outpatient->prescription_id = $request->prescription_id;
       $outpatient->temperature = $request->temperature;
       $outpatient->weight = $request->weight;
       $outpatient->height = $request->height;
       $outpatient->diagnosis = $request->diagnosis;
       $outpatient->blood_pressure = $request->blood_pressure;
       $outpatient->reason_for_visit = $request->reason_for_visit;
       try {
           $outpatient->save();
           return redirect("/patients/{$pid}")->with(
               "success",
               "New Appointment created successfully."
           );
       } catch (Throwable $th) {
           return redirect("/patients/{$pid}")->with(
               "fail",
               "Error create patient appointment!"
           );
       }
   }
}
