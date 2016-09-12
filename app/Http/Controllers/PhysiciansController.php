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
use App\PatientForms;
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
        $currentPhysiciansId=Physician::where('user_id',Auth::user()->id)->first()->npi;
        if($id!=$currentPhysiciansId){
            $correctPath="/physicians/$currentPhysiciansId";
            return redirect($correctPath);
        }
        $physician = Physician::find($id);
        if (!$physician) {
            Log::info("Physician with $id not found.");
            abort(404);
        }
        $forms=\App\Form::where('npi',$physician->npi)->get();
        $patients=\App\Patient::where('physician_id',$physician->id)->get();
        $data = compact('physician','forms','patients');
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
        $question_id=$request->get('id');
        $returnedAnswers=[];
        $physician_id=\App\Physician::where('user_id',Auth::user()->id)->first()->id;
        $patients=\App\Patient::where('physician_id',$physician_id)->get();
        $questionOptionsArray=[];
        $questionText=[];
        $questionsAJAX=[];
        $form_id=$request->get('form_id');
        $type=$request->get('type');
        $answers=\App\Answer::where('question_id',$question_id)->get();
        if(!$request->ajax()){
            return abort('404');
        }
        if($type=='general'){
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
                }
                if(!isset($weight[$patient->weight])){
                    $weight[$patient->weight]=1;
                }else{
                    $weight[$patient->height]=$weight[$patient->weight][0]+1;
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
            return response()->json(['data'=>['Height'=>$height,'Weight'=>$weight,'Medication'=>$medication,'Insurance'=>$insurance,'Race'=>$race,'Sex'=>$sex]]);
        };
        //Retrieves data for scpecific questions
        foreach($answers as $answer){
            if(!isset($returnedAnswers[$answer->answer])){
                $returnedAnswers[$answer->answer]=1;
            }else{
               $returnedAnswers[$answer->answer]+=1; 
            }
        }
        return response()->json($returnedAnswers);
    }
    public function displayStats(Request $reqeust){
        //Grab the id from the Request
        $formIds=[];
        $questionText=[];
        $questionOptions=[];
        $forms=$this->getForms();
        $physician=\App\Physician::where('user_id',Auth::user()->id)->first();
        $data=compact('questions','forms','physician');
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
