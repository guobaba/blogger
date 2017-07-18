@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->

    <!--面包屑导航 结束-->

    <!--结果页快捷搜索框 开始-->
    {{--<div class="search_wrap">--}}
        {{--<form action="{{url('admin/link')}}" method="get">--}}
            {{--<table class="search_tab">--}}
                {{--<tr>--}}
                    {{--<th width="70">关键字:</th>--}}
                    {{--<td><input type="text" name="keywords" placeholder="关键字"--}}
                               {{--value="@if(empty($key)) @else{{$key}}  @endif"--}}
                        {{--></td>--}}
                    {{--<td><input type="submit" name="sub" value="查询"></td>--}}
                {{--</tr>--}}
            {{--</table>--}}
        {{--</form>--}}
    {{--</div>--}}
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
            @if(session('error'))
                <p style="background:#f0ad4e">  {{session('error')}}</p>
            @endif
        </div>
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/link/create')}}"><i class="fa fa-plus"></i>新增友情链接</a>
                    {{--<a href="#"><i class="fa fa-recycle"></i>批量删除</a>--}}
                    {{--<a href="#"><i class="fa fa-refresh"></i>更新排序</a>--}}
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
                        <th>链接名称</th>
                        <th>链接标题</th>
                        <th>链接地址</th>
                        <th>操作</th>
                    </tr>

                    @foreach($data as $k=>$v)
                        <tr>
                            <td class="tc">
                                <input type="text" value="{{$v->link_order}}" onchange="changeOrder(this,{{$v->link_id}})">
                            </td>
                            <td>
                                <a href="#">{{$v->link_id}}</a>
                            </td>
                            <td>{{$v->link_name}}</td>
                            <td>{{$v->link_title}}</td>
                            <td>{{$v->link_url}}</td>

                            <td>
                                <a href="{{url('admin/link/'.$v->link_id.'/edit')}}">修改</a>
                                <a href="javascript:;" onclick="Dellink({{$v->link_id}})">删除</a>
                            </td>
                        </tr>

                    @endforeach
                </table>

            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->

    <script>

        function changeOrder(obj,link_id){
//            获取修改后的排序号
            var link_order =  $(obj).val();
            $.post('{{url('admin/link/changeorder')}}',{'_token':"{{csrf_token()}}",'link_id':link_id,'link_order':link_order},function(data){
                if(data.status == 0){
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 6});
                }else{
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 5});
                }
            })
        }


        function Dellink(user_id){
            //询问框
            layer.confirm('是否确认删除？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                //           url ==> admin/user/{user}   http://project182.com/admin/user/2
                $.post("{{url('admin/link/')}}/"+user_id,{'_method':'DELETE','_token':"{{csrf_token()}}"},function(data){
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