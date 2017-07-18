<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Personal;
use App\Http\Model\User;
use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name = session('user')->user_name;
        $user= User::join('personal','user.user_id','=','personal.user_id')->where('user_name',$name)->first();


//       dd($user);
        $personal= $user->personal()->first();//$user['user_id']
//       dd($personal);
        return view('admin.personal.index',compact('personal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
        //根据id获取修改记录
//        $personal = Personal::find($id);
//        ::where('uid',$id)->get();
//        dd($art);

        $input =  $request->except(['_token','_method','file_upload','pers_friends']);


        $validator =  [
            'pers_phone' => array('regex:(^1[3|4|5|8][0-9]\\d{8}$)'),
            'pers_email' => array('regex:(^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$)'),
        ];
        $ress=[
            'pers_phone.regex'=>'手机号不正确',
            'pers_email.regex'=>'邮箱格式不正确',
        ];
        $validator = Validator::make($input,$validator,$ress);
        if($validator->passes()){
            $re = Personal::where('pers_id',$id)->update($input);
//        dd($re);
            //如果成功跳转到列表页  失败返回修改页
            if($re){
                return redirect('admin/info');
            }else{
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
        //
    }
}
