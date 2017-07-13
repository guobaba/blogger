<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Article;
use App\Http\Model\Cate;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Services\OSS;

class ArticleController extends Controller
{
    public function upload(Request $request)
    {
//        将上传文件移动到制定目录，并以新文件名命名
        $file = Input::file('file_upload');
        if($file->isValid()) {
            $entension = $file->getClientOriginalExtension();//上传文件的后缀名
            $newName = date('YmdHis') . mt_rand(1000, 9999) . '.' . $entension;

//            将图片上传到本地服务器
            $path = $file->move(public_path() . '/uploads', $newName);

//        返回文件的上传路径
            $filepath = 'uploads/' . $newName;
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
        // if($request ->has('keywords')){
        //     $key = trim($request->input('keywords'));
            
        //     // dd($key);
        //     $data = Article::where('art_title','like',"%".$key."%")->paginate(2);
        //     return view('admin.article.index',compact('data','key'));
        // }else{
        //     $data = Article::orderBy('art_time','asc')->paginate(2);
        //     return view('admin.article.index',compact('data'));
        // }
    
        $key1 = trim($request->input('keyword1',''));
        $key2 = trim($request->input('keyword2',''));
        $key = $request -> all();

        $data = Article::where('art_title','like',"%".$key1."%")
                ->where('art_editor','like',"%".$key2."%")
                ->paginate(2);
        return view('admin.article.index',compact('data', 'key','key1','key2'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $cate = (new Cate)->tree();
        return view('admin.article.add',compact('cate'));
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
        $input['art_time'] = time();
//        dd($input);

//        通过articel模型的create  or   save 添加到数据库
        $re = Article::create($input);

//        如果成功跳转到文章列表页  如果失败 返回添加页面
        if($re){
            return redirect('admin/article');
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
//        根据传入的要修改的记录的ID 获取文章记录
        $cate = (new Cate)->tree();
        $data = Article::find($id);

//        将文章记录传给修改界面
        return view('admin.article.edit',compact('cate','data'));
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
        $art = Article::find($id);
        //根据请求传过来的参数获取到要修改成的记录
        $input = Input::except('_token','_method','file_upload');
        //更新
        $re = $art->update($input);
        //如果成功跳转到列表页  失败返回修改页
        if($re){
            return redirect('admin/article');
        }else{
            return back()->with('error','修改失败');
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
        $re =  Article::where('art_id',$id)->delete();
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
