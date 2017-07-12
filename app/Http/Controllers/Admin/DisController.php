<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\Dis;

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

   public function insert($id){
    
        $dis = Dis::where('dis_id',$id)->first();

        return view('admin.dis.reply',['dis'=>$dis]);

   }

   public function reply(Request $request,$id){
       $dis = Dis::where('dis_id',$id)->first();

        $input = $request -> except('_token','dis_content');
        $input['re_time'] = time();
        $input['dis_status'] = 0;
       
        $res = $dis->update($input);
        if($res){
            return redirect('admin/dis/index');
        }else{
            return back()->with('error','回复失败');
        }
   }
}
