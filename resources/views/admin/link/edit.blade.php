@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->

    <div class="result_wrap">
        <form action="{{url('admin/link/'.$data->link_id)}}" method="post">
            <table class="add_tab">
                <tbody>
                <input type="hidden" name="_method" value="put">
                {{csrf_field()}}
                <tr>
                    <th>名称：</th>
                    <td>
                        <input type="text" name="link_name" value="{{$data->link_name}}">
                    </td>
                </tr>
                <tr>
                    <th>Url：</th>
                    <td>
                        <input type="text" name="link_url" class="lg" value="{{$data->link_url}}">
                    </td>
                </tr>
                <tr>
                    <th>链接标题：</th>
                    <td>
                        <input type="text" name="link_title" class="lg" value="{{$data->link_title}}">
                    </td>
                </tr>
                <tr>
                    <th>排序：</th>
                    <td>
                        <input type="text" name="link_order" class="sm" value="{{$data->link_order}}">
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