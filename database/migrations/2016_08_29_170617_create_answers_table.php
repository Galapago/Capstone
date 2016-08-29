<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('question_id')->unsigned;
            $table->integer('patient_id')->unsigned;
            $table->string('answer');
            $table->integer('submission_id')->unsigned();
            $table->foreign('question_id')->references('id')->on('questions');
            $table->foreign('submission_id')->references('id')->on('submissions');

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
