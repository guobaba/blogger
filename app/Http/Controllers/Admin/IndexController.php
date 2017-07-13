<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Role;
use App\Http\Model\User;
use Illuminate\Support\Facades\Crypt;
use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class IndexController extends Controller
{

    public function test()
    {
        $user = User::find(12)->roles()->get();
        $role = Role::find(1)->users()->get();
        dd($role);
    }
    
    
    // 退出登录
    public function quit()
    {
//        清空session
        \session(['user'=>null]);
        return redirect('/admin/login');
    }
    // 修改密码视图
    public function repass()
    {
       return view('admin.pass');
    }
    // 修改密码
    public function dorepass()
    {
        $input = Input::except('_token');
//        dd($input);
        $role = [
            'password'=>'required|between:6,18',
            'password_c'=>'same:password'
        ];
        $mess = [
            'password.required'=>'必须输入密码',
            'password.between'=>'密码长度必须在6-18位之间',
            'password_c.same'=>'新密码与确认密码必须一致'
        ];
        $v = Validator::make($input,$role,$mess);
        if($v->passes()){
            // 判断输入的原密码与数据库中的密码是否一致
            $user = User::where('user_id',session('user')->user_id)->first();
            if(trim($input['password_o']) != Crypt::decrypt($user->user_pass)){
                return back()->with('errors','密码错误');
            }else{
                $pass = Crypt::encrypt($input['password']);
                $re = $user->update(['user_pass'=>$pass]);
                if($re){
                    // 更新密码
                    return redirect('admin/info');
                }else{
                    return back()->with('error','密码更新失败');
                }
            }
        }else{
            return back()->witherrors($v);
        }

    }
}
