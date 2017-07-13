
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
<article id="index_about"> 
        <h2><a href='/'>首页</a>&nbsp;&nbsp;&nbsp;<a href='/cate/{{$art->cate_id}}'>{{$art->cate_name}}</a> > <a href='/'>{$art->cate_name}}</a>  </h2>
         <h1 class="c_titile"> {{$art->art_title}}</h1>
         <p class="box">发布时间：{{date('Y-m-d',$art->art_time)}}&#160;&#160;编辑：{{$art->art_editor}}<a href="/" title="{{$art->art_title}}">{{$art->art_title}}</a> &#160;&#160;点击：：{{$art->art_view}}<script src='homes/js/count.js'type='text/javascript' language='javascrip' ></script> &#160;&#160;</p>
         <div class="centent-txt 17071">
          	
		{!! $art->art_content !!}

         </div>
<div class="shareto"> <span>分享是一种快乐，也是一种美德:</span>
	<div class="bdsharebuttonbox">
	<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
	<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
	<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
	<a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
	<a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
	<a href="#" class="bds_more" data-cmd="more"></a>
	<a class="bds_count" data-cmd="count"></a>
	</div>
</div>
<div class="ad"><script src='js/ad_js.js' language='javascript'></script>
</div>
<div class=nextinfo>
 @if(empty($article1))
        没有上一篇了
 @else
<p>上一篇：<a href='/a/{{$article1->art_id}}'>{{$article1->art_title}}</a> </p>
    @endif
        @if(empty($article2))
          没有下一篇了
    @else
         <p>下一篇：<a href="/a/{{$article2->art_id}}">{{$article2->art_title}}</a></p>
        @endif
</div> 
 <div class="otherlink">
 <div id="hm_t_40518">
 </div>
</div> 
  <div class="otherlink">
    <h2>相关文章</h2>
      <ul>
      @foreach($rel as $k=>$v)
        <li><a href="/a/{{$v->art_id}}" title="{{$v->art_title}}">{{$v->art_title}}</a></li>
        @endforeach

       </ul>      
  </div>       
  <!-- Duoshuo Comment BEGIN -->
	<!-- Duoshuo Comment BEGIN -->
	<div class="ds-thread"  data-thread-key="17071" data-author-key="1"  data-url="http://itbyc.com/web/html5/17071.html"  data-image="http://itbyc.com/uploads/allimg/170701/192F49255_lit.jpg" data-title=" 移动前端不得不了解的HTML5 head 头标签（2016最新版）"></div>
	<script type="text/javascript">
	var duoshuoQuery = {short_name: "itbyc"};
	(function() {
		var ds = document.createElement('script');
		ds.type = 'text/javascript';ds.async = true;
		ds.src = 'http://static.duoshuo.com/embed.js';
		ds.charset = 'UTF-8';
		(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ds);
	})();
	</script>
<!-- Duoshuo Comment END --><div id="ds-ssr" class="mt1">
	<dl class="tbox">
		<dt> <strong>评论列表（网友评论仅供网友表达个人看法，并不表明本站同意其观点或证实其描述）</strong> </dt>
		<dd>
			<div class="dede_comment">
				<div class="decmt-box1">
					<ul>
						<li id="commetcontentNew"></li>

 
					</ul>
				</div>
			</div>
		</dd>
	</dl>
</div>


<!-- Duoshuo Comment END -->       
</article>
<aside  class="boxr"> 
<script type="text/javascript">document.write(unescape('%3Cdiv id="bdcs"%3E%3C/div%3E%3Cscript charset="utf-8" src="http://znsv.baidu.com/customer_search/api/js?sid=12869033534231014979') + '&plate_url=' + (encodeURIComponent(window.location.href)) + '&t=' + (Math.ceil(new Date()/3600000)) + unescape('"%3E%3C/script%3E'));</script>
<script src='js/ad_js.js' language='javascript'></script>
   <div class="newbolg">
       <h2>博客最新</h2>
      <ul>
       		<li><a title="SVG片段标识符(Fragment Identifiers)如何工作" href="/web/html5/16886.html">SVG片段标识符(Fragment Identif</a></li>
<li><a title="localstorage和sessionstorage使用记录(推荐)" href="/web/html5/16800.html">localstorage和sessionstorage使</a></li>
<li><a title="HTML5本地存储之IndexedDB" href="/web/html5/16799.html">HTML5本地存储之IndexedDB</a></li>
<li><a title="HTML5拖放API实现拖放排序的实例代码" href="/web/html5/16620.html">HTML5拖放API实现拖放排序的实例</a></li>
<li><a title="HTML5中indexedDB 数据库的使用实例" href="/web/html5/16619.html">HTML5中indexedDB 数据库的使用</a></li>
<li><a title="详解HTML5 window.postMessage与跨域" href="/web/html5/16615.html">详解HTML5 window.postMessage与</a></li>
<li><a title="Html5实现文件异步上传功能" href="/web/html5/16614.html">Html5实现文件异步上传功能</a></li>
<li><a title="Html5新标签datalist实现输入框与后台数据库数据的动态匹配" href="/web/html5/16613.html">Html5新标签datalist实现输入框</a></li>
<li><a title="Web前端页面跳转并取到值" href="/web/html5/16322.html">Web前端页面跳转并取到值</a></li>
<li><a title="HTML5 LocalStorage 本地存储刷新值还在" href="/web/html5/16233.html">HTML5 LocalStorage 本地存储刷</a></li>

       </ul>        
    </div>    
   <div class="newbolg">
       <h2>最近热点</h2>
      <ul>
      	<li><a href="/web/html5/454.html" title="如何解决HTML5 video视频标签不兼容的情况" target="_blank">如何解决HTML5 video视频标签不兼容的情况</a></li>
<li><a href="/web/html5/14043.html" title="Html5元素及根基语法详解" target="_blank">Html5元素及根基语法详解</a></li>
<li><a href="/web/html5/2239.html" title="html5开发工具推荐-我最常用的html5 开发工具" target="_blank">html5开发工具推荐-我最常用的html5 开发工具</a></li>
<li><a href="/web/html5/2285.html" title="HTML--&lt;Meta name=＂＂ Content=＂＂&gt; 标签的详解" target="_blank">HTML--&lt;Meta name=＂＂ Content=＂＂&gt; </a></li>
<li><a href="/web/html5/2649.html" title="HTML5 中 div section article 的区别" target="_blank">HTML5 中 div section article 的区别</a></li>
<li><a href="/web/html5/461.html" title="HTML 5 教程(二) - 结构" target="_blank">HTML 5 教程(二) - 结构</a></li>
<li><a href="/web/html5/115.html" title="资深app开发者的经验之谈：想简单点，降低风险" target="_blank">资深app开发者的经验之谈：想简单点，降低风</a></li>
<li><a href="/web/html5/469.html" title="教你如何利用HTML5做网页" target="_blank">教你如何利用HTML5做网页</a></li>
<li><a href="/web/html5/7083.html" title="分享29个基于Bootstrap的HTML5响应式网页设计模板" target="_blank">分享29个基于Bootstrap的HTML5响应式网页设计</a></li>
<li><a href="/web/html5/2693.html" title="HTML5 Charset能用吗？" target="_blank">HTML5 Charset能用吗？</a></li>

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
</aside >
</section>
<div id="copright"><span><a href="http://itbyc.com/" >博客首页</a> | <a href="http://itbyc.com/web/" target="_blank" title="HTML5/css3">WEB开发</a> | <a href="http://itbyc.com/life/" target="_blank" title="网站运营">网站运营</a> | <a href="http://itbyc.com/cms/" target="_blank">CMS使用教程</a> </span><span>滇ICP备14002061号-1</span>
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fca9c9aeca6d24b987c40c4c8ad091e42' type='text/javascript'%3E%3C/script%3E"));
</script>

</div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
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
<script type="text/javascript">
var cpro_id = "u1682227";
</script>
<script src="js/cnw.js" type="text/javascript"></script>
<script type="text/javascript">
var cpro_id = "u1690279";
</script>
<script src="js/i.js" type="text/javascript"></script>
</body>
</html>