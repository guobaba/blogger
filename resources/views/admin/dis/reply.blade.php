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
    
        
        <form action="{{url('admin/dis/reply/'.$dis->dis_id)}}" method="post">
            <table class="add_tab">
                <tbody>
                
                    {{csrf_field()}}
                    @if(session('error'))
                        <b>{{session('error')}}</b>
                    @else

                    @endif
                    <tr>
                    <th>用户评论：</th>
                    <td >
                        <textarea name="dis_content" style="background-color:#ccc " readonly="readonly" >{!!$dis->dis_content!!}</textarea>
                    </td>
                </tr>
                    
                    <tr>
                    <th>回复评论：</th>
                    <td>
                        <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.config.js')}}"></script>
                        <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.all.min.js')}}"> </script>
                        <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/lang/zh-cn/zh-cn.js')}}"></script>
                        <script id="editor" type="text/plain" name="dis_reply" style="width:590px;height:200px;"></script>
                        <script type="text/javascript">
                            var ue = UE.getEditor('editor');
                        </script>
                        <style>
                            .edui-default{line-height: 28px;}
                            div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                            {overflow: hidden; height:20px;}
                            div.edui-box{overflow: hidden; height:22px;}
                        </style>

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

                            
                     
                      
                            
                        
                     
                    
                    
                    
                    
                   
                        
                    

