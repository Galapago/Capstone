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
use App\PatientForms;
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
    // public function __construct(){
    //     $this->middleware('guest',['except' => ['makePdf', 'show']]);
    // }
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

        $user_id = Auth::user()->id;
        $submission->form_id = $request->input('form_id');
        $submission->patient_id = \App\Patient::where('user_id',$user_id)->first()->id;
        $submission->save();
        //dd($submission);
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
        // $submission = Submission::find($id);
        $submission = Submission::findOrFail($id);

        // foreach($questions as $question){
        //     $answer=Answer::where('question_id',$question->id)->where('patient_id',$patient->id)->get();
        //     if(count($answer)>1){
        //         foreach ($answer as $individualAnswer) {
        //             $answers[]=$individualAnswer;
        //         }
        //     }else{
        //         $answers[]=$answer;
        //     }
        // }


        

        //$questions = Question::find($answers->question->questions);
        // var_dump($questions);


        
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

        //$data = compact('submission', 'patient', 'form', 'answers', 'questions');

        return view('submissions.makepdf', [
            'submission' => $submission,
            'patient' => $submission->patient,
            'form' => $submission->form,
            'answers' => $submission->answers,
            'questions' => $submission->form->questions,
        ]);
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
