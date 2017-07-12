@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">友情链接管理</a> &raquo; 添加友情链接
    </div>
    <!--面包屑导航 结束-->

    <!--结果页快捷搜索框 开始-->
    <div class="search_wrap">
        <form action="{{url('admin/adv')}}" method="get">
        {{csrf_field()}}
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
    <div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
            @if(session('error'))
                <p style="background:#f0ad4e">  {{session('error')}}</p>
            @endif
        </div>
    <form action="{{url('admin/adv')}}" method="post">
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
                <table class="list_tab" >
                    <tr>
                        <th class="tc">排序</th>
                        <th class="tc">ID</th>
                        <th>广告名称</th>
                        <th>广告标题</th>
                        <th>广告视图</th>
                        <th>广告链接</th>
                        <th>添加时间</th>
                        <th>操作</th>
                    </tr>

                    @foreach($data as $k=>$v)
                        <tr>
                            <td class="tc">
                                <input type="text" value="{{$v->adv_order}}" onchange="changeOrder(this,{{$v->adv_id}})">
                            </td>
                            <td>
                                <a href="#">{{$v->adv_id}}</a>
                            </td>
                            <td>{{$v->adv_name}}</td>
                            <td>{{$v->adv_title}}</td>
                            <td><img src="{{$v->adv_img}}" id="img" alt=""></td>
                            <td>{{$v->adv_link}}</td>
                            <td>{{$v->adv_time}}</td>
                            <style>
                                #img{
                                    width:80px;
                                    height:60px;
                                }
                            </style>

                            <td>
                                <a href="{{url('admin/adv/'.$v->adv_id.'/edit')}}">修改</a>
                                <a href="javascript:;" onclick="Deladv({{$v->adv_id}})">删除</a>
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

        function changeOrder(obj,adv_id){
//            获取修改后的排序号
            var adv_order =  $(obj).val();
            $.post('{{url('admin/adv/changeorder')}}',{'_token':"{{csrf_token()}}",'adv_id':adv_id,'adv_order':adv_order},function(data){
                if(data.status == 0){
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 6});
                }else{
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 5});
                }
            })
        }


        function Deladv(adv_id){
            //询问框
            layer.confirm('是否确认删除？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                //           url ==> admin/user/{user}   http://project182.com/admin/user/2
                $.post("{{url('admin/adv/')}}/"+adv_id,{'_method':'DELETE','_token':"{{csrf_token()}}"},function(data){
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