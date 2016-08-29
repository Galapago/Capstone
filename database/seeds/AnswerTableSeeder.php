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
        factory(App\Answer::class, 30)->create();
    }
}
