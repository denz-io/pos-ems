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

        if (Auth::user()->status == 'admin') {
            return redirect('/home');
        }

        return $next($request);
    }
}
