<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
//    模型关联表
    protected $table = 'category';
    protected $primaryKey="cate_id";
//    protected $fillable = ['user_name', 'user_pass'];
    protected $guarded = [];
    public $timestamps = false;
//    将分类数据排序，分类名称添加缩进，返回有层次关系的分类数据
    public function tree(){
        //先排序
        $category = $this->orderBy('cate_order','asc')->get();
        //添加缩进
        $cate = $this->getTree($category);
        return $cate;
    }

//    $cate=[
//        [1,'新闻'  ,'新闻'],
//        [3,‘八卦新闻’，'|-|-八卦新闻'],
//        [4,'|-|-娱乐新闻'],
//        [2,'娱乐'],
//
//        ];

    public function getTree($cate)
    {
        $arr = [];
        foreach($cate as $k=>$v){
//            判断是否是一级类
            if($cate[$k]->cate_pid == 0){
                $cate[$k]['_name'] =  $cate[$k]->cate_name;
                $arr[] = $cate[$k];
//                找当前一级类下的二级类
                foreach ($cate as $m=>$n){
//                    当前分类是正在遍历的一级类的子分类
                   if($v->cate_id == $n->cate_pid){
                        $cate[$m]['_name'] = "|-|---".$cate[$m]->cate_name;
                        $arr[] = $cate[$m];
                   }
                }
            }
        }

        return $arr;

    }
}
