<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\Dis;
use App\Http\Model\Yonghu;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DisController extends Controller
{

    public function index(Request $request){

        if($request ->has('keywords')){
            $key = trim($request->input('keywords'));
            
           // dd($key);
            $data = Dis::where('dis_content','like',"%".$key."%")->paginate(2);
             return view('admin.dis.index',['data'=>$data,'key'=>$key]);
        }else{
            $data= Dis::orderBy('dis_id','asc')->paginate(2);
            return view('admin.dis.index',['data'=>$data]); 
        }
     
    
   }

   public function delete($id){

     $re =  Dis::where('dis_id',$id)->delete();
//       0表示成功 其他表示失败
        if($re){
            $data = [
                'status'=>0,
                'msg'=>'删除成功！'
            ];
        }else{
            $data = [
                'status'=>1,
                'msg'=>'删除失败！'
            ];
        }
        return $data;
   }

   //用户留言
   public function yonghu(Request $request){

         if($request ->has('keywords')){
            $key = trim($request->input('keywords'));
            
    
            $data = Yonghu::where('y_dis','like',"%".$key."%")->paginate(4);
             return view('admin.dis.yonghu',['data'=>$data,'key'=>$key]);
        }else{
            $data= Yonghu::orderBy('y_time','asc')->paginate(4);

            return view('admin.dis.yonghu',['data'=>$data]); 
   }
}

   public function insert($id){
    
       $yonghu = Yonghu::where('y_id',$id)->first();

        return view('admin.dis.reply',['yonghu'=>$yonghu]);

   }

   public function reply(Request $request,$id){

        $input = $request -> except('_token','y_dis');
        $input['re_time'] = time();
        $input['y_status'] = 1;
        $dis = Yonghu::where('y_id',$id)->first();
        $res = $dis->update($input);
        if($res){
            return redirect('admin/dis/yonghu');
        }else{
            return back()->with('error','回复失败');
        }
   }


  public function del($id){

     $re =  Yonghu::where('y_id',$id)->delete();
//       0表示成功 其他表示失败
        if($re){
            $data = [
                'status'=>0,
                'msg'=>'删除成功！'
            ];
        }else{
            $data = [
                'status'=>1,
                'msg'=>'删除失败！'
            ];
        }
        return $data;
   }
 }