<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedAlert extends Model
{
    protected $fillable = [
        'med_id', 
        'alert_gender', 
        'age_range_low',
        'age_range_high', 
        'alert_range',
        'med_unit',
        'max_duration',
        'duration_unit',
        'alert_for',
    ];
}
