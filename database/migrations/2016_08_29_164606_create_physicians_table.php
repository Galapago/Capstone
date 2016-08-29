<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhysiciansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physicians', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('username', 20)->unique();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->integer('npi')->unsigned();
            $table->integer('patient_id')->unsigned();
            $table->integer('clinic')->unsigned();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('patient_id')->references('id')->on('patients');
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
