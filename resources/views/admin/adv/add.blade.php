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
                <a href="#"><i class="fa fa-plus"></i>新增文章</a>
                <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/adv')}}" method="post" id="adv_form">
            <table class="add_tab">
                <tbody>
                    {{csrf_field()}}
                   

                    <tr>
                        <th>广告名：</th>
                        <td>
                            <input type="text" id="nn" name="adv_name" class="lg" autofocus>
                        </td>
                    </tr>
                     <tr>
                        <th>标题：</th>
                        <td>
                            <textarea name="adv_title"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>视图：</th>
                        <td>
                            <input type="text" name="adv_img" id="adv_img" style="width:300px;">
                            <input type="file" name="file_upload" id="file_upload" value="">
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <img src="" alt="" name="pic" id="pic" style="width:100px;display:none;" >
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

        var formData = new FormData($('#adv_form')[0]);

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
                $('#adv_img').val(data);

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("上传失败，请检查网络后重试");
            }
        });
    }

</script>
                     <tr>
                        <th>链接地址：</th>
                        <td>
                            <input type="text" name="adv_link" class="lg">
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
                   
                    
                   
                   