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

       return view('patient.patients_list', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patient.register_patient');
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

         $patient = new Patient([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'contactnumber' => $request->get('contactnumber'),
            'address' => $request->get('address'),
            'sex' => $request->get('sex'),
            'dob' => $request->get('dob'),
            'birth_place' => $request->get('birth_place'),
            'nationality' => $request->get('nationality'),
            'religion' => $request->get('religion'),
            'language' => $request->get('language'),
            'guardian' => $request->get('guardian'),
            'guardian_address' => $request->get('guardian_address'),
            'guardian_contact' => $request->get('guardian_contact'),
            'occupation' => $request->get('occupation'),
            'nrc' => $request->get('nrc'),
            'image' => $request->get('image')
        ]);

        $patient->save();
        return redirect('/patients')->with('success', 'Patient created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        return view('patient.show_patient', compact('patient'));
    }

    public function edit($id)
    {
       $patient = Patient::find($id);
       return view('patient.edit_patient', compact('patient'));
    }

    public function update(Request $request, $id)
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
        $patient = Patient::find($id);
        $patient -> first_name = $request->get('first_name');
        $patient -> last_name = $request->get('last_name');
        $patient -> email = $request->get('email');
        $patient -> contactnumber = $request->get('contactnumber');
        $patient -> address = $request->get('address');
        $patient -> sex = $request->get('sex');
        $patient -> dob = $request->get('dob');
        $patient -> birthdate = $request->get('birth_place');
        $patient -> nationality = $request->get('nationality');
        $patient -> religion = $request->get('religion');
        $patient -> language = $request->get('language');
        $patient -> guardian = $request->get('guardian');
        $patient -> guardian_address = $request->get('guardian_address');
        $patient -> guardian_contact = $request->get('guardian_contact');
        $patient -> occupation = $request->get('occupation');
        $patient -> nrc = $request->get('nrc');
        $patient -> image = $request->get('image');
        $patient->save();
        return redirect('/patients')->with('success', 'Patient updated successfully.');

    }

}
