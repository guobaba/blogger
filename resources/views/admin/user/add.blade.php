@extends('layout.admin')

@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">商品管理</a> &raquo; 添加商品
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
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
        <form action="{{url('admin/user')}}" method="post">
            <table class="add_tab">
            {{ csrf_field() }}
                <tbody>
                    @if(session('error'))
                     <tr>
                        <th></th>
                        <td>
                            <font color="red">{{session('error')}}</font>
                        
                        </td>
                    </tr>
                    @else
                    <li></li>
                    @endif    
                            
                     @if (count($errors) > 0)
                                @if(is_object($errors))
                                @foreach ($errors->all() as $error)
                                 <tr>
                        <th>密码：</th>
                        <td>
                            <span><i class="fa fa-exclamation-circle red"></i>{{ $error }}</span><br>
                        
                            
                            
                        </td>
                    </tr>
                            
                                @endforeach
                            @endif
                        @endif    
                    <tr>
                        <th>用户名：</th>
                        <td>
                            <input type="text" name="username" value="{{old('username')}}"><br>
                           
                           
                        </td>
                    </tr>
                    <tr>
                        <th>密码：</th>
                        <td>
                            <input type="password" name="password">
                        
                            
                            
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

@endsection

                    
                    
                    
                   
                        
                    