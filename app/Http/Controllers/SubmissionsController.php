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
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SubmissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('guest');
    }
    public function index()
    {
        //
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
        
        $submission = new Submission;
        dd(Auth::user()->id);
        $user_id = Auth::user()->id;
        $submission->form_id = $request->input('form_id');
        $submission->patient_id = \App\Patient::where('user_id',$user_id)->first()->id;
        //$submission->patient_id = Submission::find($submission->patient->id);
        $submission->save();

        $answers = $request->all();
        unset($answers['_token']);
        unset($answers['form_id']);
        foreach ($answers as $questionId => $answerText) {
            $answer = new Answer;
            $answer->question_id = $questionId;
            $answer->answer = $answerText;
            $answer->patient_id = $submission->patient_id;
            $answer->save();
        }

        $request->session()->flash('message', 'Your form has been submitted!');
        return redirect( action('PatientsController@show'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        var_dump($id);
        // $submission = Submission::find($id);
        $submission = Submission::findOrFail($id);
        var_dump($submission);

        $form = Form::find($submission->form->id);    
        var_dump($form);

        $patient = Patient::find($submission->patient->id);
        var_dump($patient);

        //dd($patient);
        //$answers = Answer::find($submission->answers)->get();

        //dd($answers);
        // $questions = Question::find($answer->question->questions);
        // dd($questions);


        
       // $patient=\App\Patient::where('id',$submission->id)->first();
        //$patient = Patient::find($submission->patient->id)->get();
        //$form=\App\Form::where('id',$submission->form_id)->first();
        //$form = Form::find($submission->form->id)->get();
        //$questions = Question::where('form_id',$form->id)->get();
        //dd($questions);
        // foreach($questions as $question){
        //     $answer=Answer::where('submission_id',$submission->id)->where('question_id',$question->id)->first();
        //     if(empty($answer)){
        //         $answers[]='Not answered';
        //     }else{
        //         $answers[]=$answer->answer;
        //     }
        // }
        // if(empty($answers)){
        //     $answers=['Questionaire not submitted'];
        // }

        $data = compact('submission', 'patient', 'form', 'answers', 'questions');

        return view('submissions.show', $data);
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
