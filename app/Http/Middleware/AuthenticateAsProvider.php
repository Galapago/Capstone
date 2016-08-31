<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateAsProvider
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
            return view('/test');
        }
        //Check to see if user has the proper level of clearance
        if(!$request->session()->has('doctor_validated')){
            return redirect('/physician/validate');
        }        
        return $next($request);
    }
    //Check to see if a given user is listed as a provider
    public function isProvider(Request $request){
        $clearance = Request::user()->clearance;
        if($clearance=="doctor"){
            var_dump(Auth::user()->clearance);
            return true;
        }
        return false;
    }
    public function loggedInProvider(Request $request){
        //Checks to see if session contains token for provider login
        if($request->session()->has('approved')){
            return true;
        }
        return false;
    }
}
