@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">用户管理</a> &raquo; 添加用户
    </div>
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
                <a href="#"><i class="fa fa-plus"></i>新增用户</a>
                <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/adv/'.$data->adv_id)}}" method="post">
            <table class="add_tab">
                <tbody>
                <input type="hidden" name="_method" value="put">
                    {{csrf_field()}}
                
                <tr>
                    <th>广告名：</th>
                    <td>
                        <input type="text" name="adv_name" class="lg" value="{{$data->adv_name}}">
                    </td>
                </tr>
                <tr>
                    <th>标题：</th>
                    <td>
                        <input type="text" name="adv_title" class="sm" value="{{$data->adv_title}}">
                    </td>
                </tr>
                <tr>
                    <th>广告视图：</th>
                    <td>
                        <input type="text" name="adv_img" id="adv_img" style="width:300px;" value="{{$data->adv_img}}">
                        <input type="file" name="file_upload" id="file_upload" value="">
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

                                var formData = new FormData(document.forms[0]);

                                $.ajax({
                                    type: "POST",
                                    url: "{{url('admin/upload')}}",
                                    data: formData,
                                    async: true,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    success: function(data) {
//                                    console.log(data);
//                                    alert("上传成功");
                                        $('#pic').attr('src',data);
                                        $('#pic').show();
                                        $('#adv_img').val(data);

                                    },
                                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                                        alert("上传失败，请检查网络后重试");
                                    }
                                });
                            }

                        </script>

                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <img src="{{$data->adv_img}}" alt="" name="pic" id="pic" style="width:100px;" >
                    </td>
                </tr>
                
                <tr>
                    <th>链接地址：</th>
                    <td>
                        <textarea name="adv_link">{{$data->adv_link}}</textarea>
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