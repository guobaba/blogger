<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table='personal';
    protected $primaryKey='pers_id';
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\Http\Model\User','user_id','user_id');
    }
}
