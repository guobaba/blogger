@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">用户管理</a> &raquo; 添加用户
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
            @if(session('error'))
              <p style="background:#C40D0D ">  {{session('error')}}</p>
            @endif
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/user/create')}}"><i class="fa fa-plus"></i>新增用户</a>
                <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        @if (count($errors) > 0)
            <div class="mark" style="color:red">
                <ul>
                    @if(is_object($errors))
                        @foreach ($errors->all() as $errors)
                            <li>{{ $errors }}</li>
                        @endforeach
                    @else
                        <li>{{ $errors }}</li>
                    @endif
                </ul>
            </div>
        @endif
        <form action="{{url('admin/user/'.$data->user_id)}}" method="post">
            <table class="add_tab">
                <tbody>
                <input type="hidden" name="_method" value="put">
                    {{csrf_field()}}
                    <tr>
                        <th>用户名：</th>
                        <td>
                            <input type="text" name="user_name" value="{{$data->user_name}}">
                            <span><i class="fa fa-exclamation-circle yellow"></i>这里是默认长度</span>
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

                            
                     
                      
                            
                        
                     
                    
                    
                    
                    
                   
                        
                    
>>>>>>> origin/zxn
