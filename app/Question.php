<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function form(){
    	return $this->belongsTo(Form::class);
    }

    public function questionOptions(){
    	return $this->hasMany(QuestionOption::class);
    }

    public function answer(){
    	return $this->hasMany(Answer::class);
    }

    public function answerFrom($patient) {
    	return $this->answer()->where('patient_id', $patient->id)->get();
    }

    public function getPatientAnswers($answers) {
        $answers = $answers->filter(function($answer) {
            return $answer->question_id == $this->id;
        });

        return $answers;
    }
}
