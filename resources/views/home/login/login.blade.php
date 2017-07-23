<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>登录</title>

  <!-- Set render engine for 360 browser -->
  <meta name="renderer" content="webkit">

  <!-- No Baidu Siteapp-->
  <meta http-equiv="Cache-Control" content="no-siteapp"/>

  <link rel="icon" type="home/image/png" href="/home/assets/i/favicon.png">

  <!-- Add to homescreen for Chrome on Android -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="icon" sizes="192x192" href="/home/assets/i/app-icon72x72@2x.png">

  <!-- Add to homescreen for Safari on iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
  <link rel="apple-touch-icon-precomposed" href="/home/assets/i/app-icon72x72@2x.png">

  <!-- Tile icon for Win8 (144x144 + tile color) -->
  <meta name="msapplication-TileImage" content="/home/assets/i/app-icon72x72@2x.png">
  <meta name="msapplication-TileColor" content="#0e90d2">

  <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
  <!--
  <link rel="canonical" href="http://www.example.com/">
  -->
  <link rel="stylesheet" href="/home/assets/css/amazeui.min.css">
  <link rel="stylesheet" href="/home/assets/css/app.css">
</head>
<body>
<header>
  <div class="log-header">
      <h1><a href="/" >Amaze UI</a> </h1>
  </div>    
  <div class="log-re">
    <a type="button" href="{{url('/home/zhuce/add')}}" class="am-btn am-btn-default am-radius log-button">注册</a>
  </div> 
</header>

<div class="log"> 
  <div class="am-g">
  <div class="am-u-lg-3 am-u-md-6 am-u-sm-8 am-u-sm-centered log-content">
    <h1 class="log-title am-animation-slide-top">AmazeUI</h1>
    <br>
    <form class="am-form" id="log-form" action="/home/login/dologin" method="post">
    {{ csrf_field() }}
    @if(session('error'))
    <li>{{session('error')}}</li>
    @else
    <li>{{session('error')}}</li>
    @endif
      <div class="am-input-group am-radius am-animation-slide-left">       
        <input type="email" name="user_email" id="doc-vld-email-2-1" class="am-radius" data-validation-message="请输入正确邮箱地址" placeholder="邮箱" required/>
        <span class="am-input-group-label log-icon am-radius"><i class="am-icon-user am-icon-sm am-icon-fw"></i></span>
      </div>      
      <br>
      <div class="am-input-group am-animation-slide-left log-animation-delay">       
        <input type="password" id="password" name="user_pass" class="am-form-field am-radius log-input" placeholder="密码"  required>
        <span class="am-input-group-label log-icon am-radius"><i class="am-icon-lock am-icon-sm am-icon-fw"></i></span>
      </div>      
      <br>
      <button type="submit" class="am-btn am-btn-primary am-btn-block am-btn-lg am-radius am-animation-slide-bottom log-animation-delay">登 录</button>
            <p class="am-animation-slide-bottom log-animation-delay"><a href="#">忘记密码?</a></p>

    </form>

  </div>
  </div>
  <footer class="log-footer">   
    底部信息用常量
  </footer>
</div>



<!--[if (gte IE 9)|!(IE)]><!-->
<script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
<!--<![endif]-->
<!--[if lte IE 8 ]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="/home/assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->
<script src="/home/assets/js/amazeui.min.js"></script>
<script src="/home/assets/js/app.js"></script>
<script>
    $('#log-form').submit(function(){

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/home/login/dologin",
            type:"post",
            data:{
                password:$('#password').val(),
                user:$('#doc-vld-email-2-1').val(),
                _token:'{{csrf_token()}}'
            },
            dataType:"json",
            success: function(msg){
                if(msg ==1){
                    alert('登录成功点击确定跳转到首页');
                    location.href="{{url('/')}}";
                }else if(msg ==2){
                    alert('密码错误');
                }else{
                    alert('用户名不存在');
                }
            },
            error: function(errors) {
                var json=JSON.parse(errors.responseText);
                var str='';
                for (var i in json){
                    str += json[i]+'  ';
                }
                alert(str);
                return false;
            },
        });
        return false;
    });
</script>
</body>
</html>