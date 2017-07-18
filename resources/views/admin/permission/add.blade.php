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
        {{--<div class="result_content">--}}
            {{--<div class="short_wrap">--}}
                {{--<a href="{{url('admin/link/create')}}"><i class="fa fa-plus"></i>新增权限</a>--}}
                {{--<a href="#"><i class="fa fa-recycle"></i>批量删除</a>--}}
                {{--<a href="#"><i class="fa fa-refresh"></i>更新排序</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{url('admin/permission')}}" method="post" id="art_form">
            <table class="add_tab">
                <tbody>
                {{csrf_field()}}
                <tr>
                    <th>路由：</th>
                    <td>
                        <input type="text" name="name" class="lg">
                    </td>
                </tr>
                <tr>
                    <th>名称：</th>
                    <td>
                        <input type="text" name="description" class="lg" >
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