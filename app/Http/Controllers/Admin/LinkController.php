<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Link;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Link::orderBy('link_order','asc')->get();
        return view('admin.link.index',compact('data'));
    }

    public function changeOrder(Request $request)
    {

//        先找到要修改排序的记录
        $input =  $request->except('_token');


        $link = Link::where('link_id',$input['link_id'])->first();

//        更新这条记录的cate_order字段
        $link->link_order = $input['link_order'];
        $re = $link->update();
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.link.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //   获取请求中的所有数据，除了_token
        $input = Input::except('_token');
       
         $role =[
            'link_name'=>'required|between:3,18',
            'link_url'=>'required|between:3,18',
            'link_url' => array('regex:/(http?|ftp?):\/\/(www)\.([^\.\/]+)\.(com|cn)(\/[\w-\.\/\?\%\&\=]*)?/i'),
            'link_order' => 'required|regex:[[0-9]+]'
            
        ];
        // 提示信息
        $mess=[
            'link_name.required'=>'必须输入名称',
            'link_name.between'=>'用户名长度必须在3-18位之间',
            'link_url.required'=>'必须输入链接',
            'link_url.regex' => '链接格式不正确,正确格式为http://www.***.com或者http://www.***.cn',
            'link_url.between'=>'链接长度必须在3-18位之间',
            'link_order.required' => '排序值不能为空',
            'link_order.regex' => '排序值请输入数字',
        ];
//        表单验证
        $validator = Validator::make($input,$role,$mess);
        if($validator->passes()){

//        通过link模型的create 添加到数据库
        $re = Link::create($input);

//        如果成功跳转到列表页  如果失败 返回添加页面
        if($re){
            return redirect('admin/link');
        }else{
            return back()->with('error','添加失败');
        }
    }else{
        return back()->witherrors($validator);
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
        $data =  Link::find($id);

        return view('admin.link.edit',compact('data'));
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
        //   获取请求中的所有数据，除了_token
        $input = Input::except('_token');
       
        $role =[
            'link_name'=>'required|min:3',
            'link_url'=>'required|min:3',
            'link_url' => array('regex:/(http?|ftp?):\/\/(www)\.([^\.\/]+)\.(com|cn)(\/[\w-\.\/\?\%\&\=]*)?/i'),
            'link_order' => 'required|regex:[[0-9]+]'
            
        ];
        // 提示信息
        $mess=[
            'link_name.required'=>'必须输入名称',
            'link_name.between'=>'用户名长度必须在3位以上',
            'link_url.required'=>'必须输入链接',
            'link_url.regex' => '链接格式不正确,正确格式为http://www.***.com或者http://www.***.cn',
            'link_url.between'=>'链接长度必须在3位以上',
            'link_order.required' => '排序值不能为空',
            'link_order.regex' => '排序值请输入数字',
        ];
//        表单验证
        $validator = Validator::make($input,$role,$mess);
        if($validator->passes()){
            $link = Link::find($id);
            //从请求中获取传过来的数据
            $input = Input::except('_token','_method');
            $re = $link->update($input);

            if($re){
    //            如果添加成功跳转到分类列表页
                return redirect('admin/link');
            }else{
                return back()->with('error','修改失败')->withInput();
            }
        }else{
            return back()->witherrors($validator);
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
        $re =  Link::where('link_id',$id)->delete();
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
