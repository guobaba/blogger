@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->

    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
        </div>
        <div class="result_content">

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
        <form action="{{url('admin/auth/add')}}" method="post">
            <table class="add_tab">
                <tbody>
                    {{csrf_field()}}
                    <tr>
                        <th>当前用户：</th>
                        <td>
                            <input type="text" name="user_name" value="{{$user->user_name}}">
                            <input type="hidden" name="user_id" value="{{$user->user_id}}">
                        </td>
                    </tr>
                    <tr>
                        <th>角色集合：</th>
                        <td>
                            @foreach($roles as $k=>$role)
                                <label for=""><input type="checkbox" name="role_id[]" value="{{$role->role_id}}">{{$role->name}}</label>
                            @endforeach
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
