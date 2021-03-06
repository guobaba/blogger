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
use App\Http\Model\Personal;
use App\Services\OSS;
use App\Http\Model\Zan;
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
        $cate_id = $pic->toArray()[0]['cate_id'];
//        dd($cate_id);
        $aa = Cate::where('cate_id',$cate_id)->get();
//        dd($aa);
//        $cate_pid = $aa->toArray();
//        dd($cate_pid);

        //分页文章  $art
        $art = Article::orderBy('art_time','desc')->paginate(4);
        $arts = Article::orderBy('art_view','desc')->paginate(4);
        //个人用户中心
        if(session('user'))
        {
          $per = personal::where('user_id',session('user')->toArray()['user_id'])->get()->toArray();
        }
       
        return view('home.index',compact('pic','art','link','per','arts','aa'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cate(Request $request)
    {
        $arr=[];
        if($request->has('search'))
        {
            $id=empty($request->input('id'))?'':$request->input('id');
            //根据id查出当前分类的数据
            $cate = Cate::find($id);
            //当前分类下的二级分类
            $submenu = Cate::where('cate_id',$id)->take(4)->get();
            //个人用户中心
            if(session('user'))
            {
                $per = personal::where('user_id',session('user')->toArray()['user_id'])->get()->toArray();

            }
            //获取当前分类下的文章
         $arts  = Article::orderBy('art_time','desc')->where('cate_id',$id)->paginate(4);
            $art=Article::where('art_title','like','%'.$request->input('search').'%')
                        ->orwhere('art_editor','like','%'.$request->input('search').'%')
                        ->orwhere('art_tag','like','%'.$request->input('search').'%')
                        ->paginate(4);
            $arr=['search'=>$request->input('search')];

        }else{
            $id=empty($request->input('id'))?'':$request->input('id');
            //分类访问次数加1
            Cate::where('cate_id',$id)->increment('cate_view');
            //根据id查出当前分类的数据
            $cate = Cate::find($id);
            //获取当前分类下的文章
            $art  = Article::orderBy('art_time','desc')->where('cate_id',$id)->paginate(4);
            $arts = Article::orderBy('art_view','desc')->paginate(4);
            //当前分类下的二级分类
            $submenu = Cate::where('cate_id',$id)->take(4)->get();
            //个人用户中心
            if(session('user'))
            {
                $per = personal::where('user_id',session('user')->toArray()['user_id'])->get()->toArray();

            }
            $arr=['id'=>$id];
        }

        //展示分类视图,将查出的数据绑定到视图上
        return view('home.list',compact('cate','art','submenu','arts','per','arr'));




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
//       dd($art);
//        上一篇  下一篇
      $article1 = Article::orderBy('art_id','desc')->where('art_id','<',$id)->first();
      //dd($article1);

//      dd($articles);
       $article2 = Article::orderBy('art_id','asc')->where('art_id','>',$id)->first();

       $dis = Dis::join('user','discuss.user_id','=','user.user_id')->where('art_id',$id)->get();
       // $zan = Zan::join('user','zan.user_id','=','user.user_id')->where('art_id',$id)->first();
       $str = session('user_home')['user_id'];
       $zan = \DB::Table('zan')->where('art_id','=',$id)->where('user_id','=',$str)->first();
       
       //dd($zan);
       return view('home.new',compact('art','article1','article2','dis','zan'));
    }

    public function dis($id){
        //dd(Input::except('_token'));
        if(!session('user_home')){
          return "你好，请先登录！";
        }
//        return session('user_home');
        $data = User::find(session('user_home')['user_id']);

        if($data['user_status'] == '0'){
            return '您被禁言';
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
        
      public function zan()
      {
          if (!session('user_home')) {
              return "你好，请先登录！";
          }
          $id = Input::except('_token');
          $id['user_id'] = session('user_home')['user_id'];
          $res = \DB::table('zan')->insert($id);
          // dd($res);
          if ($res) {
              \DB::table('article')->where('art_id', $id['art_id'])->increment('art_zan');
              return '点赞成功';
          } else {
              return "点赞失败";

          }
      }
       
    public function cang(){
      dd(Input::except('_token'));
        if(!session('user_home')){
            return "你好，请先登录！";
          }
    }
      
 // 判断同一个art_id下，SESSION中的user_id是否等于$zan表里面的user_id。
 // 相等，如果点赞了，就显示已点赞；
 // 如果不等，表明不是同一个用户，background='null',$art['art_zan']正常

 
}

