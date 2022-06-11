<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Patient;
use App\Models\User;
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
        $appointment_list = Appointment::orderBy('appointment_date', 'DESC')->get();
        $appointments = DB::table('appointments')
                            ->join('patients', 'appointments.patient_id', '=', 'patients.id')
                            ->join('users', 'appointments.doctor_id', '=', 'users.id')
                            ->select(
                                'appointments.*',
                                'patients.first_name',
                                'patients.last_name',
                                'patients.sex',
                                'patients.dob',
                                DB::raw('TIMESTAMPDIFF(YEAR, patients.dob, CURDATE()) as age'),
                                'users.name'
                            )
                            ->orderBy('appointments.appointment_date', 'DESC')
                            ->get();

        return view(
            'appointment.appointment_list',
            ['appointment_list' => $appointment_list, 'appointments' => $appointments]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("appointment.create_appointment");
    }

    /**
     * Create patient appointment
     *
     * @return \Illuminate\Http\Response
     */
    public function createAppointment(Request $request)
    {
        $appointment = new Appointment();
        $user = Auth::user();

        $appointment->patient_id = $pid;
        $appointment->doctor_id = $user->id;
        $appointment->appointment_status = $request->appointment_status;
        $appointment->appointment_date = $request->appointment_date;
        $appointment->service_type = $request->appointment_date;
        $appointment->appointment_details = $request->appointment_details;
        try {
            $appointment->save();
            return redirect("/patients{$pid}")->with(
                "success",
                "New Appointment created successfully."
            );
        } catch (Throwable $th) {
            return redirect("/patients{$pid}")->with(
                "fail",
                "Error create patient appointment!"
            );
        }
    }

    public function store(Request $request)
    {
        $appointment = new Appointment();
        $pid = $request->patient_id;

        $appointment->patient_id = $request->patient_id;
        $appointment->doctor_id = $request->user_id;
        $appointment->appointment_status = $request->appointment_status;
        $appointment->appointment_date = $request->appointment_date;
        $appointment->service_type = $request->service_type;
        $appointment->appointment_details = $request->appointment_details;
        try {
            $appointment->save();
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

        return view("appointment.show_appointment", [
            "appointment" => $appointment,
            "patient" => $patient,
            "user" => $user,
        ]);
    }

    public function edit($id)
    {
        $appointment = Appointment::find($id);
        $pid = $appointment->patient_id;
        $patient = Patient::find($pid);
        $appointment_list = DB::table("appointments")->where("patient_id", $pid)->get();
        return view("appointment.edit_appointment", [
            "patient" => $patient,
            "appointment" => $appointment,
            "appointments" => $appointment_list
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'appointment_status' => 'required',
            'appointment_date' => 'required',
        ]);
        $appointment = Appointment::find($id);
        $pid = $appointment->patient_id;
        $did = $appointment->doctor_id;
        $patient = Patient::find($pid);

        $appointment->patient_id = $pid;
        $appointment->doctor_id = $did;
        $appointment->appointment_status = $request->get('appointment_status');
        $appointment->appointment_date = $request->get('appointment_date');
        $appointment->service_type = $request->get('service_type');
        $appointment->appointment_details = $request->get('appointment_details');
        $appointment->save();
        return redirect("/patients/{$pid}")->with('success', 'Appointment updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();
        return redirect('/appointments')->with('success', 'Appointment deleted!');
    }

    function console_log($output, $with_script_tags = true)
    {
        $js_code = "console.log(" . json_encode($output, JSON_HEX_TAG) . ");";
        if ($with_script_tags) {
            $js_code = "<script>" . $js_code . "</script>";
        }
        echo $js_code;
    }
}
