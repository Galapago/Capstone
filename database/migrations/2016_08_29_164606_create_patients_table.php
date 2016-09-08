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
            $table->integer('physician_id')->unsigned();
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->string('street_address', 100);
            $table->string('apt_ste', 20);
            $table->string('city', 20);
            $table->string('state', 20);
            $table->integer('zip_code', 15)->unsigned();
            $table->date('date');
            $table->integer('height')->unsigned();
            $table->integer('weight')->unsigned();
            $table->integer('phone')->unsigned();
            $table->integer('ssn')->unsigned();
            $table->string('emergency_contact_name', 50);
            $table->integer('emergency_contact_number')->unsigned();
            $table->string('emergency_contact_email', 30);
            $table->string('medication');
            $table->string('health_insurance');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('physician_id')->references('id')->on('physicians');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('patients');
    }
}
