<?php

namespace App\Http\Controllers\Home;
use App\Http\Model\Cate;
use Illuminate\Http\Request;
use App\Http\Model\Article;
use App\Http\Requests;
use App\Http\Model\Link;
use App\Http\Model\Nav;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Http\Model\Dis;
use App\Http\Model\User;
use App\Services\OSS;
class IndexController extends CommonController
{
    /**
     * 前台首页
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取页面所需要的数据
    //      图文文章  $pic   6
        $pic = Article::orderBy('art_time','desc')->take(4)->get();


        //分页文章  $art
        $art = Article::orderBy('art_time','desc')->paginate(4);

        //友情链接  $link
        $link = Link::all();

        return view('home.index',compact('pic','art','link'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cate($id)
    {
    //分类访问次数加1
       Cate::where('cate_id',$id)->increment('cate_view');
       //根据id查出当前分类的数据
       $cate = Cate::find($id);
       //获取当前分类下的文章
       $art = Article::orderBy('art_time','desc')->where('cate_id',$id)->paginate(4);
       //当前分类下的二级分类
       $submenu = Cate::where('cate_id',$id)->take(4)->get();
       //展示分类视图,将查出的数据绑定到视图上
       return view('home.list',compact('cate','art','submenu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function article($id)

    {

       
        //文章访问次数加1
        $article = Article::where('art_id',$id)->increment('art_view');
//         dd($article);
//        根据id获取当前的文章分类
       $art =   Article::join('category','article.cate_id','=','category.cate_id')->where('art_id',$id)->first();
//        dd($art);
//        上一篇  下一篇
      $article1 = Article::orderBy('art_id','desc')->where('art_id','<',$id)->first();

//      dd($articles);
       $article2 = Article::orderBy('art_id','asc')->where('art_id','>',$id)->first();

       $dis = Dis::join('user','discuss.user_id','=','user.user_id')->where('art_id',$id)->get();

     
        return view('home.new',compact('art','article1','article2','dis'));
    }

    public function dis($id){
        //dd(Input::except('_token'));
        if(!session('user_home')){
          return "你好，请先登录！";
        }
        $input = Input::except('_token');
        $input['dis_time'] =time();
        $input['user_id'] =session('user_home')['user_id'];
        $re = Dis::create($input);
       
        if($re){
            return "回复成功";
        }else{
            return "回复失败";
            }
        }   
        

      
 

 
}

