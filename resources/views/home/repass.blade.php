@extends('layouts.home')
@section('content')
<link href="/homes/info/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
<link href="/homes/info/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

<link href="/homes/info/css/personal.css" rel="stylesheet" type="text/css">
<link href="/homes/info/css/infstyle.css" rel="stylesheet" type="text/css">
<script src="/homes/info/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>
<link rel="stylesheet" href="/home/assets/css/amazeui.min.css">
  <link rel="stylesheet" href="/home/assets/css/app.css">
  <style type="text/css">
	#blog-collapse{height: 50px !important;}
	.am-form-group{    margin-top: 0px;}
	.geren a{font-size:20px;}
	.zhuce a{font-size:20px;}
  </style>
<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-info">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">修改密码</strong> / <small>Change&nbsp;Password</small></div>
						</div>
						<hr/>
						<div class="info-main">
							<form class="am-form am-form-horizontal" action="{{url('home/info/dopass')}}" method="post">
								{{ csrf_field() }}

					            <tr>
					                <th width="120"><i class="require">*</i>原密码：</th>
					                <td>
					                    <input type="password" name="password_a"> </i>请输入原始密码</span>
					                </td>
					            </tr>
					            <tr>
					                <th><i class="require">*</i>新密码：</th>
					                <td>
					                    <input type="password" name="password"> </i>新密码6-20位</span>
					                </td>
					            </tr>
					            <tr>
					                <th><i class="require">*</i>确认密码：</th>
					                <td>
					                    <input type="password" name="password_c"> </i>再次输入密码</span>
					                </td>
					            </tr>
					            <tr>
	
					                <td>
					                    <input type="submit" value="提交">
					                </td>
					            </tr>
							</form>
						</div>

					</div>

				</div>
				<!--底部-->
				
			</div>

			<aside class="menu">
				<ul>
					<li class="person">
						<a href="{{url('home/info/index')}}">个人中心</a>
					</li>
			</aside>
		</div>
		<script type="text/javascript">
			$(function(){
				$('#xiugai').click(function(){
					$.post('/home/info/xiugai',{
						_token:'{{csrf_token()}}',
						user_id:$('#user_id').val(),
						det_name:$('#det_name').val(),
						det_sex:$('.det_sex:checked').val(),
						det_brith:$('#det_brith').val(),
						det_phone:$('#det_phone').val()},function(msg){
							if(msg == 1){
								alert('修改成功');
								location.href=location.href;
							}else{
								alert('更新失败')
							}
						})
				})
			})
		</script>
{{dump($errors->all())}}
@endsection