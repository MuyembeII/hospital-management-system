<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

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

       return view('patient.patients', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create_patient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        Patient::create($request->all());

        return redirect()->route('patient.patients')
            ->with('success', 'Patient created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        return view('patient.show', compact('patient'));
    }

}
