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

        factory(App\Submission::class, 477)->create();
    }
}
