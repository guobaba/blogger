@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->

    <!--面包屑导航 结束-->

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h1>快捷操作</h1>
            @if(session('error'))
                <p style="background:#f0ad4e">  {{session('error')}}</p>
            @endif
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{url('admin/permission/'.$data->id)}}" method="post" id="art_form">
            <table class="add_tab">
                <tbody>
                {{csrf_field()}}
                <input type="hidden" name="_method" value="put">
                <tr>
                    <th>路由：</th>
                    <td>
                        <input type="text" name="name" class="lg" value="{{$data->name}}">
                    </td>
                </tr>
                <tr>
                    <th>名称: </th>
                    <td>
                        <input type="text" name="description" class="lg" value="{{$data->description}}">
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