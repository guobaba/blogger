@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <div class="result_title">
            <h1>快捷操作</h1>
        </div>
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->

    <!--搜索结果页面 列表 开始-->



        <div class="result_wrap">
            <div style="float: left;margin-left: 30px;margin-top: 30px">
                <img src="{{url($personal['pers_avatar'])}}" alt="" name="pic" id="pic" style="width:170px;height: 240px" >
            </div>
            <div class="result_content">

                <div id="touxiang">
                    <form action="{{url('admin/personal/'.$personal['pers_id'])}}" method='POST' id="art_form">
                        <table cellpadding="3" cellspacing="0" style="width: 60%;margin:auto;left;margin-left: 30px;margin-top: 30px">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <tr>
                                <th>昵称:</th>
                                <td>
                                    <input type="text" name="pers_name" value="{{$personal['pers_name']}}" >
                                </td>
                            </tr>
                            <tr>
                                <th>头像:</th>
                                <td>
                                    <input type="text" name="pers_avatar" id="pers_avatar" value="{{$personal['pers_avatar']}}" style="width:50px;">
                                    <input type="file" name="file_upload" id="file_upload" value="">
                                </td>
                            </tr>
                            <script type="text/javascript">
                                $(function () {
                                    $("#file_upload").change(function () {

                                        uploadImage();
                                    });
                                });

                                function uploadImage() {
//                            判断是否有选择上传文件
                                    var imgPath = $("#file_upload").val();
                                    if (imgPath == "") {
                                        alert("请选择上传图片！");
                                        return;
                                    }
                                    //判断上传文件的后缀名
                                    var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
                                    if (strExtension != 'jpg' && strExtension != 'gif'
                                        && strExtension != 'png' && strExtension != 'bmp') {
                                        alert("请选择图片文件");
                                        return;
                                    }

                                    var formData = new FormData($('#art_form')[0]);

                                    $.ajax({
                                        type: "POST",
                                        url: "{{url('/admin/upload')}}",
                                        data: formData,
                                        async: true,
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        success: function(data) {
                                            // console.log(data);
//                                    alert("上传成功");
                                            $('#pic').attr('src',data);
                                            $('#pic').show();
                                            $('#pers_avatar').val(data);

                                        },
                                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                                            alert("上传失败，请检查网络后重试");
                                        }
                                    });
                                }
                            </script>
                            <tr>
                                <th>心情:</th>
                                <td>
                                    <input type="text" name="pers_shuo" value="{{$personal['pers_shuo']}}">
                                </td>
                            </tr>
                            <tr>
                                <th>性别:</th>
                                <td>
                                    <input type="radio"  name="pers_sex" value="m" <?php if($personal['pers_sex']=='m'){echo 'checked';} ?>>男
                                    <input type="radio"  name="pers_sex" value="w" <?php if($personal['pers_sex']=='w'){echo 'checked';} ?>>女
                                </td>
                            </tr>
                            <tr>
                                <th>手机号:</th>
                                <td>
                                    <input type="text" name="pers_phone" value="{{$personal['pers_phone']}}" >
                                </td>
                            </tr>
                            <tr>
                                <th>邮箱: </th>
                                <td>
                                    <input type="email" name="pers_email" value="{{$personal['pers_email']}}" >
                                </td>
                            </tr>
                            <tr>
                                <th>粉丝:</th>
                                <td>
                                    <input type="text" readOnly="true"  name="pers_friends" value="{{count($personal['pers_friends'])}}" >
                                </td>
                            </tr>
                            <tr>
                                <th>地址:</th>
                                <td>
                                    <input type="text" name="pers_city" value="{{$personal['pers_city']}}" >
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td><input type="submit" value="确认修改"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>

    <!--搜索结果页面 列表 结束-->
    <style>
        .result_content ul li span{
            foot-size:15px;
            padding:6px 12px;
        }
    </style>

    <script>
        function DelUser(user_id)
        {
            layer.confirm('是否确认删除？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                $.post("{{url('admin/user/')}}/"+user_id,{'_method':'DELETE','_token':"{{csrf_token()}}"},function(data){
                    if(data.status == 0){
                        layer.msg('data.msg',{icon:6});
                        location.href = location.href;
                    }else{
                        layer.msg(data.msg,{icon:5});
                        location.href = location.href;
                    }
                });
            }, function(){

            });
        }
    </script>
@endsection