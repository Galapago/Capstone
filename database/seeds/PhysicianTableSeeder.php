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
            ['npi' => '1234567890', 'clinic' => '9999999999'];
            ['npi' => '9999999999', 'clinic' => '0000000000'];
            ['npi' => '5555555555', 'clinic' => '1111111111'];

        foreach($physicians as $physician){
            $physician1 = new App\Physician();
            $physician1->npi = $physician['npi'];
            $physician1->clinic = $physician['clinic'];
            $physician1->save();
        }

        factory(App\Physician::class, 17)->create();

    }
}
