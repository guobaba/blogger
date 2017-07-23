<?php

namespace App\Http\Controllers\Home;
use Validator;
use Illuminate\Http\Request;
use App\Http\Model\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use DB;
use Hash;
use Illuminate\Support\Facades\Input;
class InfoController extends CommonController
{

	/*
	**个人中心
	*/
    public function getIndex(Request $request)
    {
    	$user_id=$request->input('user_id');
    	//dd($user_id);
    	$details=DB::table('user_details')->where('det_id',$user_id)->first();
    	//dd($details);
    	//dd(session('user_home'));
        return view('home.info.index',['details'=>$details]);
    }

    public function postXiugai(Request $request)
    {
    	$data=$request->except('_token','user_id');
    	//dd($data);
    	$det_id=$request->input('user_id');
    	$res=DB::table('user_details')->where('det_id',$det_id)->update($data);
    	if($res){
    		return 1;//更新成功
    	}else{
    		return 2;//更新失败
    	}
    }
    public function getRepass()
    {	
    	return view('home.repass');
    }
    public function postDopass()
    {	
    	
    	$input=Input::except('_token');
    	$role=[
    		'password'=>'required|between:6,18',
    		'password'=>'same:password_c'
    	];
    	$mess=[
    	'password.required'=>'必须输入密码',
    	'password.between' =>'密码长度必须在6-18之间',
    	'password_c.same'  =>'新密码与确认密码一致'
    	];
    	$v = Validator::make($input,$role,$mess);
    	if($v->passes()){
    		if (Hash::check($input['password_a'], session('user_home')['user_pass'])) {
			    $res= \DB::table('user')->update(['user_pass'=>$input['password']]);
			    return redirect('/home/info/index');
			}else{
				return back() ->witherror($v);
			}
    	}else{
    		return back() ->witherror($v);
    	}

    }
 


}
