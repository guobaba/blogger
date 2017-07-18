@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->

    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h1>快捷操作</h1>
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
        <form action="{{url('admin/doroleauth')}}" method="post">
            <table class="add_tab">
                <tbody>
                    {{csrf_field()}}
                    <tr>
                        <th>选择角色：</th>
                        <td colspan = "17" >
                            <select id="role_id" name="role_id">
                                <option>==请选择==</option>
                                @foreach($roles as $k=>$role)
                                    <option value="{{$role->role_id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </td>


                        <td></td>

                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>权限分类</th>
                        <td><span>管理员</span></td>
                        <td><span>登录</span></td>
                        <td><span>用户</span></td>
                        <td><span>网络配置</span></td>
                        <td><span>角色管理</span></td>
                        <td><span>权限管理</span></td>
                        <td><span>角色授权管理</span></td>
                    </tr>
                    <tr>
                        <th>权限集合：</th>
                        <td>
                            @foreach($permissions as $v)
                                <div>
                                    @if(substr($v['name'],0,strpos($v['name'],'@'))=="App\Http\Controllers\Admin\IndexController")
                                        <input type="checkbox" name="permission_id[]" value="{{$v['id']}}" class="input1">{{$v['description']}}
                                    @endif()
                                </div>
                            @endforeach
                        </td>
                        <td>
                            @foreach($permissions as $v)
                                <div>
                                    @if(substr($v['name'],0,strpos($v['name'],'@'))=="App\Http\Controllers\Admin\LoginController")
                                        <input type="checkbox" name="permission_id[]" value="{{$v['id']}}" class="input2">{{$v['description']}}
                                    @endif()
                                </div>
                            @endforeach
                        </td>
                        <td>
                            @foreach($permissions as $v)
                                <div>
                                    @if(substr($v['name'],0,strpos($v['name'],'@'))=="App\Http\Controllers\Admin\UserController")
                                        <input type="checkbox" name="permission_id[]" value="{{$v['id']}}" class="input3">{{$v['description']}}
                                    @endif()
                                </div>
                            @endforeach
                        </td>
                        <td>
                            @foreach($permissions as $v)
                                <div>
                                    @if(substr($v['name'],0,strpos($v['name'],'@'))=="App\Http\Controllers\Admin\ConfigController")
                                        <input type="checkbox" name="permission_id[]" value="{{$v['id']}}" class="input4">{{$v['description']}}
                                    @endif()
                                </div>
                            @endforeach
                        </td>
                        <td>
                            @foreach($permissions as $v)
                                <div>
                                    @if(substr($v['name'],0,strpos($v['name'],'@'))=="App\Http\Controllers\Admin\RoleController")
                                        <input type="checkbox" name="permission_id[]" value="{{$v['id']}}"  class="input5">{{$v['description']}}
                                    @endif()
                                </div>
                            @endforeach
                        </td>
                        <td>
                            @foreach($permissions as $v)
                                <div>
                                    @if(substr($v['name'],0,strpos($v['name'],'@'))=="App\Http\Controllers\Admin\PermissionController")
                                        <input type="checkbox" name="permission_id[]" value="{{$v['id']}}"  class="input6">{{$v['description']}}
                                    @endif()
                                </div>
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
    <script>
        $('#role_id').change(function(){
//                                console.log(11);
            if($(this).val() == 5){
                $(".add_tab input").each(function(){
                    this.checked=true;
                })
            }else if($(this).val() == 6){
                $(".add_tab input").each(function(){
                    this.checked=true;
                })
                $('.input2').each(function () {
                    this.checked=false;
                })
                $('.input5').each(function () {
                    this.checked=false;
                })
                $('.input6').each(function () {
                    this.checked=false;
                })
            }else if($(this).val() == 7){
                $(".add_tab input").each(function(){
                    this.checked=false;
                })
            }else{
                $(".add_tab input").each(function(){
                    this.checked=false;
                })
            }
        })
    </script>

@endsection
