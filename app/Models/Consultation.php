<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
 
	protected $table = "consultations";

  	protected $fillable = [
   	'schedules_id',
   	'procedures_id',
  ];

  	public function consultationImage()
   {
      return $this->hasMany('App\Models\Image_Consultation', 'consultations_id');
   }

   public function schedules()
 	{
    	return $this->belongsTo('App\Models\Scheduling');
 	}

 	public function procedures()
 	{
      return $this->belongsTo('App\Models\Procedure');
 	}



}
