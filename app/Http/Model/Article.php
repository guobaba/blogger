<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //    模型关联表
    protected $table = 'article';
    protected $primaryKey="art_id";
//    protected $fillable = ['user_name', 'user_pass'];
    protected $guarded = [];
    public $timestamps = false;
}
