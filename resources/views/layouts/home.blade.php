<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>{{Config('web.web_title')}}</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp"/>
  <link rel="icon" type="image/png" href="/home/assets/i/favicon.png">
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="icon" sizes="192x192" href="assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
  <link rel="apple-touch-icon-precomposed" href="/home/assets/i/app-icon72x72@2x.png">
  <meta name="msapplication-TileImage" content="assets/i/app-icon72x72@2x.png">
  <meta name="msapplication-TileColor" content="#0e90d2">
  <link rel="stylesheet" href="/home/assets/css/amazeui.min.css">
  <link rel="stylesheet" href="/home/assets/css/app.css">
  <script type="text/javascript" src="{{asset('/admin/style/js/jquery.js')}}"></script>
  <style>
    .zhuce{
      margin-top: -35px;
     position:absolute;
     right: 174px;
     top: 30px;
     font-size: 20px;
     color: #ccc;
     list-style-type:none;
         }
    .geren{
      margin-top: -35px;
      position:absolute;
      left:174px;
      top:30px;
      font-size:30px;
      color:#ccc;
      list-style-type:none;
    }
  </style>
</head>

<body id="blog">

@if(!session('user_home'))
<li class="zhuce"><a href="{{url('home/login/login')}}">登录</a>---<a href="{{url('home/zhuce/add')}}">注册</a></li>
@else
<li class="zhuce"><a href="{{url('home/login/del')}}">退出登录</a></li>
<li class="geren"><a href="{{url('home/info/index')}}">个人中心</a></li>
@endif

<header class="am-g am-g-fixed blog-fixed blog-text-center blog-header" style="width: 1180px;">
    <div class="class="am-g am-g-fixed blog-fixed blog-text-center blog-header"" style="background: url(/home/images/3.gif) ;background-position: -15px ; width:1180px;height:80px;">
        <div style="margin-top: 0px;"><h1>欢迎进入华北F4的博客</h1></div>
        <div style="margin-top: 0px;">掉头一去是风吹黑发，回首再来已雪满白头</div>
</header>
<hr>
<!-- nav start -->
<nav class="am-g am-g-fixed blog-fixed blog-nav">
<button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only blog-button" data-am-collapse="{target: '#blog-collapse'}" ><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="blog-collapse" style="background: #f0f0f0;">
    <ul class="am-nav am-nav-pills am-topbar-nav">
      <li class="am-active"><a href="{{'/'}}">首页</a></li>
     @foreach($nav as $kk=>$vv)
      <li id="{{$vv->nav_id}}"><a href="{{$vv->nav_url}}">{{$vv->nav_name}}</a></li>
     @endforeach
    </ul>
      <form class="am-topbar-form am-topbar-right am-form-inline" role="search">
          <div class="am-form-group">
              <input type="text" class="am-form-field am-input-sm" id='search' placeholder="搜索">
          </div>
      </form>
      <script>
          $('#search').change(function(){
              var v=$(this).val();
              location.href="{{url('/cate')}}?search=" + v;
          });
      </script>
  </div>
</nav>
<hr>

@section('content')

@show


<!-- content end -->
 <footer class="blog-footer">
    <div class="am-g am-g-fixed blog-fixed am-u-sm-centered blog-footer-padding">
        <div class="am-u-sm-12 am-u-md-4- am-u-lg-4">
            <h3>博客简介</h3>
            <p class="am-text-sm">这是一个二期项目F4倾力合作完成的博客。<br> 博客/ 资讯类信息 <br> 包括PHP学习课程,心灵鸡汤,个人感悟,个人心得等信息<br>嗯嗯嗯，不知道说啥了。外面的世界真精彩<br><br>
            Hellow The World &nbsp;&nbsp;我相信在我们共同的努力下,未来的世界一定会更精彩,加油↖(^ω^)↗,My brother!</p>
        </div>
        <div class="am-u-sm-12 am-u-md-4- am-u-lg-4">
            <h3>友情链接</h3>
        <ul class="website">
          @foreach($link as $k=>$v)
         <li><a href="{{$v->link_url}}">{{$v->link_name}}</a></li>
         @endforeach
         </ul>
            <h3>Credits</h3>
            <p>我们追求卓越，然时间、经验、能力有限。F4这有很多不足的地方，希望大家包容、不吝赐教，给我们提意见、建议。感谢你们！</p>          
        </div>
        <div class="am-u-sm-12 am-u-md-4- am-u-lg-4">
              <h1>我们站在巨人的肩膀上</h1>
             <h3>Heroes</h3>
            <p>
                <ul>
                    <li>jQuery</li>
                    <li>HTML5</li>
                    <li>Javascript</li>
                    <li>CSS</li>
                    <li>...</li>
                </ul>
            </p>
        </div>
    </div>    
    <div class="blog-text-center">© 2015 AllMobilize, Inc. Licensed under MIT license. Made with love By LWXYFER</div>    
  </footer>





<!--[if (gte IE 9)|!(IE)]><!-->
<script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
<!--<![endif]-->
<!--[if lte IE 8 ]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->
<script src="/home/assets/js/amazeui.min.js"></script>
</body>
</html>