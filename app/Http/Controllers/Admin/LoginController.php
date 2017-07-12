<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
require_once app_path().'/Org/code/Code.class.php';
use App\Org\code\Code;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    /**
     *  返回后台登录页面
     * @param 参数
     * @author xxx
     * @Date 2017-7-3
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        // 返回登录视图
        return view('admin.login');
    }

    public function dologin(Request $request)
    {
        // 获取用户传递的数据
//        dd($request->all());
//        $input = $request -> except('_token');
        //第二种获取请求数据的方法
        $input = Input::except('_token');
        // 验证规则
        $role =[
            'username'=>'required|between:6,18',
            'password'=>'required|between:6,18'
        ];
        // 提示信息
        $mess=[
            'username.required'=>'必须输入用户名',
            'username.between'=>'用户名长度必须在6-18位之间',
            'password.required'=>'必须输入密码',
            'password.between'=>'密码长度必须在6-18位之间'
        ];
//        表单验证
        $validator = Validator::make($input,$role,$mess);
        if($validator->passes()){
            // 验证验证码
            if(strtoupper($input['code']) !=  session('code')){
                return back()->with('errors','验证码错误')->withInput();
            }

            // 用户名
            $user = User::where('user_name',$input['username'])->first();
            if(!$user){
                return back()->with('errors','无此用户')->withInput();
            }

            // 密码
            if($input['password'] != Crypt::decrypt($user->user_pass)){
                return back()->with('errors','密码错误')->withInput();
            }

            // 将用户信息添加到session中
            \session(['user'=>$user]);

            // 登录
            return redirect('/admin/index');
        }else{
//            如果没有通过表单验证
            return back()->withErrors($validator);
        }






    }

    public function crypt()
    {
        $str = '123456';
//        echo Crypt::encrypt($str);

        $str1 = 'eyJpdiI6Ijg1RDRBN2NnMGZQRzNNMWpHcDRrNHc9PSIsInZhbHVlIjoid1pUd3dPdUh2Sk9QN2YwU1llc09odz09IiwibWFjIjoiMGM3NTA4M2JiMWM0MDkyZTViZTg4ODI1ZWMyYzAyNmMzNWRiYjYzNWY5MDBhODg4NWM0MjNmNGI2ZGFhNGJjOSJ9';
        echo Crypt::decrypt($str1);
    }

    public function store()
    {

    }

    public function index()
    {
        // 返回视图首页
        return view('admin.index');
    }

    public function info()
    {
        return view('admin.info');
    }

    public function code()
    {
        $code = new Code();
        $code->make();
    }
}
