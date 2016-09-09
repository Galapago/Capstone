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

    public function submissions() {
    	return $this->hasMany(Submission::class);
    }

    public function patientForms() {
    	return $this->belongsToMany(PatientForms::class);
    }
}
