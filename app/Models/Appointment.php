<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'id',
        'patient_id',
        'doctor_id',
        'created_date',
        'appointment_status',
        'appointment_date',
        'service_type',
        'appointment_details',
     ];

}
