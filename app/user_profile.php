<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_profile extends Model
{
    use SoftDeletes;
    
    protected $table = 'user_profiles';
    public $primaryKey = 'user_profile_id';
    protected $dates = ['deleted_at'];
    protected $with = ['user', 'civil_status'];

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'middle_name',
        'gender',
        'birthday',
        'citizenship',
        'civil_status_id',
        'contact_no',
        'email',
        'address_line_1',
        'address_line_2',
        'address_line_3',
        'bloodtype_id',
        'allergies'
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'id');
    }

    public function civil_status()
    {
        return $this->hasOne('App\civil_status', 'civil_status_id', 'civil_status_id');
    }

    public function bloodtype()
    {
        return $this->hasOne('App\bloodtype', 'bloodtype_id', 'bloodtype_id');
    }
}
