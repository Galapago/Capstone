<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Form;
use App\Submission;
use App\User;
use App\Question;
use App\QuestionOption;
use App\Answer;
use App\Physician;
use Illuminate\Support\Facades\Log;


class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view ('patients/index');
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
        $patient = Patient::find($id);
        $user = User::find($id);
        
        if (!$patient) {
            Log::info("Patient with $id not found.");
            abort(404);
        }

        $data = compact('patient', 'user');

        return view('patients.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::find($id);

        if (!$patient) {
            Log::info("Patient with $id not found.");
            abort(404);
        }

        $data = compact('patient');

        return view('patients.edit', $data);
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
        $patient = Patient::find($id);
        //dd($post);
        if (!$patient) {
            Log::info("Patient with $id not found for edit.");
            abort(404);
        }

        $patient->user->username = $request->input('username');
        $patient->user->email = $request->input('email');
        $patient->emergency_contact_name = $request->input('emergency_contact_name');
        $patient->emergency_contact_number = $request->input('emergency_contact_number');
        $patient->emergency_contact_email = $request->input('emergency_contact_email');
        $patient->medication = $request->input('medication');
        $patient->health_insurance = $request->input('health_insurance');
        $patient->save();
        $request->session()->flash('message', 'Your account has been updated!');
        return redirect()->action('PatientsController@show', $patient->id);
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

    public function editPassword($id) {

        $patient = Patient::find($id);

        if (!$patient) {
            Log::info("Patient with $id not found for edit.");
            abort(404);
        }

        return view('patients.password');
    }

    public function updatePassword(Request $request, $id) {

        $patient = Patient::find($id);

        if (!$patient) {
            Log::info("Patient with $id not found for edit.");
            abort(404);
        }

        $patient->user->password = Hash::make($request->input('password'));
        $patient->save();
        $request->session()->flash('message', 'Your password has been updated!');
        return redirect()->action('PatientsController@show', $patient->id);

    }
}
