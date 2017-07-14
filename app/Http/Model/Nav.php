<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{
    //    模型关联表
    protected $table = 'navs';
    protected $primaryKey="nav_id";
    protected $guarded = [];
    //    将导航分类数据排序，分类导航名称添加缩进，返回有层次关系的分类数据
    public function tree()
    {
        //先排序
        $navs = $this->orderBy('nav_order', 'asc')->get();
        //添加缩进
        $nav = $this->getTree($navs);
        return $nav;
    }


    public function getTree($nav)
    {
        $arr = [];
        foreach($nav as $k=>$v){

            if($nav[$k]->nav_pid == 0){
                $nav[$k]['_name'] =  $nav[$k]->nav_name;
                $arr[] = $nav[$k];

                foreach ($nav as $m=>$n){

                    if($v->nav_id == $n->nav_pid){
                        $nav[$m]['_name'] = "|-|-".$nav[$m]->nav_name;
                        $arr[] = $nav[$m];
                    }
                }
            }
        }

        return $arr;

    }
}
