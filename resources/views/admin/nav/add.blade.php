@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">导航管理</a> &raquo; 添加导航
    </div>
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
                <a href="{{url('admin/nav/create')}}"><i class="fa fa-plus"></i>新增导航</a>
                <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{url('admin/nav')}}" method="post" id="art_form">
            <table class="add_tab">
                <tbody>
                {{csrf_field()}}
                <tr>
                    <th>名称：</th>
                    <td>
                        <input type="text" name="nav_name" >
                    </td>
                </tr>
                <tr>
                    <th>描述：</th>
                    <td>
                        <input type="text" name="nav_alias" >
                    </td>
                </tr>
                <tr>
                    <th>Url：</th>
                    <td>
                        <input type="text" name="nav_url" class="lg">
                    </td>
                </tr>
                <tr>
                    <th>排序：</th>
                    <td>
                        <input type="text" name="nav_order" class="sm">
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