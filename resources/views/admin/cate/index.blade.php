@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->

    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">
        <form action="{{url('admin/cate')}}" method="get">
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
                    <a href="{{url('admin/cate/create')}}"><i class="fa fa-plus"></i>新增分类</a>
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
                        <th>分类名</th>
                        <th>标题</th>
                        <th>查看次数</th>

                        <th>操作</th>
                    </tr>

                 @foreach($data as $k=>$v)
                    <tr>
                        <td class="tc">
                            <input type="text" value="{{$v->cate_order}}" onchange="changeOrder(this,{{$v->cate_id}})">
                        </td>
                        <td>
                            <a href="#">{{$v->cate_id}}</a>
                        </td>
                        <td>{{$v->_name}}</td>
                        <td>{{$v->cate_title}}</td>
                        <td>{{$v->cate_view}}</td>
                        <td>
                            <a href="{{url('admin/cate/'.$v->cate_id.'/edit')}}">修改</a>
                            <a href="javascript:;" onclick="DelCate({{$v->cate_id}})">删除</a>
                        </td>
                    </tr>
                    
                @endforeach
                </table>
                
                
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

        function changeOrder(obj,cate_id){
//            获取修改后的排序号
             var cate_order =  $(obj).val();
             $.post('{{url('admin/cate/changeorder')}}',{'_token':"{{csrf_token()}}",'cate_id':cate_id,'cate_order':cate_order},function(data){
                 if(data.status == 0){
                     location.href = location.href;
                     layer.msg(data.msg, {icon: 6});
                 }else{
                     location.href = location.href;
                     layer.msg(data.msg, {icon: 5});
                 }
             })
        }


        function DelCate(user_id){
            //询问框
            layer.confirm('是否确认删除？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                //           url ==> admin/user/{user}   http://project182.com/admin/user/2
                $.post("{{url('admin/cate/')}}/"+user_id,{'_method':'DELETE','_token':"{{csrf_token()}}"},function(data){
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