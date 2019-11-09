<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class result extends Model
{
    use SoftDeletes;

    protected $table = 'results';
    public $primarykey = 'result_id';
}
