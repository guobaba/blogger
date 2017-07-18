@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <!--面包屑导航 结束-->


    <!--搜索结果页面 列表 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h1>快捷操作</h1>
            @if(session('error'))
                <p style="background:#f0ad4e">  {{session('error')}}</p>
            @endif
        </div>
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc">ID</th>
                        <th>角色名称</th>
                        <th>角色描述</th>
                        <th>操作</th>
                    </tr>

                    @foreach($data as $k=>$v)
                        <tr>
                            <td>
                                <a href="#">{{$v->id}}</a>
                            </td>
                            <td>{{$v->name}}</td>
                            <td>{{$v->description}}</td>
                            <td>
                                <a href="{{url('admin/permission/'.$v->id)}}/edit">修改</a>
                                <a href="javascript:;" onclick="Delrole({{$v->id}})">删除</a>
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


        function Delrole(user_id){
            //询问框
            layer.confirm('是否确认删除？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                //           url ==> admin/user/{user}   http://project182.com/admin/user/2
                $.post("{{url('admin/permission/')}}/"+user_id,{'_method':'DELETE','_token':"{{csrf_token()}}"},function(data){
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