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
    public function __construct(){
        $this->middleware('guest', ['except' => ['index','authenticate','logout']]);
    }
    /*
    Preforms the initial round of authentication
    */
    public function authenticate(Request $request){
        $user=$request->user();
        $email=$request->email;
        $password=$request->password;
        if(Auth::attempt(['email'=>$email,'password'=>$password,'clearance'=>'doctor'])){
            return redirect('/physician/validate');
        }
        if(Auth::attempt(['email'=>$email,'password'=>$password])){
            $id=Auth::user()->id;
            return redirect('/home/' . $id);
        }
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
