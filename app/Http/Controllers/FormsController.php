<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Form;
use App\Submission;
use App\User;
use App\Question;
use App\QuestionOption;
use App\Patient;
use App\Answer;
use App\Physician;

class FormsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('physicians.create-form');
    }
    public function test(Request $request){
            $questionsCount=\App\Question::all()->count();
            $questionId=\App\Question::where('id',$questionsCount)->first()->id;
            $user=$request->user();
            $npi=\App\Physician::where('user_id',$user->id)->first()->npi;
            $form= new \App\Form();
            $form->npi=$npi;
            $form->form_name=$request->get('form_name');
            $form->save();
            $questions = $request->get('questions');
            foreach ($questions as $questionNumber => $questionInfo) {
                $newQuestion=new \App\Question();
                $newQuestion->form_id=$form->id;
                $newQuestion->question=$questionInfo['question_text'][0];
                $newQuestion->input_type=$questionInfo['question_type'][0];
                $newQuestion->quantifiable='0';
                $newQuestion->save();
                if($questionInfo['question_type']!='textarea'){
                    foreach($questionInfo['question_options'] as $questionOption){
                        if($questionOption!=''){
                            $question_option= new \App\QuestionOption();
                            $question_option->question_id=$questionId;
                            $question_option->option_text=$questionOption;
                            $question_option->save();
                        }
                    }
                }
                $questionId++;
            }
            return 'Form Created';
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

        $form = Form::findOrFail($id);
        $questions = $form->questions()->orderBy('section')->get();


        if (!$form) {
            Log::info("Form with $id not found.");
            abort(404);
        }

        $answers = new Collection();
        
        // $data = compact('form', 'questions', 'id');
        $data = compact('form', 'questions', 'id', 'answers');
        return view('forms.show', $data);
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
