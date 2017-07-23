<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Sub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SubscibeController extends Controller
{
    public function subscibe(Request $request)
    {
        $input = $request->except('_token');
        $input['sub_token'] = str_random(50);
//        dd($input);
        $re = Sub::where('sub_email',$input)->get()->toArray();
//        dd($re);
        if(!empty($re)){
            return back()->with('您已经订阅过了,请不要重复订阅');
        }else{
            $id= DB::table('sub')->insertGetId($input);
//            dd($id);
            if($id){
                self::mailto($input['sub_email'],$id,$input['sub_token']);
                return back();
            }
        }
    }

    public function getDebook(Request $request){

        $arr = $request ->all();
//        dd($arr);
        $sub_token = DB::table('sub')->where('sub_email',$arr['sub_email'])->select('sub_token')->first();
//        dd($sub_token);
        if($arr['sub_token'] == $sub_token['sub_token']){
            // 修改数据库
            $res = DB::table('sub')->where('sub_email', '=',$arr['sub_email'])->delete();
//            dd($res);
            if($res){
                echo '退订成功';
//                return redirect('/');
            }else{
                echo '退订失败';
//                return redirect('/');
            }
        }else{
            return redirect('/')->with('error','验证失败');
        }
    }

    public static function mailto($email,$id,$token){
        Mail::send('home.mail.sub', ['id' => $id,'sub_token'=>$token,'sub_email'=>$email], function ($m) use ($email) {

            $m->to($email)->subject('这是一封订阅邮件!');
        });
    }



}
