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

    public function answers(){
    	return $this->hasMany(Answer::class);
    }

    public static function rules() {

		// $rules = array(
	 //        'title' => 'required|max:100',
	 //        'url'   => "required|url",
	 //        'content' => 'required'
	 //    );

	 //    return $rules;

	}
}
