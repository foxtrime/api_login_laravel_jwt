<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    protected $table = "procedures";

  	protected $fillable = [
   	'name',
   	'descripition',
   	
  ];

  public function procedureImage()
    {
        return $this->hasMany('App\Models\Image_Procedure', 'procedures_id');
    }

    public function proceduresConsul()
    {
        return $this->hasMany('App\Models\Consultation','procedures_id');
    }

}
