<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('answers')->delete();
        DB::table('submissions')->delete();
        DB::table('questions')->delete();
        DB::table('forms')->delete();
        DB::table('physicians')->delete();
        DB::table('patients')->delete();
        DB::table('users')->delete();
        $this->call(UserTableSeeder::class);
        $this->call(PatientTableSeeder::class);
        $this->call(PhysicianTableSeeder::class);
        $this->call(FormTableSeeder::class);
        $this->call(QuestionTableSeeder::class);
        $this->call(SubmissionTableSeeder::class);
        $this->call(AnswerTableSeeder::class);

        Model::reguard();
    }
}
