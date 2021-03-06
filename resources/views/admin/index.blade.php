@extends('layouts.admin')

@section('content')
<body>
	<!--头部 开始-->
	<div class="top_box">
		<div class="top_left">
			<div class="logo">后台管理模板</div>
			<ul>
				<li><a href="#" class="active">首页</a></li>
			</ul>
		</div>
		<div class="top_right">
			<ul>
				<li><a href="{{url('admin/personal')}}" target="main">{{session('user')->user_name}}</a></li>
				<li><a href="{{url('admin/repass')}}" target="main">修改密码</a></li>
				<li><a href="{{url('admin/quit')}}">退出</a></li>
			</ul>
		</div>
	</div>
	<!--头部 结束-->

	<!--左侧导航 开始-->
	<div class="menu_box">
		<ul>
            <li>
            	<h3><i class="fa fa-fw fa-clipboard"></i>用戶操作</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('admin/user/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加用戶</a></li>
                    <li><a href="{{url('admin/user')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>用戶列表</a></li>
                </ul>
            </li>
			<li>
            	<h3><i class="fa fa-fw fa-clipboard"></i>分类管理</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('admin/cate/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加分类</a></li>
                    <li><a href="{{url('admin/cate')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>分类列表</a></li> 
                </ul>
            </li>
            <li>
                <h3><i class="fa fa-fw fa-clipboard"></i>网站导航</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('admin/nav/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加导航</a></li>
                    <li><a href="{{url('admin/nav')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>导航列表</a></li>

                </ul>
            </li>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>友情链接操作</h3>
				<ul class="sub_menu">
					<li><a href="{{url('admin/link/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加友情链接</a></li>
					<li><a href="{{url('admin/link')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>友情链接列表</a></li>

				</ul>
			</li>

            <li>
            	<h3><i class="fa fa-fw fa-clipboard"></i>文章管理</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('admin/article/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加文章</a></li>
                    <li><a href="{{url('admin/article')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>文章列表</a></li> 
                </ul>
            </li>
            <li>
            	<h3><i class="fa fa-fw fa-clipboard"></i>留言管理</h3>
                <ul class="sub_menu">
                    
                    <li><a href="{{url('admin/dis/index')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>文章评论</a></li> 
                    <li><a href="{{url('admin/dis/yonghu')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>用户留言</a></li> 
                </ul>
            </li>
            <li>
            	<h3><i class="fa fa-fw fa-cog"></i>系统设置</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('admin/config/create')}}" target="main"><i class="fa fa-fw fa-cubes"></i>添加配置</a></li>
                    <li><a href="{{url('admin/config')}}" target="main"><i class="fa fa-fw fa-database"></i>网站配置</a></li>
                </ul>
            </li>
            <li>
            	<h3><i class="fa fa-fw fa-cog"></i>广告管理</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('admin/adv/create')}}" target="main"><i class="fa fa-fw fa-cubes"></i>添加广告</a></li>
                    <li><a href="{{url('admin/adv')}}" target="main"><i class="fa fa-fw fa-database"></i>广告列表</a></li>
                </ul>
            </li>
            <li>
                <h3><i class="fa fa-fw fa-cog"></i>角色管理</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('admin/role/create')}}" target="main"><i class="fa fa-fw fa-cubes"></i>添加角色</a></li>
                    <li><a href="{{url('admin/role')}}" target="main"><i class="fa fa-fw fa-database"></i>角色列表</a></li>
                </ul>
            </li>
            <li>
                <h3><i class="fa fa-fw fa-cog"></i>权限管理</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('admin/permission/create')}}" target="main"><i class="fa fa-fw fa-cubes"></i>添加权限</a></li>
                    <li><a href="{{url('admin/permission')}}" target="main"><i class="fa fa-fw fa-database"></i>权限列表</a></li>
                </ul>
            </li>
            <li>
                <h3><i class="fa fa-fw fa-cog"></i>角色授权</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('admin/roleauth')}}" target="main"><i class="fa fa-fw fa-cubes"></i>添加权限</a></li>
                    <li><a href="{{url('admin/permission')}}" target="main"><i class="fa fa-fw fa-database"></i>权限列表</a></li>
                </ul>
            </li>
            <li>
            	<h3><i class="fa fa-fw fa-thumb-tack"></i>工具导航</h3>
                <ul class="sub_menu">
                    <li><a href="http://www.yeahzan.com/fa/facss.html" target="main"><i class="fa fa-fw fa-font"></i>图标调用</a></li>
                    <li><a href="http://hemin.cn/jq/cheatsheet.html" target="main"><i class="fa fa-fw fa-chain"></i>Jquery手册</a></li>
                    <li><a href="http://tool.c7sky.com/webcolor/" target="main"><i class="fa fa-fw fa-tachometer"></i>配色板</a></li>
                    <li><a href="element.html" target="main"><i class="fa fa-fw fa-tags"></i>其他组件</a></li>
                </ul>
            </li>
        </ul>
	</div>
	<!--左侧导航 结束-->

	<!--主体部分 开始-->
	<div class="main_box">
		<iframe src="{{url('admin/info')}}" frameborder="0" width="100%" height="100%" name="main"></iframe>
	</div>
	<!--主体部分 结束-->

	<!--底部 开始-->
	<div class="bottom_box">
		CopyRight © 2015. Powered By <a href="http://www.itxdl.cn">http://www.itxdl.cn</a>.
	</div>
	<!--底部 结束-->
@endsection