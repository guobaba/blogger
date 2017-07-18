@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->

    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
            @if(session('error'))
              <p style="background:#f0ad4e">  {{session('error')}}</p>
            @endif
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="#"><i class="fa fa-plus"></i>新增用户</a>
                <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/cate/'.$data->cate_id)}}" method="post">
            <table class="add_tab">
                <tbody>
                <input type="hidden" name="_method" value="put">
                    {{csrf_field()}}
                <tr>
                    <th>父级分类：</th>
                    <td>
                        <select name="cate_pid">

                            @foreach($cate as $k=>$v)
                                @if($data->cate_pid == $v->cate_id)
                                     <option value="{{$v->cate_id}}" selected>{{$v->cate_name}}</option>
                                @else
                                     <option value="{{$v->cate_id}}" >{{$v->cate_name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>分类名称：</th>
                    <td>
                        <input type="text" name="cate_name" value="{{$data->cate_name}}">
                        <span><i class="fa fa-exclamation-circle yellow"></i>这里是默认长度</span>
                    </td>
                </tr>
                <tr>
                    <th>分类标题：</th>
                    <td>
                        <input type="text" name="cate_title" value="{{$data->cate_title}}">
                        <span><i class="fa fa-exclamation-circle yellow"></i>这里是默认长度</span>
                    </td>
                </tr>
                <tr>
                    <th>关键字：</th>
                    <td>
                        <textarea name="cate_keywords">{{$data->cate_keywords}}</textarea>
                    </td>
                </tr>
                <tr>
                    <th>描述：</th>
                    <td>
                        <textarea name="cate_description">{{$data->cate_description}}</textarea>
                    </td>
                </tr>
                <tr>
                    <th>排序：</th>
                    <td>
                        <input type="text" name="cate_order">
                    </td>
                </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
@endsection