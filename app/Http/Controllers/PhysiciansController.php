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
        $physician=\App\Physician::where('user_id',Auth::user()->id)->first();
        $patient=\App\Patient::where('id',$submission->patient_id)->first();
        $submission_date=substr($submission->created_at,0,4) . substr($submission->created_at,5,2) . substr($submission->created_at,8,2) . substr($submission->created_at,11,2) . substr($submission->created_at,14,2);
        $MSH="MSH|^~\&|GALAPAGO|||$physician->clinic|$submission_date||ADT^04|MSG$submission_date|P|1|";
        $EVN="EVN|A04|$submission_date|";
        $PIDcontent="|MRN" . "$patient->id|";
        $PIDcontent.="|$patient->last_name^$patient->first_name^^|";
        $PIDcontent.="||";
          $birthdate=substr($patient->dob,0,4) . substr($patient->dob,5,2). substr($patient->dob,8,2);
        $PIDcontent.="|$birthdate|";
        $PIDcontent.="|$patient->sex|";
        $PIDcontent.="||";
        $PIDcontent.="|$patient->race|";
        if($patient->apartment_ste==null){
            $patient->apartment_ste='';
        }
        $PIDcontent.="$patient->street_address^$patient->apartment_ste^$patient->city^$patient->state^$patient->zip_code-";
        $PIDcontent.="|USA|";
        $PIDcontent.="|$patient->phone|";
        $PIDcontent.="||";
        $PIDcontent.="|$patient->marital_status|";
        $PIDcontent.="|$patient->ssn|";
        $PID="PID||$PIDcontent|";
        $NKIcontent="1|$patient->emergency_contact_name|||||$patient->emergency_contact_number";
        $NKI="|$NKIcontent|";
        //NTE|GF|QUESTIONTEXT^ANSWER|FORM
        $NTE="NTE|GF|";
        $questions=\App\Question::where('form_id',$submission->form_id)->get();
        foreach ($questions as $key=> $question) {
            $NTEContent="$question->question";
            $answers=\App\Answer::where('question_id',$question->id)->where('patient_id',$patient->id)->get();
            if(count($answers)>1){
                foreach ($answers as $key => $answer) {
                    $NTEContent.="^$answer->answer";
                }
            }elseif(!empty($answers[0])){
                    $NTEContent.="^" . $answers[0]->answer . '^';
            }else{
                $NTEContent.="^^";
            }
            if($key!=0){
                $NTE.='&';
            }
            $NTE.="$NTEContent";
        }
        $data=compact('MSH','EVN','PID','NKI','NTE');
        $HL7="$MSH$EVN$PID$NKI$NTE";
        return view('physicians.HL7')->with($data);
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
        $physician_id=\App\Physician::where('user_id',Auth::user()->id)->first()->id;
        $patients=\App\Patient::where('physician_id',$physician_id)->get();
        $questionOptionsArray=[];
        $questionText=[];
        $questionsAJAX=[];
        $form_id=$request->get('id');
        if($form_id=='general'){
            $height=[];
            $weight=[];
            $age=[];
            $medication=[];
            $insurance=[];
            $sex=[];
            $race=[];
            foreach ($patients as $patient) {
                if(!isset($height[$patient->height])){
                    $height[$patient->height]=1;
                }else{
                    $height[$patient->height]=$height[$patient->height]+1;
;
                }
                if(!isset($weight[$patient->weight])){
                    $weight[$patient->weight]=1;
                }else{
                    $weight[$patient->height]=$weight[$patient->weight][0]+1;
;
                }
                if(!isset($medication[$patient->medication])){
                    $medication[$patient->medication]=1;
                }else{
                    $medication[$patient->medication]=$medication[$patient->medication]+1;
;
                }
                if(!isset($insurance[$patient->health_insurance])){
                    $insurance[$patient->health_insurance]=1;
                }else{
                    $insurance[$patient->health_insurance]=$insurance[$patient->health_insurance]+1;
;
                }
                if(!isset($sex[$patient->sex])){
                    $sex[$patient->sex]=1;
                }else{
                    $sex[$patient->sex]=$sex[$patient->sex]+1;
;
                }
                if(!isset($race[$patient->race])){
                    $race[$patient->race]=1;
                }else{
                    $race[$patient->race]=$race[$patient->race]+1;
;
                }
            }
            return response()->json(['data'=>['height'=>$height,'weight'=>$weight,'medication'=>$medication,'insurance'=>$insurance,'race'=>$race,'sex'=>$sex]]);
        }else{
            $questions=\App\Question::where('form_id',$form_id)->get();
            foreach($questions as $question_object){
                foreach($question_object as $question){
                //Add number of responses to the QuestionOption object and formatting it so it can be added to the array
                $questionOptionsArray=[];
                if($question_object->input_type=='textarea'){
                    $orderedResults=\App\Answer::where('question_id',$question_object->id)->get()->groupBy('answer');
                    foreach ($orderedResults as $key=>$result) {
                        $questionOptionsArray[]=['option_text'=>$key,'responses'=>(int)$result->count()];
                        //var_dump($result->count());
                    }
                }
                $questionOptions=\App\QuestionOption::where('question_id',$question_object->id)->get();
                foreach ($questionOptions as $key => $value) {
                    $value->responses=\App\Answer::where('question_id',$question_object->id)->where('answer',$value->option_text)->count();
                    $questionOptionsArray[]=$value;
                }
                $questionsAJAX[$question_object->id]=
                ['question_id'=>$question_object->id,'form_id'=>$question_object->form_id,'text'=>$question_object->question,'input_type'=>$question_object->input_type,'quantifiable'=>(bool)$question_object->quantifiable,'question_options'=>$questionOptionsArray];
                }
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
                $questionText[]=$question->question;
                $answerChoices=\App\QuestionOption::where('question_id',$question->id)->get();
                foreach ($answerChoices as $answerChoice) {
                    $questionOptions[]=$answerChoice->option_text;

                }
            }
            }
            $questionOptions=\App\QuestionOption::all();
            $questionNumbers=[];
            foreach ($questionOptions as $key => $value) {
                if(!isset($questionNumbers[$value->question_id])){
                    $questionNumbers[$value->question_id]=[$value->id];
                }else{
                  $questionNumbers[$value->question_id][]=$value->id; 
                }
            }
            $count=[];
            foreach ($questionNumbers as $key => $value) {
                $count[$key]=count($value);
            }
            var_dump($count);
            $data=compact('questions','forms');
            return view('physicians.stats',$data);

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
