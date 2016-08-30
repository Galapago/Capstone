<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    public function physician(){
      return $this->belongsTo(Physician::class, 'npi');
    }

    public function question(){
    	return $this->hasMany(Questions::class);
    }

    public function submission(){
    	return $this->hasMany(Submission::class);
    }
}
