@extends('layouts.admin')

@section('content')
	<!--面包屑导航 开始-->

	<!--面包屑导航 结束-->
	
	<!--结果集标题与导航组件 开始-->

    <!--结果集标题与导航组件 结束-->

	
    <div class="result_wrap">
        <div class="result_title">
            <h3>系统基本信息</h3>
        </div>
        <div class="result_content">
            <ul>
                <li>
                    <label>操作系统</label><span>WINNT</span>
                </li>
                <li>
                    <label>运行环境</label><span>Apache/2.2.21 (Win64) PHP/5.3.10</span>
                </li>
                <li>
                    <label>PHP运行方式</label><span>apache2handler</span>
                </li>
                <li>
                    <label>静静设计-版本</label><span>v-0.1</span>
                </li>
                <li>
                    <label>上传附件限制</label><span>2M</span>
                </li>
                <li>
                    <label>北京时间</label><span>2014年3月18日 21:08:24</span>
                </li>
                <li>
                    <label>服务器域名/IP</label><span>localhost [ 127.0.0.1 ]</span>
                </li>
                <li>
                    <label>Host</label><span>127.0.0.1</span>
                </li>
            </ul>
        </div>
    </div>


    <div class="result_wrap">
        <div class="result_title">
            <h3>使用帮助</h3>
        </div>
        <div class="result_content">
            <ul>
                <li>
                    <label>官方交流网站：</label><span><a href="#">http://bbs.itxdl.cn</a></span>
                </li>
                <li>
                    <label>官方交流QQ群：</label><span><a href="#"><img border="0" src="http://pub.idqqimg.com/wpa/images/group.png"></a></span>
                </li>
            </ul>
        </div>
    </div>
	<!--结果集列表组件 结束-->
@endsection