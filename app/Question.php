<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function form(){
    	return $this->belongsTo(Form::class);
    }

    public function questionOption(){
    	return $this->hasMany(QuestionOption::class);
    }

    public function answer(){
    	return $this->hasMany(Answer::class);
    }
}
