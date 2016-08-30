<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class QuestionOptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\QuestionOption::class, 30)->create();
    }
}
