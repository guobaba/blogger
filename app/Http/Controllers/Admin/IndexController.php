<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\User;
use Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

class IndexController extends Controller
{
    public function quit(){
        session(['username'=>null,'password'=>null]);

        return redirect('admin/login');
        
    }

    public function repass(){
    	//
    	return view('admin.pass');

    }

    public function dopass(Request $request){
    	$user_id = session('uid');

    	$input = $request->except('_token');

    	$user = User::where('user_id',$user_id)->first();
    	if($input['password_o'] == Crypt::decrypt($user['user_pass'])){

    		if($input['user_pass'] == $input['password_c']){
                 $pass = Crypt::encrypt($input['user_pass']);
            $re = $user->update(['user_pass'=>$pass]);
            if($re){
                return redirect('admin/user');
            }else{
                return back()->with('error','修改失败'); 
            }
         

                
            }else{
               return back()->with('error','新密码与确认密码不相等'); 
            }
    	}else{
    		return back()->with('error','原密码不正确');
    	}
    }
}
