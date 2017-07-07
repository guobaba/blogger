<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Config;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ConfigController extends Controller
{
    public function changeOrder(Request $request)
    {
        // 先找到要修改排序的记录
        $input = $request->except('_token');

        $conf = Config::where('conf_id',$input['conf_id'])->first();
        // 更新这条记录的conf_order字段
        $conf->conf_order = $input['conf_order'];
        $re = $conf->update();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '修改成功'
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '修改失败'
            ];
        }
        return $data;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Config::orderBy('conf_order','asc')->get();
        return view('admin.config.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.config.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 获取请求中的所有数据,除了_token
        $input = Input::except('_token');
//        dd($input);
        // 通过articel模型的create or save 添加到数据库
        $re = Config::create($input);

        // 如果成功跳转到文章列表页 如果失败 返回添加页面
        if($re){
            return redirect('admin/config');
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
        $data = Config::find($id);
        return view('admin.config.edit',compact('data'));
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
        $conf = Config::find($id);
        // 从请求中获取传过来的数据
        $input = Input::except('_token','_method');
        $re = $conf->update($input);

        if($re){
            // 如果添加成功跳转到分类列表页
            return redirect('admin/config');
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
        // 删除对应id的用户
        $re = Config::where('conf_id')->delete();
        // 0表示成功 其他表示失败
        if($re){
            $data = [
                'status' => 0,
                'msg' => '删除成功!'
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '删除失败'
            ];
        }
        return $data;
    }
}
