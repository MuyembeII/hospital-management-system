<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'patients';
    public $timestamps = true;

    protected $fillable = [
        'first_name',
        'last_name',
        'contactnumber',
        'email',
        'registration_id',
        'address',
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
    ];

}
