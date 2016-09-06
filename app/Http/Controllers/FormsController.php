<?php

namespace App\Http\Controllers;

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
    public function create()
    {
        return view('physicians.create-form');
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
        
        $form = Form::find($id);
        $questions=$form->questions;
        $questions_ordered=[];
        $section_types=[];
        $question_types_array=$questions->groupBy('input_type');
        foreach ($question_types_array as $key => $group) {
            //var_dump('here');
            $section_types[]=$key;
        }
        foreach ($questions as $key => $question) {
            foreach ($section_types as $key => $type) {
               if($question->input_type==$type){
                $questions_ordered[$type][]=$question;
               }
            }
    
        }
        //$question = Question::find($id)->;
        //$options = DB::table('question_options')->get();
        //->where('question_id')->in(Form::find($id))
        
        

        if (!$form) {
            Log::info("Form with $id not found.");
            abort(404);
        }

        $data = compact('form', 'question','options','questions_ordered');
        
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
