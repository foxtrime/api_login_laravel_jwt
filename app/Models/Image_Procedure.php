<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image_Procedure extends Model
{
    protected $table = "images_procedures";

  	protected $fillable = [
   	'name',
    'filename',
    // 'extensao',
   	'procedures_id',

  ];

  public function imageProcedure()
    {
        return $this->belongsTo('App\Models\Procedure', 'procedures_id');
    }


}
