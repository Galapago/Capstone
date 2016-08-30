<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function physician(){
    	return $this->belongsTo(Physician::class);
    }

    public function submission() {
    	return $this->hasMany(Submission::class);
    }
}
