<?php

namespace App\Http\Middleware;

use Closure;

use Auth;
use Redirect;

class AuthSeller
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
        if (Auth::check() and Auth::user()->user_role == 'SELLER') {
            return $next($request);
        }
        Auth::logout();
        return Redirect::to('/');
    }
}
