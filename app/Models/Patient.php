<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = "patients";

    protected $fillable = [
        'id',
        'name',
        'email',
        'telephone',
        'date_nasc',
        'address',
        'RG',
        'CPF',
        'name_resp',
        'RG_resp',
        'CPF_resp',
    ];

//Relationships here

    public function patientScheduling()
    {
        return $this->hasMany('App\Models\Scheduling');
    }

    public function anamnese()
    {
        return $this->hasOne('App\Models\Anamnese', 'patient_id');
    }

    public function patientTermo()
    {
        return $this->hasMany('App\Models\Scheduling');
    }


}
