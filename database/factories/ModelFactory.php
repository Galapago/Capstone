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
    $race=['American Indian or Alaska Native','Caucasian (non-Hispanic)','Latino/Hispanic','African American','Native Hawaiin','Middle Eastern','Asian American','Two or More Races'];
    $sex=['M','F'];
    $marital_status=['M','S','D','W'];
    $health_insurance=['UnitedHealth','Kaiser Foundation','Wellpoint Inc.','Aetna','Humana','HCSC','Cigna Health','Highmark','BlueCross BlueShield','Centene Corp','Welfare','HIP','Medicare','Medicaid','Other'];
    $medication=['Abilify','Nexium','Humira','Crestor','Advair Diskus','Enbrel','Remicade','Cymbalta','Copaxone'.'Neulasta','Lantus Solostar','Rituxan','Spiriva Handihaler','Januvia','Atripla','Lantus','Avastin','Lyrica','Oxycontin','Epogen'];
    $user_id=mt_rand(4,1000);
    return [
        'user_id' => $user_id,
        'physician_id' => App\Physician::all()->random()->id,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'street_address' => $faker->streetAddress,
        'apt_ste' => $faker->secondaryAddress,
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'zip_code' => $faker->postcode,
        'dob' => $faker->date('Y-m-d', $max = 'now'),
        'height' => mt_rand(58,80),
        'weight' => mt_rand(90,300),
        'phone' => $faker->phoneNumber,
        'ssn' => $faker->randomNumber(9),
        'emergency_contact_name' => $faker->name,
        'emergency_contact_number' => $faker->phoneNumber,
        'emergency_contact_email' => $faker->safeEmail,
        'medication' => $medication[mt_rand(0,18)],
        'health_insurance' => $health_insurance[mt_rand(0,14)],
        'sex'=>$sex[mt_rand(0,1)],
        'race'=>$race[mt_rand(0,7)],
        'marital_status'=>$marital_status[mt_rand(0,3)],
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
    $random=mt_rand(1,39);
    $pharmacy=['CVS','Walgreens','Rate Aid','Walmart','HEB','CostCo'];
    $question=App\Question::where('id',$random)->first();
    $question_id=$question->id;
    if($random==1 || $random==3 || $random==5){
        $answer=[
        'question_id'=>$question_id,        
        'patient_id' => App\Patient::all()->random()->id,
        'submission_id' => App\Submission::all()->random()->id,
        'answer' => App\Physician::all()->random()->first_name . App\Physician::all()->random()->last_name];
    }elseif($random==2 || $random==4 || $random==7){
        $answer=['question_id'=>$question_id,        
        'patient_id' => App\Patient::all()->random()->id,
        'submission_id' => App\Submission::all()->random()->id,
        'answer' =>$faker->phoneNumber];
    }elseif($random==6){
        $answer=
        ['question_id'=>$question_id,        
        'patient_id' => App\Patient::all()->random()->id,
        'submission_id' => App\Submission::all()->random()->id,
        'answer' => $pharmacy[mt_rand(0,5)]];
    }else{
        $answer=App\QuestionOption::all()->random(1);
        while($answer->question_id!=$question_id){
            $answer=App\QuestionOption::orderByRaw("RAND()")->get();
        }
        $answer=[
            'question_id' => $question_id,
            'patient_id' => App\Patient::all()->random()->id,
            'answer' => $answer,
            'submission_id' => App\Submission::all()->random()->id
        ];
    }
    return $answer;
});