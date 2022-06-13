<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inpatient extends Model
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
       'prescription_id',
       'ward',
       'diagnosis',
       'blood_pressure',
       'weight',
       'height',
       'temperature',
       'visit_summary'
       'duration',
       'discharged',
       'discharged_date'
    ];
}
