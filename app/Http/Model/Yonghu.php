<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Yonghu extends Model
{
      //模型关联表
    protected $table = 'yonghu';
    protected $primaryKey="y_id";


    protected $guarded=[];
    public $timestamps = false;
}
