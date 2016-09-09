<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class PatientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	$patients = [
            ['first_name' => 'Brandon', 'last_name' => 'Dinesman', 'street_address' => '100 Elm St', 'apt_ste' => '', 'city' => 'San Antonio', 'state' => 'TX', 'zip_code' => '78212', 'dob' => '1983-08-02', 'height' => '72', 'weight' => '180', 'phone' => '2102876927', 'ssn' => '123456789', 'emergency_contact_name' => 'mom', 'emergency_contact_number' => '1234567890', 'emergency_contact_email' => 'mom@mom.com', 'medication' => 'Vicodin', 'health_insurance' => 'Aetna','sex'=>'M','marital_status'=>'M','race'=>'Caucasian (non-Hispanic)'],
            ['first_name' => 'John', 'last_name' => 'Hernandez', 'street_address' => '100 Elm St', 'apt_ste' => '', 'city' => 'San Antonio', 'state' => 'TX', 'zip_code' => '78212', 'dob' => '1983-08-02', 'height' => '72', 'weight' => '180', 'phone' => '2108888888', 'ssn' => '999999999', 'emergency_contact_name' => 'dad', 'emergency_contact_number' => '1111111111', 'emergency_contact_email' => 'dad@dad.com', 'medication' => 'Zocor', 'health_insurance' => 'BlueCross BlueShield','sex'=>'M','marital_status'=>'M','race'=>'Latino/Hispanic'],
            ['first_name' => 'Tyler', 'last_name' => 'Warren', 'street_address' => '100 Elm St', 'apt_ste' => '1100', 'city' => 'San Antonio', 'state' => 'TX', 'zip_code' => '78212', 'dob' => '1983-08-02', 'height' => '72', 'weight' => '180', 'phone' => '2109199191', 'ssn' => '555555555', 'emergency_contact_name' => 'sister', 'emergency_contact_number' => '3333333333', 'emergency_contact_email' => 'sister@sister.com', 'medication' => 'Abilify', 'health_insurance' => 'Aetna','sex'=>'M','marital_status'=>'M','race'=>'Caucasian (non-Hispanic)']
		];

        foreach($patients as $patient){
            $patient1 = new App\Patient();
            $patient1->user_id = App\User::all()->random()->id;
            $patient1->physician_id = '1';//App\Physician::all()->random()->id;
            $patient1->first_name = $patient['first_name'];
            $patient1->last_name = $patient['last_name'];
            $patient1->street_address = $patient['street_address'];
            $patient1->apt_ste = $patient['apt_ste'];
            $patient1->city = $patient['city'];
            $patient1->state = $patient['state'];
            $patient1->zip_code = $patient['zip_code'];
            $patient1->dob = $patient['dob'];
            $patient1->height = $patient['height'];
            $patient1->weight = $patient['weight'];
            $patient1->phone = $patient['phone'];
            $patient1->ssn = $patient['ssn'];
            $patient1->emergency_contact_name = $patient['emergency_contact_name'];
            $patient1->emergency_contact_number = $patient['emergency_contact_number'];
            $patient1->emergency_contact_email = $patient['emergency_contact_email'];
            $patient1->medication = $patient['medication'];
            $patient1->health_insurance = $patient['health_insurance'];
            $patient1->sex = $patient['sex'];
            $patient1->marital_status = $patient['marital_status'];
            $patient1->race = $patient['race'];
            $patient1->save();
        }
        
    	factory(App\Patient::class, 1000)->create();
    }
}
