<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function submission(){
    	return $this->belongsTo(Submission::class);
    }

    public function question(){
    	return $this->belongsTo(Question::class);
    }
}
