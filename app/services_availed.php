<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class services_availed extends Model
{
    use SoftDeletes;
    
    protected $table = 'services_availed';
    public $primaryKey = 'services_availed_id';
}
