<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Patient;
use Illuminate\Support\Facades\DB;
use App\Form;
use App\Submission;
use App\User;
use App\Question;
use App\QuestionOption;
use App\Answer;
use App\Physician;
use App\PatientForm;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class PatientsController extends Controller
{   
    public function __construct(){
        $this->middleware('guest');
        $this->middleware('user');
    }
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
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patient = new Patient;
        $patient->user_id = Auth::user()->id;
        $patient->physician_id = '1';
        $patient->first_name = $request->input('first-name');
        $patient->last_name = $request->input('last-name');
        $patient->dob = $request->input('dob');
        $patient->phone = $request->input('phone');
        $patient->ssn = $request->input('social-security');
        $patient->street_address = $request->input('street-address');
        $patient->apt_ste = $request->input('apt/ste');
        $patient->city = $request->input('city');
        $patient->state = $request->input('state');
        $patient->zip_code = $request->input('zip-code');
        $patient->height = $request->input('height');
        $patient->weight = $request->input('weight');
        $patient->emergency_contact_name = $request->input('emergency-contact-name');
        $patient->emergency_contact_number = $request->input('emergency-contact-number');
        $patient->emergency_contact_email = $request->input('emergency-contact-email');
        $patient->medication = $request->input('medication');
        $patient->health_insurance = $request->input('health-insurance');
        $patient->save();
        $request->session()->flash('message', 'Your account has been created!');
        return redirect( action('PatientsController@show', $patient->id));
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
        $user = User::find($patient->user_id);
        if(!Auth::check()){
            return redirect('/');
        }
        //var_dump(Auth::user());
        if (!$patient) {
            Log::info("Patient with $id not found.");
            abort(404);
        }

        $data = compact('patient', 'user');
        //dd($data);
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
        $user = User::find($patient->user_id);

        if (!$patient) {
            Log::info("Patient with $id not found.");
            abort(404);
        }
        
        $data = compact('patient', 'user');
        //dd($data);
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
        $patient = Patient::with('user')->find($id);
        //$user = User::find($patient->user_id);
        //dd($post);
        if (!$patient) {
            Log::info("Patient with $id not found for edit.");
            abort(404);
        }

        $patient->user->username = $request->input('username');
        $patient->user->email = $request->input('email');
        $patient->user->save();
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

        $data = compact('patient');

        return view('patients.password', $data);
    }

    public function updatePassword(Request $request, $id) {

        $patient = Patient::find($id);

        if (!$patient) {
            Log::info("Patient with $id not found for edit.");
            abort(404);
        }

        $patient->user->password = Hash::make($request->input('password'));
        $patient->user->save();
        $request->session()->flash('message', 'Your password has been updated!');
        return redirect()->action('PatientsController@show', $patient->id);

    }
    public function mail()
    {
        $user = User::find(1)->toArray();
        Mail::send('emails.test', $user, function($message) use ($user) {
            $message->to($user->email);
            $message->subject('Mailgun Testing');
        });
        dd('Mail Send Successfully');
    }
}
