<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    $clearance = ['patient', 'doctor'];
    return [
        'username' => $faker->username,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'clearance' => $clearance[mt_rand(0,1)],
        'remember_token' => str_random(10)
    ];
});

$factory->define(App\Physician::class, function (Faker\Generator $faker) {
    return [
        'user_id' => App\User::all()->random()->id,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'npi' => $faker->unique()->randomNumber(5),
        'clinic' => $faker->randomNumber(5),
    ];
});

$factory->define(App\Patient::class, function (Faker\Generator $faker) {
    return [
        'user_id' => App\User::all()->random()->id,
        'physician_id' => App\Physician::all()->random()->id,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'ssn' => $faker->randomNumber(9),
        'emergency_contact_name' => $faker->name,
        'emergency_contact_number' => $faker->phoneNumber,
        'emergency_contact_email' => $faker->safeEmail,
        'medication' => $faker->word,
        'health_insurance' => $faker->word,
    ];
});

$factory->define(App\Form::class, function (Faker\Generator $faker) {
    return [
        'form_name' => $faker->word,
        'npi' => App\Physician::all()->random()->npi,
    ];
});

$factory->define(App\Question::class, function (Faker\Generator $faker) {
    return [
        'form_id' => 2,
        'question' => $faker->sentence,
        'quantifiable' => $faker->boolean,
    ];
});

$factory->define(App\QuestionOption::class, function (Faker\Generator $faker) {
    return [
        'question_id' => App\Question::all()->random()->id,
        'option_text' => $faker->sentence,
    ];
});
$factory->define(App\Submission::class, function (Faker\Generator $faker) {
    return [
        'form_id' => App\Form::all()->random()->id,
        'patient_id' => App\Patient::all()->random()->id,
    ];
});
$factory->define(App\Answer::class, function (Faker\Generator $faker) {
    $question=App\Question::where('id',mt_rand(1,39))->first();
    if($question->input_type=='textarea'){
        $answer=[
        'question_id'=>$question->id,        
        'patient_id' => App\Patient::all()->random()->id,
        'submission_id' => App\Submission::all()->random()->id,
        'answer' => $faker->firstName . $faker->lastName];
    }else{
        $answer=[
            'question_id' => $question->id,
            'patient_id' => App\Patient::all()->random()->id,
            'answer' => App\QuestionOption::where('question_id',$question->id)->get()->random()->option_text,
            'submission_id' => App\Submission::all()->random()->id,
        ];
    }
    return $answer;
});