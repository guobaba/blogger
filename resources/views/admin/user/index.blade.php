@extends('layout.admin')

@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">用户管理</a> &raquo; 添加用户
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">
        <form action="{{url('admin/user')}}" method="get">
            <table class="search_tab">
                <tr>
                    
                    <th width="70">关键字:</th>
                    <td><input type="text" name="keywords" placeholder="关键字"
                        value="@if(empty($key)) @else {{$key}} @endif"
                    ></td>
                    <td><input type="submit" name="sub" value="查询"></td>
                </tr>
            </table>
        </form>
    </div>
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        
                        <th>ID</th>
                        <th>用户名</th>
                        <th>时间</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                     @foreach($data as $k=>$v)
                    <tr>
                   
                        <th>{{$v->user_id}}</th>
                        <th>{{$v->user_name}}</th>
                        <th>{{date('Y-m-d H:i:s')}}</th>
                        <th>{{$v->status}}</th>
                        
                        <td>
                   
                            <a href="{{url('admin/user/'.$v->user_id.'/edit')}}">修改</a>
                            <a href="javascript:;" onclick="DelUser({{$v->user_id}})">删除</a>
                        </td>
                    </tr>
                     @endforeach
                    
                   
                </table>

            <?php
                $key = empty($key) ? ""  : $key;
            ?>



                <div class="page_list">
                   {!!$data->appends(['keywords'=>$key])->render()!!}
                </div>
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->
<style>
    .result_content ul li span{
        font-size: 15px;
        padding: 6px 12px;
    }
</style> 
 <script>

        function DelUser(user_id){
            //询问框
            layer.confirm('是否确认删除？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                //           url ==> admin/user/{user}   http://project182.com/admin/user/2
                $.post("{{url('admin/user/')}}/"+user_id,{'_method':'DELETE','_token':"{{csrf_token()}}"},function(data){
                if(data.status == 0){
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 6});
                }else{
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 5});
                }
                });


            }, function(){

            });

        }


</script>

@endsection