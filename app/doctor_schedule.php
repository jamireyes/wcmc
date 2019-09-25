<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class doctor_schedule extends Model
{
    protected $table = 'doctor_schedules';
    public $primaryKey = 'doctor_schedule_id';
}
