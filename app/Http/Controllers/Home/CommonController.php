<?php


namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;

use App\Http\Model\Article;
use App\Http\Model\Nav;
use App\Http\Model\Adv;

class CommonController  extends Controller
{

    public function __construct(){

//        导航数据   $nav  7
        $nav =  Nav::orderBy('nav_order','asc')->take(5)->get();
//        最新文章   $new 8
        $new = Article::orderBy('art_time','desc')->take(5)->get();
//        点击排行  $hot 5
        $hot = Article::orderBy('art_view','desc')->take(5)->get();
        //轮播图
        $adv = Adv::orderBy('adv_time','desc')->take(4)->get();


        view()->share('nav', $nav);
        view()->share('new', $new);
        view()->share('hot', $hot);
        view()->share('adv', $adv);
    }
}