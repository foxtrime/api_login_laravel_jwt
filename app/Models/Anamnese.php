<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anamnese extends Model
{

	protected $table = "anamnese";

	protected $fillable = [
		'tratamento_medico',
    	'tratamentomedicotexto',
    	'doenca_resp',
    	'pressao_arte',
    	'alergia',
        'alergiatexto',
    	'hepatite', 
    	'diabetes', 
    	'gravidez',
    	'bifosfonatos',
    	'cirurgia', 
    	'cirurgiatexto',
    	'medicamentos',
    	'medicamentostexto',
    	'receitado',
    	'sangramento',
    	'sangra_facil',
    	'sensibilidade',
    	'gosto_ruim',
    	'ferida_dez',
    	'estala', 
    	'dor_ouvido', 
    	'anestesia', 
    	'convulsao',
    	'sinusite',
    	'febre_reumatica',
    	'patient_id',
  	];

  	public function anamnesePatient()
    {
        return $this->hasOne('App\Models\Patient');
    }



}
