<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Hash;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
class ZhuceController extends Controller
{
    public function getAdd(){
        

       return view('home.zhuce.add');
    }
    public function postInsert(Request $request){
        //检测数据是否必填
        //处理数据
        //ctime 创建时间
        //token 用户加密
        //password 加密
        //dd($request->all()); 
        $data = $request -> except('_token','repassword');
        //dd($data);
        $data['user_pass'] = Hash::make($data['user_pass']);
        $data['user_ctime'] = time();
        $data['user_token'] = str_random(50);

        // 3.发送邮件   
        // 给谁发  注册邮箱号
        // id       id
        // token    token
        $id= DB::table('user')->insertGetId($data);
//        DB::table('personal')->insertGetId($)
        //dd($id);
        if($id){
           self::mailto($data['user_email'],$id,$data['user_token']);
           return redirect('home/login/login');
        }
        //dd($data);       
        
    }
    public function getZhuce(Request $request){

        $arr = $request ->all();
      
        //dd($arr);
        $user_token = DB::table('user')->where('user_id',$arr['user_id'])->select('user_token')->first();
        if($arr['user_token'] == $user_token['user_token']){
            // 修改数据库
            $res = DB::table('user')->where('user_id',$arr['user_id'])->update(['user_status'=>1,'user_token'=>str_random(50)]);
            if($res){
                echo '注册成功';
            }else{
                echo '注册失败';
            }
        }else{
            return redirect('/home/zhuce/add')->with('error','验证失败，请注册');       
         }
    }
    public static function mailto($email,$id,$token){
        Mail::send('home.mail.index', ['id' => $id,'user_token'=>$token,'user_email'=>$email], function ($m) use ($email) {
           
            $m->to($email)->subject('这是一封注册邮件!');
        });
    }    
}
