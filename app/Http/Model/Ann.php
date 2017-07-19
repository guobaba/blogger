<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Ann extends Model
{
    //模型关联表
    protected $table = 'ann';
    protected $primaryKey="ann_id";


    protected $guarded=[];
    public $timestamps = false;
}