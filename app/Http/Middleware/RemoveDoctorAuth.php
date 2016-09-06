<?php

namespace App\Http\Middleware;

use Closure;

class RemoveDoctorAuth
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
        if($request->session()->has('doctor_validated')){
            $request->session()->pull('doctor_validated');
        }
        return $next($request);
    }
}
