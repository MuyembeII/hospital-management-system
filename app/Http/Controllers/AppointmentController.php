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

    /**
     * Create patient appointment
     *
     * @return \Illuminate\Http\Response
     */
     public function createAppointment(Request $request){
        $appointment = new Appointment();
        $user = Auth::user();

        $appointment->patient_id=$pid;
        $appointment->doctor_id=$user->id;
        $appointment->appointment_status=$request->appointment_status;
        $appointment->appointment_date=$request->appointment_date;
        $appointment->service_type=$request->appointment_date;
        $appointment->appointment_details=$request->appointment_details;
        try {
            $appointment->save();
            return redirect("/patients{$pid}")->with('success',"New Appointment created successfully.");
        } catch (Throwable $th) {
            return redirect("/patients{$pid}")->with('fail',"Error create patient appointment!");
        }
     }

    public function store(Request $request){

        $appointment = new Appointment();
        $pid = $request->patient_id;

        $appointment->patient_id=$request->patient_id;
        $appointment->doctor_id=$request->user_id;
        $appointment->appointment_status=$request->appointment_status;
        $appointment->appointment_date=$request->appointment_date;
        $appointment->service_type=$request->service_type;
        $appointment->appointment_details=$request->appointment_details;
        try {
            $appointment->save();
            return redirect("/patients/{$pid}")->with('success',"New Appointment created successfully.");
        } catch (Throwable $th) {
            return redirect("/patients/{$pid}")->with('fail',"Error create patient appointment!");
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

    function console_log($output, $with_script_tags = true) {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }
}
