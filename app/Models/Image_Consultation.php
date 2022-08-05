<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image_Consultation extends Model
{
    protected $table = "images_consultations";

  	protected $fillable = [
   	'name',
   	'filename',
    // 'extensao',
   	'consultations_id',

  ];

  public function imageConsultation()
    {
        return $this->belongsTo('App\Models\Procedure', 'consultations_id');
    }
  
}
