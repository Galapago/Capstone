<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
	public function question(){
    	return $this->belongsTo(Question::class);
    }

    public function check($answers) {
    	$answers = $answers->filter(function($answer) {
            return $answer->answer == $this->option_text;
        });

        return $answers->count() > 0;
    }
}
