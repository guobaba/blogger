<?php

namespace App\Http\Controllers\Home;
use App\Http\Model\Yonghu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LiuyanController extends CommonController
{
    public function getIndex(){
        
        $yonghu = Yonghu::join('user','yonghu.user_id','=','user.user_id')->paginate(4);
   
        return view('home.liuyan.yonghu',compact('yonghu'));  
        
    }

    public function postAdd(){
        if(!session('user_home')){
          return "你好，请先登录！";
        }

        if(session('user_home')['user_status'] == '0'){
            return '您被禁言';
        }
        $input = Input::except('_token');
        $input['y_time'] =time();
        $input['user_id'] =session('user_home')['user_id'];
        $input['y_status'] =0;
        $re = Yonghu::create($input);

        if($re){
            return "回复成功";
        }else{
            return "回复失败";
        }
   }
    
}
