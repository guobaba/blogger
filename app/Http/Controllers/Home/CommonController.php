<?php


namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;

use App\Http\Model\Article;
use App\Http\Model\Cate;
use App\Http\Model\Nav;
use App\Http\Model\Adv;
use App\Http\Model\Link;
use App\Http\Model\Personal;

class CommonController  extends Controller
{

    public function __construct(){

        $pic = Article::orderBy('art_time','desc')->take(4)->get();
        $cate_id = $pic->toArray()[0]['cate_id'];
        $aa = Cate::where('cate_pid',$cate_id)->get();

//        导航数据   $nav  7
        $nav =  Nav::orderBy('nav_order','asc')->take(5)->get();
//        最新文章   $new 8
        $new = Article::orderBy('art_time','desc')->take(5)->get();
//        点击排行  $hot 5
        $hot = Article::orderBy('art_view','desc')->take(5)->get();
        //轮播图
        $adv = Adv::orderBy('adv_time','desc')->take(4)->get();
        $pre = new Personal;
        //后台用户信息
        if(!is_null(session('user'))){
            $pre -> where('user_id',session('user')->user_id);
        }else{
            $pre -> where('user_id',14);
        }

        $per = $pre->first()->toArray();
        //友情链接  $link
        $link = Link::all();



        view()->share('nav', $nav);
        view()->share('new', $new);
        view()->share('hot', $hot);
        view()->share('adv', $adv);
        view()->share('link', $link);
        view()->share('per', [$per]);
        view()->share('aa', $aa);

    }
}