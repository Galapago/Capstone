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
        factory(App\Answer::class, 600)->create();
    }
}
