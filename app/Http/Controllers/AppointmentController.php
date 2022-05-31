<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of appointments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $appointments = Appointment::orderBy('id')->get();

       return view('appointment.appointment_list', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appointment.create_appointment');
    }

    public function store(Request $request){
        $appointment = new Appointment();

        $appointment->appointment_status=$request->appointment_status;
        $appointment->appointment_date=$request->appointment_date;
        $appointment->service_type=$request->appointment_date;
        $appointment->appointment_details=$request->appointment_details;
         try {
            $appointment->save();
            return redirect()->back()->with('success',"New Appointment created successfully.");
        } catch (Throwable $th) {
            return redirect()->back()->with('fail',"Error Occured!");
        }
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Appointment  $appointment
    * @return \Illuminate\Http\Response
    */
    public function show(Appointment $appointment)
    {
        $pid = $appointment->patient_id;
        $did = $appointment->doctor_id;
        $patient = Patient::find($pid);
        $user = User::find($did);

        return view(
            'patient.show_appointment',
             [
                'appointment' => $appointment,
                'patient' => $patient,
                'user' => $user
             ]
        );

    }
}
