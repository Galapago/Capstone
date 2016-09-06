<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class SubmissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$submission=new App\Submission();
    	$submission->form_id=1;
    	$submission->patient_id=1;
    	$submission->save();
    	$patient_count=App\Patient::all()->count();
    	for($i=2;$i<=$patient_count;$i++){
    		$submission=new App\Submission();
    		$submission->form_id=1;
    		$submission->patient_id=$i;
    		$submission->save();
    	}


        // foreach (range(1, 477) as $i) {
        //     \App\Submission::firstOrCreate([
        //         'form_id' => App\Form::all()->random()->id,
        //         'patient_id' => App\Patient::all()->random()->id,
        //     ]);
        // }

        //factory(App\Submission::class, 477)->create();

    }
}
