<?php

namespace App\Http\Middleware;


use App\User;
use Illuminate\Support\Facades\Hash;
use Closure;

class ApiAuth
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
        $method = $request->method();
        $canAccess = false;
        $apiToken = $request->header('api-token');
    
        if ($apiToken) {
            foreach (User::all() as $user) {
                if (Hash::check($apiToken, $user->api_token)) {
                    $canAccess = true;
                }
            }
        }else{
            return response('No Api Token Given', 200);
        }

        if (!$canAccess) {
            //abort(403, 'Access denied');
            return response('Invalid Token', 200);
        }

        return $next($request);
    }
}
