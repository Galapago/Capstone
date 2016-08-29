<?php

use Illuminate\Database\Seeder;

class PhysicianTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	$physicians = [
            ['username' => 'brandon', 'email' => 'brandon@codeup.com', 'password' => 'brandon', 'npi' => '123456', 'clinic' => '9999999999'];
            ['username' => 'john', 'email' => 'john@codeup.com', 'password' => 'john', 'npi' => '999999', 'clinic' => '0000000000'];
            ['username' => 'tyler', 'email' => 'tyler@codeup.com', 'password' => 'tyler', 'npi' => '555555', 'clinic' => '1111111111'];

        foreach($physicians as $physician){
            $physician1 = new App\Physician();
            $physician1->username = $physician['username'];
            $physician1->email = $physician['email'];
            $physician1->password = Hash::make($physician['password']);
            $physician1->npi = $physician['npi'];
            $physician1->clinic = $physician['clinic'];
            $physician1->save();
        }

        factory(App\Physician::class, 20)->create();

    }
}
