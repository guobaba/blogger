
<!doctype html>
<html lang="zh-cn">
<head>
<meta charset="utf8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="applicable-device" content="pc">
<meta http-equiv="mobile-agent"content="format=xhtml;url=https://m.itbyc.com">
<title>{{config('web.web_title')}}</title>
<meta name="keywords" content="个人博客,个人博客网站,it博客,个人网站,优秀的个人网站,卢克,郭林森,吴正民,注销你" />
<meta name="description" content="F4的个人博客网站是一个关注个人博客建设、个人博客搜索引擎优化、网络推广、Html5+css3博客,SEM等技术信息博客,提供博主在学习成果和工作中经验总结，是一个互联网从业者值得收藏的网站。" />
<meta name="Author" content="杨照佳">
<meta name="Copyright" content="itbyc.com">
<meta name="baidu-site-verification" content="BMse4tN1jo" />

<script src="{{asset('homes/js/uaredirect.js')}}" type="text/JavaScript"></script>
<script type="text/javascript">uaredirect("https://m.itbyc.com");</script>
<link href="{{asset('homes/css/base.css')}}" rel="stylesheet">
<link href="{{asset('homes/css/index.css')}}" rel="stylesheet">
<link href="{{asset('homes/css/main.css')}}" rel="stylesheet">
<script type="text/javascript" src="{{asset('homes/js/jquery.min.js')}}"></script>
<script src="{{asset('homes/js/snow.js')}}"></script>


</head>
<body>
<style type="text/css">
.snow-container { position: fixed; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 100001; }
</style>
<div class="snow-container"></div>
<figure>
	<p>欢迎光临杨雨的个人博客站!  <a class="rssdy" target="_blank" href=""  title="博客地图"></a>
    </p>
</figure>
<header>
 <img src="homes/picture/logo.jpg" alt="杨雨个人网站-杨雨个人博客-杨照佳" width="170" height="60"> 
  <h1><a href="/">杨雨个人博客网站</a></h1>
  <p>关注互联网和搜索引擎的个人博客网站</p>
</header>
<nav id="nav">
     <ul>
      <li id="nav_current" ><a href="http://itbyc.com/" >网站首页</a></li>
     @foreach($nav as $k=>$v)
		<li id="{{$v->nav_id}}" ><a href="{{$v->nav_url}}" >{{$v->nav_name}}</a></li>
      @endforeach 
     </ul>
	 
</nav>

<script type="text/javascript">
console.log("%c你又偷看我的源码咯！"," text-shadow: 0 1px 0 #ccc,0 2px 0 #c9c9c9,0 3px 0 #bbb,0 4px 0 #b9b9b9,0 5px 0 #aaa,0 6px 1px rgba(0,0,0,.1),0 0 5px rgba(0,0,0,.1),0 1px 3px rgba(0,0,0,.3),0 3px 5px rgba(0,0,0,.2),0 5px 10px rgba(0,0,0,.25),0 10px 10px rgba(0,0,0,.2),0 20px 20px rgba(0,0,0,.15);font-size:5em")
console.log('%c再看我要打你咯！ ', 'background-image:-webkit-gradient( linear, left top, right top, color-stop(0, #f22), color-stop(0.15, #f2f), color-stop(0.3, #22f), color-stop(0.45, #2ff), color-stop(0.6, #2f2),color-stop(0.75, #2f2), color-stop(0.9, #ff2), color-stop(1, #f22) );color:transparent;-webkit-background-clip: text;font-size:5em;');</script>
<section class="arc_mian">
<div class="newlist">
  <h2><span>
      
         <a href='/web/css3/'>css3案例分享</a>
       
         <a href='/web/html5/'>html5案例分享</a>
       
         <a href='/web/zx/'>html5最新资讯</a>
       
         <a href='/web/javascript/'>JavaScript</a>
       
         <a href='/php/'>PHP</a>
       
</span>您当前的位置：<a href='http://itbyc.com/'>首页</a> > <a href='/web/'>WEB开发</a> >  </h2>
@foreach($art as $k=>$v)
     <ul>
     <p class="ptit"><b><a href="/a/{{$v->art_id}}" title="{{$v->art_title}}"  target="_blank">{{$v->art_title}}</a></b></p>
	  <p class="ptime">发布时间:{{date('Y-m-d',$v->art_time)}}作者：{{$v->art_editor}} 
	  </p>
	  <a href="/a/{{$v->art_id}}" target="_blank" title=" {{$v->art_title}}"><img src="/{{$v->art_thumb}}" class="imgdow" alt="{{$v->art_title}}">
	  </a>
	   <p class="pcon">{{$v->art_description}}<a href="/a/{{$v->art_id}}" target="_blank" title="{{$v->art_title}}">详细信息</a>
	   </P>

	   <div class="line"></div>
  </ul>
  @endforeach
<div class="ad"></div>

<div class="page">
	{!! $art->render() !!}
</div>

 
</div>
<aside class="boxr"> 
<script type="text/javascript">document.write(unescape('%3Cdiv id="bdcs"%3E%3C/div%3E%3Cscript charset="utf-8" src="http://znsv.baidu.com/customer_search/api/js?sid=12869033534231014979') + '&plate_url=' + (encodeURIComponent(window.location.href)) + '&t=' + (Math.ceil(new Date()/3600000)) + unescape('"%3E%3C/script%3E'));</script>
   <div class="newbolg">
       <h2>栏目更新</h2>
      <ul>
      	<li><a href="/web/html5/16886.html" title="SVG片段标识符(Fragment Identifiers)如何工作" target="_blank">SVG片段标识符(Fragment Identifie</a></li>
<li><a href="/web/javascript/16822.html" title="19个JavaScript常用的简写技术" target="_blank">19个JavaScript常用的简写技术</a></li>
<li><a href="/web/javascript/16812.html" title="41个Web开发者必须收藏的JavaScript实用技巧" target="_blank">41个Web开发者必须收藏的JavaScrip</a></li>
<li><a href="/php/16808.html" title="深入理解FastCGI协议以及在PHP中的实现" target="_blank">深入理解FastCGI协议以及在PHP中的</a></li>
<li><a href="/web/html5/16800.html" title="localstorage和sessionstorage使用记录(推荐)" target="_blank">localstorage和sessionstorage使用</a></li>
<li><a href="/web/html5/16799.html" title="HTML5本地存储之IndexedDB" target="_blank">HTML5本地存储之IndexedDB</a></li>
<li><a href="/web/css3/16786.html" title="使用CSS3制作一个简单的进度条(demo)" target="_blank">使用CSS3制作一个简单的进度条(dem</a></li>
<li><a href="/web/css3/16785.html" title="CSS实现鼠标上移图标旋转效果" target="_blank">CSS实现鼠标上移图标旋转效果</a></li>
<li><a href="/web/css3/16784.html" title="用纯CSS实现饼状Loading等待图效果" target="_blank">用纯CSS实现饼状Loading等待图效果</a></li>
<li><a href="/php/16693.html" title="PHP 使用静态变量（static var）进行效率优化" target="_blank">PHP 使用静态变量（static var）进</a></li>

       </ul>        
    </div>    

   <div class="newbolg">
       <h2>栏目热门</h2>
      	<ul>
      	<li><a href="/web/2468.html" title="brackets 中文设置方法" target="_blank">brackets 中文设置方法</a></li>
<li><a href="/web/javascript/7138.html" title="jquery+Html5/canvas实现真实下雪特效代码" target="_blank">jquery+Html5/canvas实现真实下雪特效代码</a></li>
<li><a href="/web/2281.html" title="如何在Dreamweaver中使用emmet(ZenCoding)插件" target="_blank">如何在Dreamweaver中使用emmet(ZenCoding)插</a></li>
<li><a href="/web/html5/454.html" title="如何解决HTML5 video视频标签不兼容的情况" target="_blank">如何解决HTML5 video视频标签不兼容的情况</a></li>
<li><a href="/web/2242.html" title="linux 服务器免费管理面板" target="_blank">linux 服务器免费管理面板</a></li>
<li><a href="/web/html5/14043.html" title="Html5元素及根基语法详解" target="_blank">Html5元素及根基语法详解</a></li>
<li><a href="/web/javascript/7192.html" title="ECharts仪表盘" target="_blank">ECharts仪表盘</a></li>
<li><a href="/web/css3/5118.html" title="下拉菜单select样式设置(兼容IE6/IE7/IE8/火狐)" target="_blank">下拉菜单select样式设置(兼容IE6/IE7/IE8/火</a></li>
<li><a href="/web/html5/2239.html" title="html5开发工具推荐-我最常用的html5 开发工具" target="_blank">html5开发工具推荐-我最常用的html5 开发工具</a></li>
<li><a href="/web/2248.html" title="Web 设计与开发必备工具：Brackets 编辑器" target="_blank">Web 设计与开发必备工具：Brackets 编辑器</a></li>

  		</ul>        
    </div> 
     <div class="visitors">
      <h2>最近访客</h2>
      <ul class="ds-recent-visitors"  data-num-items="21"></ul>
    </div>
   <div class="hotcomm">
       <h2>热评文章</h2>
    <ul  class="ds-top-threads" data-range="weekly" data-num-items="6"></ul>
    </div>  
</aside>
</section>
<div id="copright"><span>本站采用创作共用版权 CC BY-NC-ND/2.5/CN 许可协议  </span><span>滇ICP备14002061号-1</span></span>友情：<a href="http://www.00y00.com/" target="_blank">零零歪设计</a> <script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fca9c9aeca6d24b987c40c4c8ad091e42' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var duoshuoQuery = {short_name:"itbyc"};
(function() {
    var ds = document.createElement('script');
    ds.type = 'text/javascript';ds.async = true;
    ds.src = 'http://static.duoshuo.com/embed.js';
    ds.charset = 'UTF-8';
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ds);
})();
</script>
</div>
</body>
</html>