<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Config;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ConfigController extends Controller
{
    public function changeContent(Request $request)
    {
//        dd($request->all());
        $input = $request->except('_token');
        foreach ($request['conf_id'] as $k=>$v){
            Config::where('conf_id',$v)->update(['conf_content'=>$request['conf_content'][$k]]);
        }
        $this->putFile();
        return redirect('admin/config');
    }


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

    public function putFile()
    {
        //读出config数据表中的conf_name,conf_content这两列数据
        $arr = Config::lists('conf_content','conf_name')->all();
//        dd($arr);
        // 变成字符串形式
        $str = '<?php return '.var_export($arr,true).';';
        // 找到要写入的文件路径
        $path = base_path().'/config/web.php';
        file_put_contents($path,$str);

        // 写入config/web.php文件
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 如果请求携带keywords参数,说明是查询进入index方法的,否则是通过网站配置列表导航进入的
        if($request->has('keywords')){
            $key = trim($request->input('keywords'));
            $data = Config::where('conf_title','like',"%".$key."%")->orderBy('conf_order','asc')->get();
            return view('admin.config.index',['data'=>$data,'key'=>$key]);
        }else{
            // 查询出config表的所有数据
            $data = Config::orderBy('conf_order','asc')->get();
            foreach($data as $k=>$v){
                switch($v->field_type){
                    case 'input':
                        $data[$k]->_content = ' <input type="text" class="lg" name="conf_content[]" value="'.$v->conf_content.'">';
                        break;
                    case 'textarea':
                        $data[$k]->_content = '<textarea class="lg" name="conf_content[]" >'.$v->conf_content.'</textarea>';
                        break;
                    case 'radio':
//                    1|开启,0|关闭,2|暂停
//
//                      <input type="radio" name="conf_content" value='1'>开启
//                     <input type="radio" name="conf_content" value='0'>关闭
                        $arr = explode(',',$v->field_value);
//                    $arr = [
//                        0=>'1|开启',    $n
//                        1=>'0|关闭'
//                    ]
//                    $a =[
//                        0=>'1',
//                        1=>'开启',
//                    ]
                        $str = '';
                        foreach($arr as $m=>$n){
                            $a = explode('|',$n);
                            $c = ($v->conf_content == $a[0])? ' checked': '';
                            $str.= '<input type="radio" name="conf_content[]"'.$c.' value="'.$a[0].'">'.$a[1];
                        }

                        $data[$k]->_content = $str;

                        break;
                }
            }
            // 向前台模板传变量的第一种方法
            return view('admin.config.index',compact('data'));
        }


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
        $re = Config::where('conf_id',$id)->delete();
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
