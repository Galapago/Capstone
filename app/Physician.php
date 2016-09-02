<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Physician extends Model
{
    public function user(){
      return $this->belongsTo(User::class);
    }

    public function patients() {
    	return $this->hasMany(Patient::class);
    }

    public function forms() {
    	return $this->hasMany(Form::class,'npi', 'npi');
    }
}
