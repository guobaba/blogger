<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table='roles';
    protected $primaryKey='role_id';
    protected $guarded = ['description'];

    /**
     * 属于该身份的用户。
     */
    public function users()
    {
        return $this->belongsToMany('App\Http\Model\User','role_user','role_id','user_id');
    }

    /**
     * 建立跟权限模型的管理。
     */
    public function permissions()
    {

        return $this->belongsToMany('App\Http\Model\Permission','permission_role','role_id','permission_id');

    }
}
