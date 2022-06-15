<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Pharmacy;
use App\Models\Outpatient;
use App\Models\Patient;
use App\Models\Medicine;

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
  * @param  \App\Models\Appointment  $appointment
  * @return \Illuminate\Http\Response
  */
 public function show(Pharmacy $pharmacy)
 {
     $pid = $pharmacy->patient_id;
     $mid = $pharmacy->dispensation_id;

     $patient = Patient::find($pid);
     $medicine = Medicine::find($pid);

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
}
