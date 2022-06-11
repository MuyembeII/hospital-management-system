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
       $outpatient = Outpatient::orderBy("id")->get();

       return view("appointment.appointment_list", compact("patients"));
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
}
