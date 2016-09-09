<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    public function physician(){
      return $this->belongsTo(Physician::class, 'npi', 'npi');
    }

    public function questions(){
    	return $this->hasMany(Question::class);
    }

    public function submission(){
    	return $this->hasMany(Submission::class);
    }

    public function patientForms(){
    	return $this->belongsToMany(PatientForms::class);
    }
}
