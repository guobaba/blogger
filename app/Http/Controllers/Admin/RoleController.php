<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Permission;
use App\Http\Model\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class RoleController extends Controller
{
    public function addPermission()
    {
        // 获取所有的角色
        $roles = Role::get();
        // 获取所有的权限
        $permissions = Permission::get()->toArray();
//    foreach ($permissions as $v)
//    {
//        if(substr($v['name'],0,strpos($v['name'],'@'))=="App\Http\Controllers\Admin\IndexController"){
//            dump($v['name']);
//        }
//
//    }
//        dd($permissions[0]['name']);
        return view('admin.role.addpermission',compact('roles','permissions'));
    }

    public function doAddPermission(Request $request)
    {
//        dd($request->all());
        $input = $request->except('_token');
        foreach ($input['permission_id'] as $k=>$v){
//            $input['user_id']  $v
            \DB::insert('insert into blog_permission_role (permission_id, role_id) values (?, ?)', [$v,$input['role_id']]);
        }
        return redirect('admin/role');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Role::get();
        return view('admin.role.index',compact('data'));
    }

    public function changeOrder(Request $request)
    {

//        先找到要修改排序的记录
        $input =  $request->except('_token');

        $role = Link::where('link_id',$input['link_id'])->first();

//        更新这条记录的cate_order字段
        $role->link_order = $input['link_order'];
        $re = $role->update();
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
        return view('admin.role.add');
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
//        dd($input);

//        通过articel模型的create  or   save 添加到数据库
        $re = Role::create($input);

//        如果成功跳转到文章列表页  如果失败 返回添加页面
        if($re){
            return redirect('admin/role');
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
        $data =  Role::find($id);

        return view('admin.role.edit',compact('data'));
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
        $role = Role::find($id);
        //从请求中获取传过来的数据
        $input = Input::except('_token','_method');
        $re = $role->update($input);

        if($re){
//            如果添加成功跳转到分类列表页
            return redirect('admin/role');
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
        $re =  Role::where('role_id',$id)->delete();
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
