<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
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
       'dispensation_id',
       'dispensation_date',
       'dispensation_description'
    ];
}
