@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->

    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            @if(session('error'))
              <p style="background:#C40D0D ">  {{session('error')}}</p>
            @endif
        </div>
        <div class="result_content">
            <div class="result_title">
                <h1>快捷操作</h1>
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
        <form action="{{url('admin/user/'.$data->user_id)}}" method="post">
            <table class="add_tab">
                <tbody>
                <input type="hidden" name="_method" value="put">
                    {{csrf_field()}}
                    <tr>
                        <th>用户名：</th>
                        <td>
                            <input type="text" name="user_name" value="{{$data->user_name}}">
                            <span><i class="fa fa-exclamation-circle yellow"></i>这里是默认长度</span>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
@endsection
