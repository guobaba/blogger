@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">文章管理</a> &raquo; 添加文章
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">
        <form action="{{url('admin/article')}}" method="get">
            <table class="search_tab">
                <tr>
                    <th width="70">关键字:</th>
                    <td><input type="text" name="keyword1" placeholder="关键字1"
                               value="@if(empty($key)) @else{{$key}}  @endif"
                        ></td>
                    <td><input type="text" name="keyword2" placeholder="关键字2"
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
                    <a href="{{url('admin/article/create')}}"><i class="fa fa-plus"></i>新增文章</a>
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

                        <th class="tc">ID</th>
                        <th>标题</th>
                        <th>点击量</th>
                        <th>作者</th>
                        <th>发布时间</th>
                        <th>操作</th>
                    </tr>

                 @foreach($data as $k=>$v)
                    <tr>
                        <td>
                            <a href="#">{{$v->art_id}}</a>
                        </td>
                        <td>{{$v->art_title}}</td>
                        <td>{{$v->art_view}}</td>
                        <td>{{$v->art_editor}}</td>
                        <td>{{date('Y-m-d H:i:s',$v->art_time)}}</td>
                        <td>
                            <a href="{{url('admin/article/'.$v->art_id.'/edit')}}">修改</a>
                            <a href="javascript:;" onclick="Delarticle({{$v->art_id}})">删除</a>
                        </td>
                    </tr>
                    
                @endforeach
                </table>
                <div class="page_list">
                 {!! $data->render() !!}
                </div>
                <style>
                    .result_content ul li span {
                        font-size: 15px;
                        padding: 6px 12px;
                    }
                </style>
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->

    <script>

        function changeOrder(obj,article_id){
//            获取修改后的排序号
             var article_order =  $(obj).val();
             $.post('{{url('admin/article/changeorder')}}',{'_token':"{{csrf_token()}}",'article_id':article_id,'article_order':article_order},function(data){
                 if(data.status == 0){
                     location.href = location.href;
                     layer.msg(data.msg, {icon: 6});
                 }else{
                     location.href = location.href;
                     layer.msg(data.msg, {icon: 5});
                 }
             })
        }


        function Delarticle(user_id){
            //询问框
            layer.confirm('是否确认删除？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                //           url ==> admin/user/{user}   http://project182.com/admin/user/2
                $.post("{{url('admin/article/')}}/"+user_id,{'_method':'DELETE','_token':"{{csrf_token()}}"},function(data){
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