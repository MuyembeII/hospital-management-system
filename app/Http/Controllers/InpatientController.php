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
}
