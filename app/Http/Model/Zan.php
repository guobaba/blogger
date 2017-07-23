<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class zan extends Model
{
    //    模型关联表
    protected $table = 'zan';
    protected $primaryKey="zan_id";
//    protected $fillable = ['user_name', 'user_pass'];
    protected $guarded = [];
    public $timestamps = false;
}
