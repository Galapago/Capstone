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
        factory(App\Form::class, 5)->create();
    }
}
