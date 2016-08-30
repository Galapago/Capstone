<?php

namespace App\Http\Middleware;
use App\Http\Middleware\Authenticate;
use Closure;
use Illuminate\Http\Request;
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
        $user=$request->user();
        //Check if user is logged in
        if(!isset($user) || empty($user)){
            //Reidrect to login screen if not logged in
            return redirect('/auth/login');
        }
        //Check to see if user has the proper level of clearance
        if(!$user->get('clearance')=='provider'){
            //Redirect to user portal if not provider
            return redirect('/user/portal');
        }
        //Check to see if already logged in 
        if(loggedInProvider()){
            //Reroute to the provider login page
            return redirect('/provider/login');
        }
        return $next($request);
    }
    //Check to see if a given user is listed as a provider
    public function isProvider(Request $request){
        $user=$request->user();
        if(!$user->clearance=='provider'){
            return false;
        }
        return true;
    }
    public function loggedInProvider(){
        //Checks to see if session contains token for provider login
    }
}
