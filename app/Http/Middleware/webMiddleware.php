<?php

namespace App\Http\Middleware;

use Closure;

use View;
use DB;

use Auth;
use config;

class webMiddleware
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


        return $next($request);
    }
}
