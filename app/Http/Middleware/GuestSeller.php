<?php

namespace App\Http\Middleware;

use Closure;

use Auth;
use Redirect;

class GuestSeller
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
        if((Auth::check() && Auth::user()->user_role == 'USERTYPE') || (Auth::check() && Auth::user()->user_role == 'STUDENT')){
            Auth::logout();
            return Redirect::to('masterAdmin/adminLogin');
        }else{
            return $next($request);
        }
    }
}
