@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->

    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h1>快捷操作</h1>
            @if(session('error'))
                <p style="background:#f0ad4e">  {{session('error')}}</p>
            @endif
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/config')}}" method="post" id="art_form">
            <table class="add_tab">
                <tbody>
                    {{csrf_field()}}
                    <tr>
                        <th>标题：</th>
                        <td>
                            <input type="text" name="conf_title" >
                        </td>
                    </tr>
                    <tr>
                        <th>名称：</th>
                        <td>
                            <input type="text" name="conf_name" value="http://">
                        </td>
                    </tr>
                    <tr>
                        <th>类型：</th>
                        <td>
                            <label for=""><input type="radio" name="field_type" checked onclick="showTr()" value="input">input</label>
                            <label for=""><input type="radio" name="field_type" onclick="showTr()" value="textarea">textarea</label>
                            <label for=""><input type="radio" name="field_type" onclick="showTr()" value="radio">radio</label>
                        </td>
                    </tr>
                    <tr class="field_value">
                        <th>类型值：</th>
                        <td>
                            <input type="text" name="field_value" value="1|开启,0|关闭">
                            <span><i class="fa fa-exclamation-circle yellow"></i>类型值只有在radio的情况下才需要配置.格式 1|开启,0|关闭</span>
                        </td>
                    </tr>
                    <tr>
                        <th>排序：</th>
                        <td>
                            <input type="text" name="conf_order" class="sm">
                        </td>
                    </tr>
                    <tr>
                        <th>说明：</th>
                        <td>
                            <textarea name="conf_tips"></textarea>
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
        showTr();
        function showTr() {
            if($('input[name=field_type]:checked').val() == 'radio'){
                $('.field_value').show();
            }else{
                $('.field_value').hide();
            }
        }
    </script>
@endsection