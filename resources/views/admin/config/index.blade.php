@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">网站配置管理</a> &raquo; 添加网站配置
    </div>
    <!--面包屑导航 结束-->

    <!--结果页快捷搜索框 开始-->
    <div class="search_wrap">
        <form action="{{url('admin/config')}}" method="get">
            <table class="search_tab">
                <tr>
                    <th width="70">关键字:</th>
                    <td><input type="text" name="keywords" placeholder="关键字"
                               value="@if(empty($key)) @else{{$key}}  @endif"
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
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/config/create')}}"><i class="fa fa-plus"></i>新增网站配置</a>
                    <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                    <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc">排序</th>
                        <th class="tc">ID</th>
                        <th>标题</th>
                        <th>名称</th>
                        <th>操作</th>
                    </tr>

                    @foreach($data as $k=>$v)
                        <tr>
                            <td class="tc">
                                <input type="text" value="{{$v->conf_order}}" onchange="changeOrder(this,{{$v->conf_id}})">
                            </td>
                            <td>
                                <a href="#">{{$v->conf_id}}</a>
                            </td>
                            <td>{{$v->conf_title}}</td>
                            <td>{{$v->conf_name}}</td>

                            <td>
                                <a href="{{url('admin/config/'.$v->conf_id.'/edit')}}">修改</a>
                                <a href="javascript:;" onclick="Delconfig({{$v->conf_id}})">删除</a>
                            </td>
                        </tr>

                    @endforeach
                </table>

            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->

    <script>

        function changeOrder(obj,conf_id){
//            获取修改后的排序号
            var conf_order =  $(obj).val();
            $.post('{{url('admin/config/changeorder')}}',{'_token':"{{csrf_token()}}",'conf_id':conf_id,'conf_order':conf_order},function(data){
                if(data.status == 0){
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 6});
                }else{
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 5});
                }
            })
        }


        function Delconfig(user_id){
            //询问框
            layer.confirm('是否确认删除？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                //           url ==> admin/user/{user}   http://project182.com/admin/user/2
                $.post("{{url('admin/config/')}}/"+user_id,{'_method':'DELETE','_token':"{{csrf_token()}}"},function(data){
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