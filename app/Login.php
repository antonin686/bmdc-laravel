<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'username', 'serialnumber', 'gender','email', 'fingerprint_id','fingerprint_select',
    ];
}
