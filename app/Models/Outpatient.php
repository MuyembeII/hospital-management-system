<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Outpatient extends Model
{
    use HasFactory;
    use SoftDeletes;

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
       'blood_pressure',
       'weight',
       'height',
       'temperature',
       'diagnosis',
       'reason_for_visit',
    ];
}
