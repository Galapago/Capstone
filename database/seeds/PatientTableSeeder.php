<?php

use Illuminate\Database\Seeder;

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
            ['username' => 'brandon', 'email' => 'brandon@codeup.com', 'password' => 'brandon', 'first_name' => 'brandon', 'last_name' => 'dinesman', 'ssn' => '123456789', 'emergency_contact_name' => 'mom', 'emergency_contact_number' => '1234567890', 'emergency_contact_email' => 'mom@mom.com', 'medication' => 'advil', 'health_insurance' => 'aetna'],
            ['username' => 'john', 'email' => 'john@codeup.com', 'password' => 'john', 'first_name' => 'john', 'last_name' => 'hernandez', 'ssn' => '999999999', 'emergency_contact_name' => 'dad', 'emergency_contact_number' => '1111111111', 'emergency_contact_email' => 'dad@dad.com', 'medication' => 'tylenol', 'health_insurance' => 'blue cross'],
            ['username' => 'tyler', 'email' => 'tyler@codeup.com', 'password' => 'tyler', 'first_name' => 'tyler', 'last_name' => 'warren', 'ssn' => '555555555', 'emergency_contact_name' => 'sister', 'emergency_contact_number' => '3333333333', 'emergency_contact_email' => 'sister@sister.com', 'medication' => 'anabolic steriods', 'health_insurance' => 'aetna'],
		];

        foreach($patients as $patient){
            $patient1 = new App\Patient();
            $patient1->patientname = $patient['patientname'];
            $patient1->email = $patient['email'];
            $patient1->password = Hash::make($patient['password']);
            $patient1->first_name = $patient['first_name'];
            $patient1->last_name = $patient['last_name'];
            $patient1->ssn = $patient['ssn'];
            $patient1->emergency_contact_name = $patient['emergency_contact_name'];
            $patient1->emergency_contact_number = $patient['emergency_contact_number'];
            $patient1->emergency_contact_email = $patient['emergency_contact_email'];
            $patient1->medication = $patient['medication'];
            $patient1->health_insurance = $patient['health_insurance'];
            $patient1->save();

    	factory(App\Patient::class, 480)->create();
    }
}
