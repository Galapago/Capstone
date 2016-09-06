<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RedirectIfDoctor
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
        if(!Auth::check() || Auth::user()->clearance=='doctor'){
            return view('/auth/login');
        }
        //Check to see if user has the proper level of clearance
        if($request->session()->has('doctor_validated')){
            return redirect('/physicians/login');
        }        
        return $next($request);
    }
}
