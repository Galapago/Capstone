<?php

use Illuminate\Database\Seeder;

class SubmissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Subission::class, 477)->create();
    }
}
