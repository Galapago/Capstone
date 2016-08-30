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
        factory(App\Submission::class, 477)->create();
    }
}
