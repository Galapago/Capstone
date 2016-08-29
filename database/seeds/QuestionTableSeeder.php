<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Question::class, 30)->create();
    }
}
