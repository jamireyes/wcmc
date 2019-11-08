<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_vital_signs extends Model
{
    protected $table = 'user_vital_signs';
    
    public function patient()
    {
        return $this->hasOne('App\User', 'id', 'patient_id'); 
    }

    public function vital_sign()
    {
        return $this->hasOne('App\vital_sign', 'vital_sign_id', 'vital_sign_id'); 
    }
}
