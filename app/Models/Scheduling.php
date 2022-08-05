<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scheduling extends Model
{
    protected $table = "schedules";

    protected $fillable = [
        'date',
        'hour',
        'location',
        'obs',
        'recurrence',
        'patient_id',
        'procedure',
        'user_id'
    ];

    public function shcedulingPatient()
    {
        return $this->belongsTo('App\Models\Patient', 'patient_id');
    }

    public function schedulesConsul()
    {
        return $this->belongsTo('App\Models\Consultation');
    }

    public function shcedulingUser()
    {
        return $this->belongsTo('App\User');
    }
}
