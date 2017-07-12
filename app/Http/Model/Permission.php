<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table='permissions';
    protected $primaryKey='id';
//    protected $fillable = ['name','description'];
    protected $guarded = [];

    /**
     * 属于该用户的身份。
     */
    public function role()
    {
        return $this->belongsToMany('App\Http\Model\Role','permission_user','permission_id','role_id');
    }
}
