<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Inpatient;
use App\Models\Patient;
use App\Models\Medicine;
use App\Models\User;

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
       $inpatient = new Inpatient();
       $pid = $request->patient_id;
       $dis_flag = $request->discharged;
       $discharge = 0;
       if($dis_flag){
         $discharge = 1;
       }

       $inpatient->patient_id = $request->patient_id;
       $inpatient->doctor_id = $request->user_id;
       $inpatient->prescription_id = $request->prescription_id;
       $inpatient->temperature = $request->temperature;
       $inpatient->weight = $request->weight;
       $inpatient->height = $request->height;
       $inpatient->diagnosis = $request->diagnosis;
       $inpatient->blood_pressure = $request->blood_pressure;
       $inpatient->visit_summary = $request->visit_summary;
       $inpatient->discharged = $discharge;
       $inpatient->discharged_date = $request->discharged_date;
       $inpatient->duration = $request->duration;
       $inpatient->ward = $request->ward;
       try {
           $inpatient->save();
           return redirect("/patients/{$pid}")->with(
               "success",
               "New IPD service created successfully."
           );
       } catch (Throwable $th) {
           return redirect("/patients/{$pid}")->with(
               "fail",
               "Error create IPD service!"
           );
       }
   }
}
