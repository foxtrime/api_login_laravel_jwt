<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image_Exams extends Model
{
   	
   	protected $table = "images_exams";

  	protected $fillable = [
   	'filename',
    // 'extensao',
   	'exams_id',

  ];

  public function imageExams()
    {
        return $this->belongsTo('App\Models\Exams', 'exams_id');
    }
   


}
