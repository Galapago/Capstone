<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
class AnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$answer1=new App\Answer();
    	$answer1->patient_id='1';
    	$answer1->question_id='8';
    	$answer1->submission_id='1';
    	$answer1->answer='Asthma';
    	$answer1->save();
    	$answer1=new App\Answer();
    	$answer1->patient_id='1';
    	$answer1->question_id='8';
    	$answer1->submission_id='1';
    	$answer1->answer='Glaucoma';
    	$answer1->save();
    	$answer1=new App\Answer();
    	$answer1->patient_id='1';
    	$answer1->question_id='8';
    	$answer1->submission_id='1';
    	$answer1->answer='Cancer';
    	$answer1->save();
    	$answer1=new App\Answer();
    	$answer1->patient_id='1';
    	$answer1->question_id='9';
    	$answer1->submission_id='1';
    	$answer1->answer='Cancer';
    	$answer1->save();
    	$answer1=new App\Answer();
    	$answer1->patient_id='1';
    	$answer1->question_id='9';
    	$answer1->submission_id='1';
    	$answer1->answer='Diabetes';
    	$answer1->save();
    	$answer1=new App\Answer();
    	$answer1->patient_id='1';
    	$answer1->question_id='11';
    	$answer1->submission_id='1';
    	$answer1->answer='Cough';
    	$answer1->save();
    	$answer1=new App\Answer();
    	$answer1->patient_id='1';
    	$answer1->question_id='11';
    	$answer1->submission_id='1';
    	$answer1->answer='Shortness of Breath';
    	$answer1->save();
    	$patient_count=App\Patient::all()->count();
    	/*
    	for($i=2;$i<=$patient_count;$i++){
    		for($j=1;$j<=App\Question::where('form_id',1)->count();$j++){
    			if($j==1 || $j==3 || $j==5){
    				$answer=new App\Answer();
    				$answer->patient_id=$i;
    				$answer->question_id=$j;
    				$answer->answer=App\Physician::orderbyRaw("RAND()")->first()->last_name;
    				$answer->submission_id=App\Submission::where('patient_id',$i)->first()->id;
    				$answer->save();
    			}elseif($j==2 || $j==4 || $j==7){
    				$answer=new App\Answer();
    				$answer->patient_id=$i;
    				$answer->question_id=$j;
    				$answer->answer=mt_rand(0,9) .mt_rand(0,9) .mt_rand(0,9) .mt_rand(0,9) .mt_rand(0,9) .mt_rand(0,9) .mt_rand(0,9) .mt_rand(0,9) .mt_rand(0,9);
    				$answer->submission_id=App\Submission::where('patient_id',$i)->first()->id;
    				$answer->save();
    			}elseif($j==6){

    			}elseif($j>10){
    			    $answer=new App\Answer();
    				$answer->patient_id=$i;
    				$answer->question_id=$j;
    				$answer->answer=App\QuestionOption::where('question_id',$j)->get()->option_text;
    				$answer->submission_id=App\Submission::where('patient_id',$i)->first()->id;
    				$answer->save();	
    			}
    		}
    	}
    	*/

        factory(App\Answer::class, 600)->create();
    }
}
