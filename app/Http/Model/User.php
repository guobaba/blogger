<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table='user';
    protected $primaryKey='user_id';
    protected $guarded = [];

    /**
     * 属于该用户的身份。
     */
    public function roles()
    {
        return $this->belongsToMany('App\Http\Model\Role','role_user','user_id','role_id');
    }


    public function personal()
    {
        return $this->hasOne('App\Http\Model\Personal','user_id','user_id');
    }
}
