<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Termo_Patient extends Model
{
    protected $table = "termos_patients";

	protected $fillable = [
		'patients_id',
   		'termos_id',
   		'aceito',
   		'recusado',
  	];


  	public function patients()
 	{
    	return $this->belongsTo('App\Models\Patient');
 	}

 	public function termos()
 	{
      return $this->belongsTo('App\Models\Termo');
 	}
}
