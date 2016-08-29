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
        factory(App\Physician::class, 20)->create();

    }
}
