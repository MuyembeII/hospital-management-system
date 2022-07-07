<?php

use App\Http\Controllers\VonageSMSController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\OutpatientController;
use App\Http\Controllers\InpatientController;
use App\Http\Controllers\PharmacyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/', function () {
        return view('main');
    })->name('main');

    //Route::get('appointments', [AppointmentController::class, 'index'])->name('appointments.index');

    Route::get('sendSMS', [VonageSMSController::class, 'index']);

    Route::resource('home', DashboardController::class);
    Route::resource('patients', PatientController::class);
    Route::resource('appointments', AppointmentController::class);
    Route::resource('outpatient', OutpatientController::class);
    Route::resource('inpatient', InpatientController::class);
    Route::resource('pharmacy', PharmacyController::class);

});
