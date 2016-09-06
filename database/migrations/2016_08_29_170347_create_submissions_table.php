<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('form_id')->unsigned();
            $table->integer('patient_id')->unsigned();
            $table->timestamps();
            $table->foreign('form_id')->references('id')->on('forms');
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->unique(['form_id', 'patient_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('submissions');
    }
}
