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
        if(!Auth::check()){
            return view('/test');
        }
        $user=$request->user();
        //Check if user is logged in
        /*if(!Auth::check()){
            //Reidrect to login screen if not logged in
            return redirect('/test');
        }*/
        //Check to see if user has the proper level of clearance
        if($clearance!="doctor"){
            return 'Must be a doctor';
        }        
        //Check to see if already logged in 
        if($request->session()->has('approved')){
            //Reroute to the provider login page
            return 'Go to provider login';
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
