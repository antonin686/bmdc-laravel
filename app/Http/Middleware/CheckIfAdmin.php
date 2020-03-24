<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckIfAdmin
{
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            $role = auth()->user()->role;

            if($role == 1)
            {
                return $next($request);
            }

        }else{
            return redirect()->route('login');
        }
        
    }
}