<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Termo extends Model
{
    protected $table = "termos";

	protected $fillable = [
		'pdfpath',
		'name'
  	];


  	public function termosPatient()
    {
        return $this->hasMany('App\Models\Termo_Patient','termos_id');
    }
}
