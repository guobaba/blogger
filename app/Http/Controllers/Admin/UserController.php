<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Model\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 如果请求携带keywords参数,说明是查询进入index方法的,否则是通过用户列表导航进入的
        if($request->has('keywords')){
            $key = trim($request->input('keywords'));
            $user = User::where('user_name','like',"%".$key."%")->paginate(5);
            return view('admin.user.index',['data'=>$user,'key'=>$key]);
        }else{
            // 查询出user表的所有数据
            $user= User::orderBy('user_id','asc')->paginate(5);
            // 向前台模板传变量的第一种方法
            return view('admin.user.index',['data'=>$user]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
//        dd($request->all());
        $input = Input::except('_token');

        // 验证规则
        $role =[
            'user_name'=>'required|between:6,18',
            'user_pass'=>'required|between:6,18'
        ];
        // 提示信息
        $ress=[
            'user_name.required'=>'必须输入用户名',
            'user_name.between'=>'用户名长度必须在6-18位之间',
            'user_pass.required'=>'必须输入密码',
            'user_pass.between'=>'密码长度必须在6-18位之间'
        ];

        $validator = Validator::make($input,$role,$ress);

       // dd($validator->passes());
        if($validator->passes()){
            // 通过用户模型添加到数据库
            // 通过模型添加数据有两种方式  save create
            // 第一种
            $user = new User();
            $user->user_name = $input['user_name'];
//            $user->user_pass = Crypt::encrypt($input['user_pass']);
//            $re = $user->save();
//            if($re){
//                echo "添加成功";
//            }else{
//                echo "添加失败";
//            }
            // 添加的第二种方式
            $input['user_pass'] = Crypt::encrypt($input['user_pass']);
            $re = User::create($input);
            if($re){
                return redirect('admin/user');
            }else{
                return back()->with('error','添加失败');
            }
        }else{
            // 返回到添加页面
            return back()->withErrors($validator);
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
        // 找到要修改的用户记录,返回给修改页面
        $data = User::where('user_id',$id)->first();
        return view('admin.user.edit',compact('data'));
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
        //
//        dd($request->all());
        $input =  $request->except(['_token',"_method"]);
        // 验证规则
        $role =[
            'user_name'=>'required|between:6,18',
        ];
        // 提示信息
        $ress=[
            'user_name.required'=>'必须输入用户名',
            'user_name.between'=>'用户名长度必须在6-18位之间',
        ];
        // 表单验证
        $validator = Validator::make($input,$role,$ress);
        if($validator->passes()){
            $re = User::where('user_id',$id)->update($input);
            // 更新是否成功
            if($re){
                // 如果成功,返回到用户列表页
                return redirect('admin/user');
            }else{
                // 如果失败,返回去
                return back()->with('error','修改失败');
            }
        }else{
            // 没有通过表单验证
            return back()->withErrors($validator);
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
        // 删除对应ID的用户
        $re = User::where('user_id',$id)->delete();
        if($re){
            $data = [
                'status'=>0,
                'msg'=>'删除成功'
            ];
        }else{
            $data = [
                'status'=>1,
                'msg'=>'删除失败!'
            ];
        }
        return $data;
    }
}
