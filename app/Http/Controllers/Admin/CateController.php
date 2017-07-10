<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Cate;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CateController extends Controller
{

    public function changeOrder(Request $request)
    {
//        dd($request->all());
//        先找到要修改排序的记录
        $input =  $request->except('_token');

        $cate = Cate::where('cate_id',$input['cate_id'])->first();

//        更新这条记录的cate_order字段
        $cate->cate_order = $input['cate_order'];
        $re = $cate->update();
//        如果修改成功
        if($re){
            $data =[
              'status'=>0,
                'msg'=>'修改成功'
            ];
        }else{
            $data =[
                'status'=>1,
                'msg'=>'修改失败'
            ];
        }
        return $data;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $cate = Cate::orderBy('cate_order','asc')->get();
//        if($request ->has('keywords')){
           if($request ->has('keywords')){
            $key = trim($request->input('keywords'));
            
           // dd($key);
            $cate = Cate::where('cate_name','like',"%".$key."%")->paginate(2);
             return view('admin.cate.index',['data'=>$cate,'key'=>$key]);
        }else{
            $cate = Cate::orderBy('cate_id','asc')->paginate(2);
            return view('admin.cate.index',['data'=>$cate]);  
        }
        //$cate = (new  Cate)->tree();
//        dd($cate);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        获取一级分类
        $cate_one = Cate::where('cate_pid',0)->get();
        return view('admin.cate.add',compact('cate_one'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Input::except('_token');
//        dd($input);
        $re = Cate::create($input);
        if($re){
//            如果添加成功跳转到分类列表页
            return redirect('admin/cate');
        }else{
            return back()->with('error','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        当前分类
        $data =  Cate::find($id);
//       所有分类
        $cate = (new Cate)->tree();
       return view('admin.cate.edit',compact('cate','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cate = Cate::find($id);
        //从请求中获取传过来的数据
        $input = Input::except('_token','_method');
        $re = $cate->update($input);

        if($re){
//            如果添加成功跳转到分类列表页
            return redirect('admin/cate');
        }else{
            return back()->with('error','修改失败')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除对应id的用户
        $re =  Cate::where('cate_id',$id)->delete();
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
