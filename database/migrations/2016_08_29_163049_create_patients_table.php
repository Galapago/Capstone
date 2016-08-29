<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('username', 30)->unique();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->integer('ssn')->unsigned();
            $table->string('emergency_contact_name', 50);
            $table->integer('emergency_contact_number')->unsigned();
            $table->string('emergency_contact_email', 30);
            $table->string('medication');
            $table->string('health_insurance');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
