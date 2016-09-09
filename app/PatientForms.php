<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientForms extends Model
{
    public function patients() {
    	return $this->belongsToMany(Patient::class);
    }

    public function forms() {
    	return $this->belongsToMany(Form::class);
    }

}
