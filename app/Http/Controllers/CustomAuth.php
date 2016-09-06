<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class CustomAuth extends Controller
{
        protected $loginPath='/physicians/login';
    public function __construct(){
        $this->middleware('guest', ['except' => ['index','authenticate','physiciansLogin','patientsLogin','authenticatePatients','authenticatePhysicians','logout']]);
    }
    public function physiciansLogin(){
        return view('physicians.login');
    }
    public function patientsLogin(){
        return view('patients.login');
    }
    /*
    Preforms the initial round of authentication
    */
    public function authenticatePhysicians(Request $request){
        $user=$request->user();
        $email=$request->input('email');
        $npi=$request->input('npi');
        $password=$request->password;
        if(Auth::attempt(['email'=>$email,'password'=>$password,'clearance'=>'doctor'])){
            $user_id=\App\User::where('email',$email)->first()->id;
            $correctNPI=\App\Physician::where('npi',$npi)->first()->npi;
            if(!$npi==$correctNPI){
                Auth::logout();
                return redirect('/physicians/login');
            }
            $request->session()->put('doctor_validate',true);
            $auth_id=Auth::user()->id;
            $id=\App\Physician::where('user_id',$auth_id)->first()->id;
            return redirect('/physicians/' . $id);
        }
        return redirect()->back();
    }
    public function authenticatePatients(Request $request){
        $email=$request->input('email');
        $password=$request->input('password');
        if(Auth::attempt(['email'=>$email,'password'=>$password,'clearance'=>'patient'])){
            $id=Auth::user()->id;
            return redirect('/home/' . $id);
        }
        if(Auth::attempt(['email'=>$email,'password'=>$password,'clearance'=>'doctor'])){
            Auth::logout();
            return redirect()->intended('/patient/login');
        }
        return redirect()->back('/patient/login');

    }
    public function logout(Request $request){
        Auth::logout();
        if($request->session()->has('doctor_validate')){
            $request->session()->pull('doctor_validate');
        }
        return redirect('/');
    }
    /**
    Validates a physician once they complete the first level authentication
    **/
    public function physicianValidate(Request $request){
        $npi=$request->get('NPI');
        $password=$request->input('password');
        //Retrieves the password associated with that user
        $result=DB::table('physicians')->leftJoin('users','user_id','=','users.id')->where('npi',$npi)->select('password')->get();
        //Check if they've already passed this validation
        if($request->session()->has('doctor_validated',true)){
            $user_id=Auth::user()->id;
            $id=\App\Physician::where('user_id',$user_id)->first()->id;
            return redirect('/physicians/' . $id);
        }
        //If query returns no results
        if(empty($result)){
            return back();
        }
        //Retrieves password as a string
        $DB_password=$result[0]->password;
        if(Hash::check($password,$DB_password)){
            $request->session()->put('doctor_validated',true);
            $auth_id=Auth::user()->id;
            $id=\App\Physician::where('user_id',$id)->first()->id;
            return redirect('physician/' . $id);
        }
        return redirect()->intended('/physican/validate');
    }
    public function checkIfValidated(Request $request){
        if($request->session()->has('doctor_validated',true)){
            return 'Already logged in';
        }
        return view('/physician/validate');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::check()){
            if(Auth::user()->clearance=='doctor'){
                redirect('/physician/validate');
            }

            $auth_id=Auth::user()->id;
            $id=\App\Patient::where('user_id',$auth_id)->first()->id;
            return redirect('/home/' . $id);
        }
        return view('auth/login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
