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
    public function authenticate(Request $request){
        $user=$request->user();
        $email=$request->email;
        $password=$request->password;
        if(Auth::attempt(['email'=>$email,'password'=>$password,'clearance'=>'doctor'])){
            return redirect('/physician/validate');
        }
        if(Auth::attempt(['email'=>$email,'password'=>$password])){
            return redirect('/home');
        }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->flush();
        return redirect('/test');
    }
    public function physicianValidate(Request $request){
        var_dump('working');
        $npi=$request->get('NPI');
        $password=$request->input('password');
        //Retrieves the password associated with that user
        $result=DB::table('physicians')->leftJoin('users','user_id','=','users.id')->where('npi',$npi)->select('password')->get();
        //Check if they've already passed this validation
        if($request->session()->has('doctor_validated',true)){
            return 'Already logged in';
        }
        //If query returns no results
        if(empty($result)){
            return back();
        }
        //Retrieves password as a string
        $DB_password=$result[0]->password;
        if(Hash::check($password,$DB_password)){
            $request->session()->put('doctor_validated',true);
            return 'working';
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
            redirect('/home');
        }
        return view('auth.test_login');
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
