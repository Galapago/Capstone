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
            $table->integer('user_id')->unsigned();
            $table->string('first_name', 20);
            $table->string('last_name', 20);
            $table->integer('ssn')->unsigned();
            $table->string('emergency_contact_name');
            $table->integer('emergency_contact_number')->unsigned();
            $table->string('emergency_contact_email', 20);
            $table->string('medication');
            $table->string('health_insurance');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
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
