<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class FormTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$form1=new App\Form();
    	$form1->form_name='test_form';
    	$form1->npi='00001';
    	$form1->save();
        factory(App\Form::class, 1)->create();
    }
}
