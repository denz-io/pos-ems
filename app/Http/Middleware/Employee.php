<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Employee
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
        if (!Auth::user()) {
            return redirect('/');
        }
        return $next($request);
    }
}
