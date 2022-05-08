<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patients';
    public $timestamps = true;

    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'contactnumber',
        'sex',
        'dob',
        'birth_place',
        'nationality',
        'religion',
        'guardian',
        'guardian_address',
        'occupation',
        'nrc',
        'image',
        'created_at',
    ]

}
