<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exams extends Model
{
    protected $table = "exams";

	protected $fillable = [
		'name',
    'date',
    'patient_id'
    	
  	];

  	public function examsPatient()
    {
        return $this->hasOne('App\Models\Patient');
    }

    public function examsImage()
   {
      return $this->hasMany('App\Models\Image_Exams', 'exams_id');
   }
}
