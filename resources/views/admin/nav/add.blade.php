@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->

    <!--面包屑导航 结束-->

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
            @if(session('error'))
                <p style="background:#f0ad4e">  {{session('error')}}</p>
            @endif
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="#"><i class="fa fa-plus"></i>新增导航</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

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
        <form action="{{url('admin/nav')}}" method="post">
            <table class="add_tab">
                <tbody>
                {{csrf_field()}}
                <tr>
                    <th>父级导航：</th>
                    <td>
                        <select name="nav_pid">
                            <option value="0">==顶级导航==</option>
                            @foreach($nav_one as $k=>$v)
                                <option value="{{$v->nav_id}}">{{$v->nav_name}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>导航名称：</th>
                    <td>
                        <input id="nn" type="text" name="nav_name" autofocus>
                    </td>
                </tr>
                <tr>
                    <th>导航标题：</th>
                    <td>
                        <input id="tt" type="text" name="nav_alias">
                    </td>
                </tr>
                <tr>
                    <th>Url：</th>
                    <td>
                        <input id="uu" type="text" name="nav_url" class="lg" value="https://">
                    </td>
                </tr>
                <tr>
                    <th>排序：</th>
                    <td>
                        <input id="oo" type="text" name="nav_order">
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <input id="send" type="submit" value="提交">
                        <input type="button" class="back" onclick="history.go(-1)" value="返回">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
        <script type="text/javascript">

            $('#nn').blur(function(){
                var x1 = $('#nn').val();
                if(!x1){
                    alert('请输入导航名称');
                }
            });
            
        </script>
    </div>
@endsection