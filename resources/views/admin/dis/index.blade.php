@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->

    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">
        <form action="" method="get">
            <table class="search_tab">
                <tr>
                    <th width="70">关键字:</th>
                    <td><input type="text" name="keywords" placeholder="关键字" value="@if(empty($key)) @else{{$key}}  @endif""></td>
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
                    <a href="{{url('admin/user/create')}}"><i class="fa fa-plus"></i></a>
                    <a href="#"><i class="fa fa-recycle"></i></a>
                    <a href="#"><i class="fa fa-refresh"></i></a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc">ID</th>
                        <th>评论人</th>
                        <th>评论的文章</th>
                        <th>评论内容</th>
                        <th>评论时间</th>
                        <th>回复内容</th>
                        <th>回复时间</th>
                        <th>操作</th>
                    </tr>
                   @foreach($data as $k=>$v)
                        <tr>
                            
                            <td>{{$v->dis_id}}</td>
                            <td>{{$v->dis_name}}</td>
                            <td>{{$v->cate_name}}</td>
                            <td>{{$v->dis_content}}</td>
                            <td>{{date('Y-m-d H:i:s',$v->dis_time)}}</td>
                            <td>{!!date($v->dis_reply)!!}</td>
                            <td>{{date('Y-m-d H:i:s',$v->re_time)}}</td>
                            <td>
                                
                                <a href="javascript:;" onclick="Delete('{{$v->dis_id}}')" >删除</a>
                                @if($v->dis_status == 1)
                                <a href="{{url('admin/dis/insert/'.$v->dis_id)}}" onclick="">回复</a>
                                @endif
                                @if($v->dis_status == 0)
                                <a href="{{url('admin/dis/insert/'.$v->dis_id)}}" onclick="">已回复</a>
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
                <style>
                    .result_content ul li span{
                     foot-size:15px;
                     padding:6px 12px;
        }
                </style>
                    
               
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->
<script>    
     function Delete(dis_id){
            //询问框
            layer.confirm('是否确认删除？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                //           url ==> admin/user/{user}   http://project182.com/admin/user/2
                $.post(
                    "{{url('admin/dis/delete')}}/"+dis_id,
                    {
                        '_method':'post',
                        '_token':"{{csrf_token()}}"
                    },
                    function(data){
                        if(data.status == 0){
                            location.href = location.href;
                            layer.msg(data.msg, {icon: 6});
                        }else{
                            location.href = location.href;
                            layer.msg(data.msg, {icon: 5});
                        }
                    }
                );
               

            }, function(){

            });

        }
</script>   

    
       
    
@endsection