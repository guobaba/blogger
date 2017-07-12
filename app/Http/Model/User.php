<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table='user';
    protected $primaryKey='user_id';
    protected $guarded = [];
    public function personal()
    {
        return $this->hasOne('App\Http\Model\Personal','user_id','user_id');
    }
}
