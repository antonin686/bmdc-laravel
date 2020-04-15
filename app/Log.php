<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    public $timestamps = ["created_at"]; //only want to used created_at column
    const UPDATED_AT = null;
    
    protected $fillable = [
        'user_id', 'instance_id', 'table', 'action', 'ip_address',
    ];
}
