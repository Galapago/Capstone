<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['username' => 'test', 'email' => 'test@codeup.com', 'password' => 'password', 'clearance' => 'doctor','remember_token'=>'22'],
            ['username' => 'brandon', 'email' => 'brandon@codeup.com', 'password' => 'brandon', 'clearance' => 'patient','remember_token'=>'22'],
			['username' => 'john', 'email' => 'john@codeup.com', 'password' => 'john', 'clearance' => 'patient','remember_token'=>'22'],
			['username' => 'tyler', 'email' => 'tyler@codeup.com', 'password' => 'tyler', 'clearance' => 'doctor','remember_token'=>'22'],        
		];

        foreach($users as $user){
            $user1 = new App\User();
            $user1->username = $user['username'];
            $user1->email = $user['email'];
            $user1->password = Hash::make($user['password']);
            $user1->clearance = $user['clearance'];
            $user1->remember_token='22';
            $user1->save();
        }

        factory(App\User::class, 200)->create();
    }
}
