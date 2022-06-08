<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outpatient;

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
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('services.outpatient');
   }
}
