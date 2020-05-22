<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            $role = auth()->user()->role;

            if($role == 1 or $role == 3 or $role == 4)
            {
                return $next($request);
            }else{
                return "You are not authorized";
            }

        }else{
            return redirect()->route('login');
        }
    }
}
