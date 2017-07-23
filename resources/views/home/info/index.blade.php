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
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong> / <small>Personal&nbsp;information</small></div>
						</div>
						<hr/>
						<div class="info-main">
							<form class="am-form am-form-horizontal" action="{{url('home/info')}}" method="post">
								{{ csrf_field() }}

								<div class="am-form-group">
									<label for="user-email" class="am-form-label">电子邮件</label>
									<div class="am-form-content">
										<input id="user-email" disabled value="{{session('user_home')['user_email']}}" type="email">
										<input type="hidden" id="user_id" value="{{session('user_home')['user_id']}}"  >
									</div>
								</div>
								<div class="am-form-group">
									<label for="user-name2" class="am-form-label">昵称</label>
									<div class="am-form-content">
										<input type="text" id="det_name" value="{{$details['det_name']}}" placeholder="请输入昵称">

									</div>
								</div>

								<div class="am-form-group">
									<label class="am-form-label">性别</label>
									<div class="am-form-content sex">
										<label class="am-radio-inline">
											<input type="radio" class="det_sex" value="1" @if($details['det_sex'] == 1) checked @endif data-am-ucheck> 男
										</label>
										<label class="am-radio-inline">
											<input type="radio" class="det_sex" value="2" @if($details['det_sex'] == 2) checked @endif data-am-ucheck> 女
										</label>
										<label class="am-radio-inline">
											<input type="radio" class="det_sex" value="3" @if($details['det_sex'] == 3) checked @endif data-am-ucheck> 保密
										</label>
									</div>
								</div>

								<div class="am-form-group">
									<label for="user-birth" class="am-form-label">生日</label>
									<div class="am-form-content birth">
										<input type="text" value="{{$details['det_brith']}}" id="det_brith" placeholder="请输入生日">
									</div>
							
								</div>
								<div class="am-form-group">
									<label for="user-phone" class="am-form-label">电话</label>
									<div class="am-form-content">
										<input id="det_phone" value="{{$details['det_phone']}}" placeholder="telephonenumber" type="tel">
									</div>
								</div>
								<div class="info-btn">
									<div id="xiugai" class="am-btn am-btn-danger">保存修改</div>
								</div>

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
					<li class="person">
						
						<ul>
							<li> <a href="#">个人资料</a></li>
							<li> <a href="{{url('home/info/repass')}}">修改密码</a></li>
							<li> <a href="#">我的收藏</a></li>
						</ul>
					</li>
				</ul>

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
@endsection