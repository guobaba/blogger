<?php


namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;

use App\Http\Model\Article;
use App\Http\Model\Nav;

class CommonController  extends Controller
{

    public function __construct(){

//        导航数据   $nav  7
        $nav =  Nav::orderBy('nav_order','asc')->take(10)->get();
//        最新文章   $new 8
        $new = Article::orderBy('art_time','desc')->take(8)->get();
//        点击排行  $hot 5
        $hot = Article::orderBy('art_view','desc')->take(8)->get();


        view()->share('nav', $nav);
        view()->share('new', $new);
        view()->share('hot', $hot);
    }
}