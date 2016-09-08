<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
use App\Patient;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class PhysiciansController extends Controller
{
    public function __construct(){
        $this->middleware('provider');
        $this->middleware('guest');
    }
    public function HL7($submission){
        $submission=\App\Submission::where('id',$submission)->first();
        $patient=\App\Patient::where('id',$submission->id)->first();
        var_dump($patient);
        $string='';
        $PID1="|PATID$patient->id|";
        $PID2="|$patient->last_name^$patient->first_name^^|";
        $PID="PID|$PID1$PID2|";
        return $PID;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('physicians/index');
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
        $physician = Physician::find($id);
        //$user = User::find($physician->user_id);
        if (!$physician) {
            Log::info("Physician with $id not found.");
            abort(404);
        }

        $data = compact('physician');
        //dd($data);
        return view('physicians.show', $data);
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
    public function statistics(Request $request){
        //Grab the id from the Request
        $formIds=[];
        $questionOptionsArray=[];
        $questionText=[];
        $questionsAJAX=[];
        $forms=$this->getForms();
        $questions=$this->getQuestions($forms);
        foreach($questions as $question_object){
            foreach($question_object as $question){
            //Add number of responses to the QuestionOption object and formatting it so it can be added to the array
            $questionOptionsArray=[];
            if($question->input_type=='textarea'){
                $orderedResults=\App\Answer::where('question_id',$question->id)->get()->groupBy('answer');
                foreach ($orderedResults as $key=>$result) {
                    $questionOptionsArray[]=['option_text'=>$key,'responses'=>(int)$result->count()];
                    //var_dump($result->count());
                }
            }
            $questionOptions=\App\QuestionOption::where('question_id',$question->id)->get();
            //var_dump($questionOptions->all());
            foreach ($questionOptions as $key => $value) {
                $value->responses=\App\Answer::where('question_id',$question->id)->where('answer',$value->option_text)->count();
                $questionOptionsArray[]=$value;
            }
            $questionsAJAX[$question->id]=
            ['question_id'=>$question->id,'form_id'=>$question->form_id,'text'=>$question->question,'input_type'=>$question->input_type,'quantifiable'=>(bool)$question->quantifiable,'question_options'=>$questionOptionsArray];
            }
        }
        return response()->json(['data'=>$questionsAJAX]);
    }
    public function displayStats(Request $reqeust){
        //Grab the id from the Request
        $formIds=[];
        $questionText=[];
        $questionOptions=[];
        $forms=$this->getForms();
        $questions=$this->getQuestions($forms);
        foreach ($forms as $form) {
            $questions=\App\Question::where('form_id',$form->id)->get();
            foreach ($questions as $question) {
                //echo '<p>' . $question->question . '</p>';
                $questionText[]=$question->question;
                $answerChoices=\App\QuestionOption::where('question_id',$question->id)->get();
                //echo '<ul>';
                foreach ($answerChoices as $answerChoice) {
                    $questionOptions[]=$answerChoice->option_text;

                }
                //echo '</ul>';
            }
            }
            return view('physicians.stats')->with('questions',$questions);

    }
    public function getForms(){
        $id=Auth::user()->id;
        $physician=\App\Physician::find($id);
        $npi=$physician->npi;
        $forms=\App\Form::where('npi',$npi)->get();
        return $forms;
    }
    public function getQuestions($forms){
        $questions=[];
        foreach ($forms as $form) {
            $question=\App\Question::where('form_id',$form->id)->get();
            $questions[]=$question;
        }
        return $questions;
    }
    public function numberOfResponses($question){
        return \App\Answer::where('question_id',$question->id)->where('answer',$question->questionOption->option_text)->count();
    }
}
