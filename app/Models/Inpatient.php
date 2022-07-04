<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inpatient extends Model
{
    use HasFactory, SoftDeletes;

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
        'warden_id',
        'ward',
        'diagnosis',
        'bp_systolic',
        'bp_diastolic',
        'weight',
        'height',
        'temperature',
        'visit_summary',
        'duration',
        'discharged',
        'discharged_date'
    ];
}
