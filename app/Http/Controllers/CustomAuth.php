<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class CustomAuth extends Controller
{
    public function __construct(){
        $this->middleware('guest', ['except' => ['index','authenticate','logout']]);
        $this->middleware('provider', ['except' => ['index','logout']]);
    }
    public function authenticate(Request $request){
        $user=$request->user();
        $email=$request->email;
        $password=$request->password;
        if(Auth::attempt(['email'=>$email,'password'=>$password,'clearance'=>'doctor'])){
            $request->session()->put('proceed',true);
            var_dump(Auth::user()->clearance);

            //var_dump($request->session()->get('proceed'));
            return 'Doctor Prtal';
        }
        if(Auth::attempt(['email'=>$email,'password'=>$password])){
            //return redirect()->intended('/');
            return 'Patient Prtal';
        }
        return "Can't pass";
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect('/test');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Auth::logout();
        //$request->session()->flush();
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
