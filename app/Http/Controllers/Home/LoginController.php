<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use DB;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {

        return view('home.login.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postDologin(Request $request)
    {

        $data = $request -> except('_token');
        //查询
        $res = DB::table('user')->where('user_email',$data['user_email'])->first();

        if(!$res){
            return back() -> with('error','该邮箱不存在');
        }else{
            //判断邮箱状态
            if(!$res['user_status']== 1){
                return back() -> with('error','该邮箱未激活');
            }
            //用户名存在  检测密码
            if(Hash::check($data['user_pass'],$res['user_pass'])){
                session(['user_home'=>$res]);
//                if($res['user_status'] != 1){
//                     return back()->with('error','邮箱未激活,请激活!');
//                }
                return redirect('/');
            }else{
                return back() -> with('error','邮箱或密码错误');
            }
        }

    }

    //退出登录
    public function getDel(){
        \session(['user_home'=>null]);
        return redirect('/');
    }

  
}
