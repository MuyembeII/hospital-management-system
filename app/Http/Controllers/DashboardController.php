<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    //
    public function index(){
        $users_count = DB::table('users')->count();
        $patients_count = DB::table('patients')->count();
        $pharmacy_count = DB::table('pharmacies')->count();
        $appointments_count = DB::table('appointments')->count();

        return view(
            'main', [
                'users_count' => $users_count,
                'patients_count' => $patients_count,
                'pharmacy_count' => $pharmacy_count,
                'appointments_count' => $appointments_count,
            ]
        );
    }
}
