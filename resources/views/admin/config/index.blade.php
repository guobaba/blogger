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



        <div class="result_wrap">
            @if (count($errors) > 0)
                <div class="mark" style="color:red">
                    <ul>
                        @if(is_object($errors))
                            @foreach ($errors->all() as $errors)
                                <li>{{ $errors }}</li>
                            @endforeach
                        @else
                            <li>{{ $errors }}</li>
                        @endif
                    </ul>
                </div>
            @endif
            <div class="result_content">
    <form action="{{url('admin/config/changecontent')}}" method="post">
        {{csrf_field()}}
                <table class="list_tab">
                    <tr>
                        <th class="tc">排序</th>
                        <th class="tc">ID</th>
                        <th>标题</th>
                        <th>名称</th>
                        <th style="width: 300px;">内容</th>
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
                                <input type="hidden" name="conf_id[]" value="{{$v->conf_id}}">
                                {!! $v->_content !!}
                            </td>

                            <td>
                                <a href="{{url('admin/config/'.$v->conf_id.'/edit')}}">修改</a>
                                <a href="javascript:;" onclick="Delconfig({{$v->conf_id}})">删除</a>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="6">
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
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


        function Delconfig(conf_id){
            //询问框
            layer.confirm('是否确认删除？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                $.post("{{url('admin/config/')}}/"+conf_id,{'_method':'DELETE','_token':"{{csrf_token()}}"},function(data){
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