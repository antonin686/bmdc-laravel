<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Notification extends Model
{
    protected $fillable = [
        'user_id', 'data', 'route_name', 'route_id'
    ];
    
    public static function createForAdmin($array)
    {
        $users = User::where('role', 1)->get();
        foreach ($users as $user) {
            $array["user_id"] = $user->id;
            self::create($array);
        }
    }
}
