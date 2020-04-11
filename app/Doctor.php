<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'full_name', 'speciality', 'basic_degree', 'advance_degree', 'email', 'phone', 'work_place'
    ];
}
