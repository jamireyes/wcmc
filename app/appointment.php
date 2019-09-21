<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class appointment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'appointment_id',
        'doctor_id',
        'nurse_id',
        'patient_id',
        'status'
    ];

    protected $table = 'appointments';
    public $primaryKey = 'appointment_id';
    protected $dates = ['deleted_at'];

    public function doctor()
    {
        return $this->hasMany('App\User', 'id', 'doctor_id'); 
    }

    public function nurse()
    {
        return $this->hasMany('App\User', 'id', 'nurse_id'); 
    }

    public function patient()
    {
        return $this->hasMany('App\User', 'id', 'patient_id'); 
    }
}
