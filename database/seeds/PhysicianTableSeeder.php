<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class PhysicianTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	        
        $physician1 = new App\Physician();
        $physician1->user_id='1';
        $physician1->first_name='Mike';
        $physician1->last_name='Hunt';
        $physician1->npi = '00001';
        $physician1->clinic = '00001';
        $physician1->save();
        factory(App\Physician::class, 20)->create();
    }
}
