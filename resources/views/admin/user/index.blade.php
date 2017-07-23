@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h1>快捷操作</h1>
        </div>
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">
        <form action="{{url('admin/user')}}" method="get">
            <table class="search_tab">
                <tr>
                    <th width="70">关键字:</th>
                    <td><input type="text" name="keywords" placeholder="关键字" value="@if(empty($key)) @else {{$key}} @endif"></td>
                    <td><input type="submit" name="sub" value="查询"></td>
                </tr>
            </table>
        </form>
    </div>
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">

            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc">ID</th>
                        <th>用户名</th>
                        <th>邮箱</th>
                        <th>时间</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $k=>$v)
                        <tr>
                            <td>
                                <a href="#">{{$v->user_id}}</a>
                            </td>
                            <td>{{$v->user_name}}</td>
                            <td>{{$v->user_email}}</td>
                            <td>{{date('Y-m-d H:i:s')}}</td>
                            <td>
                                <a href="{{url('admin/auth/'.$v->user_id)}}">授权</a>
                                @if(!$v->user_name=='')
                                    <a href="{{url('admin/user/'.$v->user_id.'/edit')}}">修改</a>
                                @endif
                                @if(!$v->user_name=='')
                                <a href="javascript:;" onclick="DelUser({{$v->user_id}})">删除</a>
                                @endif
                                @if($v->user_name=='')
                                    @if($v->user_status=="1")
                                    <a href="javascript:;" onclick="Shutup({{$v->user_id}})">禁言</a>
                                    @elseif($v->user_status=="0")
                                        <a href="javascript:;" onclick="Shutup({{$v->user_id}})">取消禁言</a>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
                <?php
                    $key = empty($key)?'':$key;
                    ?>
                <div class="page_list">
                    {!! $data->appends(['keywords' => $key])->render() !!}
                </div>
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->
    <style>
        .result_content ul li span{
            foot-size:15px;
            padding:6px 12px;
        }
    </style>

    <script>
        function DelUser(user_id)
        {
            layer.confirm('是否确认删除？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                $.post("{{url('admin/user/')}}/"+user_id,{'_method':'DELETE','_token':"{{csrf_token()}}"},function(data){
                    if(data.status == 0){
                        layer.msg('data.msg',{icon:6});
                        location.href = location.href;
                    }else{
                        layer.msg(data.msg,{icon:5});
                        location.href = location.href;
                    }
                });
            }, function(){

            });
        }
        function Shutup(user_id)
        {
            $.get("{{url('admin/shutup?id=')}}"+user_id,{},function (data) {

                if(data.status == 0){
                    location.href = location.href;
                }else{
                    location.href = location.href;
                }
            });
        }
    </script>
@endsection