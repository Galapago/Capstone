<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('form_id')->unsigned();
            $table->string('question', 200);
            $table->enum('section', ['personal', 'insurance', 'history', 'review_of_symptoms', 'doctor_specific']),
            $table->enum('input_type',['radio', 'checkbox', 'textarea']);
            $table->boolean('quantifiable');
            $table->timestamps();
            $table->foreign('form_id')->references('id')->on('forms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('questions');
    }
}
