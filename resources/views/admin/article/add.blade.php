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
        <form action="{{url('admin/article')}}" method="post" id="art_form">
            <table class="add_tab">
                <tbody>
                    {{csrf_field()}}
                    <tr>
                        <th>分类：</th>
                        <td>
                            <select name="cate_id">
                                <option value="0">==顶级文章==</option>
                                @foreach($cate as $k=>$v)
                                     <option value="{{$v['cate_id']}}">{{$v->_name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th>文章标题：</th>
                        <td>
                            <input type="text" name="art_title" class="lg">
                        </td>
                    </tr>
                    <tr>
                        <th>编辑：</th>
                        <td>
                            <input type="text" name="art_editor" class="sm">
                        </td>
                    </tr>
                    <tr>
                        <th>缩略图：</th>
                        <td>
                            <input type="text" name="art_thumb" id="art_thumb" style="width:300px;">
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
                $('#art_thumb').val(data);

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("上传失败，请检查网络后重试");
            }
        });
    }

</script>
                    <tr>
                        <th>关键字：</th>
                        <td>
                            <input type="text" name="art_tag" class="lg">
                        </td>
                    </tr>
                    <tr>
                        <th>描述：</th>
                        <td>
                            <textarea name="art_description"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>文章内容：</th>
                        <td>
                            <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.config.js')}}"></script>
                            <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.all.min.js')}}"> </script>
                            <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/lang/zh-cn/zh-cn.js')}}"></script>
                            <script id="editor" type="text/plain" name="art_content" style="width:850px;height:500px;"></script>
                            <script type="text/javascript">
                                var ue = UE.getEditor('editor');
                            </script>
                            <style>
                                .edui-default{line-height: 28px;}
                                div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                                {overflow: hidden; height:20px;}
                                div.edui-box{overflow: hidden; height:22px;}
                            </style>

                        </td>
                    </tr>

                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" id="dd" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                        {{--<script>--}}
                            {{--$(function(){--}}
                                {{--$('#dd').click(function(){--}}

                                    {{--$.post("{{url('admin/email')}}",{'_token':"{{csrf_token()}}"},function(data){--}}

                                        {{--if(msg ==1){--}}
                                            {{--return true;--}}
                                        {{--}--}}
                                    {{--});--}}
                                    {{--return false;--}}
                                {{--})--}}
                            {{--})--}}

                        {{--</script>--}}
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
@endsection