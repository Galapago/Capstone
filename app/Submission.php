<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    public function form(){
    	return $this->belongsTo(Form::class);
    }

    public function patient(){
    	return $this->belongsTo(Patient::class);
    }

    public function answer(){
    	return $this->hasMany(Answer::class);
    }
}
