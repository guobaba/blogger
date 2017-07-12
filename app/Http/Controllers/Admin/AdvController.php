<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\Adv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdvController extends Controller
{

     public function upload(Request $request)
    {

       
          //将上传文件移动到制定目录，并以新文件名命名
        $file = Input::file('file_upload');
        if($file->isValid()) {
            $entension = $file->getClientOriginalExtension();//上传文件的后缀名
            $newName = date('YmdHis') . mt_rand(1000, 9999) . '.' . $entension;

            //将图片上传到本地服务器
            $path = $file->move(public_path() . '/uploads', $newName);
            $filepath = '/uploads/'.$newName;


            return $filepath;
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         if($request ->has('keywords')){
            $key = trim($request->input('keywords'));
            
           // dd($key);
            $data = Adv::where('adv_name','like',"%".$key."%")->paginate(2);
             return view('admin.adv.index',compact('data','key'));
        }else{
            $data = Adv::orderBy('adv_order','asc')->paginate(2);
            return view('admin.adv.index',compact('data'));
        }
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin/adv/add');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
//        获取请求中的所有数据，除了_token  file_upload
        $input = Input::except('_token','file_upload','');
        //dd($input);
        $input['adv_time'] = time();
//        dd($input);

//        通过articel模型的create  or   save 添加到数据库
        $re = Adv::create($input);

//        如果成功跳转到文章列表页  如果失败 返回添加页面
        if($re){
            return redirect('admin/adv');
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
         $data =  Adv::find($id);
        return view('admin.adv.edit',compact('data'));
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
         $adv = Adv::find($id);
        //从请求中获取传过来的数据
        $input = Input::except('_token','_method','file_upload');
        $re = $adv->update($input);

        if($re){
//            如果添加成功跳转到分类列表页
            return redirect('admin/adv');
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
        $re =  Adv::where('adv_id',$id)->delete();
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

    public function changeOrder(Request $request)
    {

//        先找到要修改排序的记录
        $input =  $request->except('_token');

        $adv = Adv::where('adv_id',$input['adv_id'])->first();

//        更新这条记录的cate_order字段
        $adv->adv_order = $input['adv_order'];
        $re = $adv->update();
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
}
