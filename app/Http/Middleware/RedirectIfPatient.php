<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class RedirectIfPatient
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
        if(!Auth::check() || Auth::user()->clearance!='doctor'){
            return view('/auth/login');
        }
        //Check to see if user has the proper level of clearance
        //Prevents rerouting loop;
        if(!$request->session()->has('doctor_validated')){
            if(stripos(Route::getFacadeRoot()->current()->uri(),'physician/validate')!=false){
                return redirect('/physicians/login');
            }
        }        
        return $next($request);
    }
}
