<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class medical_history extends Model
{
    protected $table = 'medical_history';
    public $primaryKey = 'medical_history_id';

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id'); 
    }
}
