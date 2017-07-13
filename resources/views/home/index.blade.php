
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

<div class="article">
  <div class="content">
      <h3><p><span>推荐</span>文章 New Blog</p></h3>
      <a id="topimg" href="/share/9934.html" target="_blank"><img src="picture/1-160h411402it.jpg" alt="杨雨个人博客特效汇总下载" title="杨雨个人博客特效汇总下载" width="315" height="205" class="topimg"></a>

      <ul class="topblog">
      <li><a href="/server/16036.html" title="腾讯云和阿里云对比哪个好？云计算优势测评"  target="_blank">腾讯云和阿里云对比哪个好？云计<span>在对比每一款产品时，本文先通过一系列的标准化测...</span></a></li>
<li><a href="/share/15346.html" title="dux主题1.8下载-大前端主题"  target="_blank">dux主题1.8下载-大前端主题<span>最近看到很多找大前端主题dux主题1.8下载的，我也...</span></a></li>
<li><a href="/share/2479.html" title="网络刷单骗子伎俩揭晓"  target="_blank">网络刷单骗子伎俩揭晓<span>很多大学生总想赚钱，看到网上各类刷单广告心痒的...</span></a></li>

      </ul>
      <h3><p><span>旅途分享</span>  Journey</p></h3>
      <ul class="template">
 @foreach($pic as $k=>$v)       
<li><a href="/a/{{$v->art_id}}" title="{{$v->art_title}}" target="_blank"><img src="{{$v->art_thumb}}" alt="{{$v->art_description}}"></a><span></span></li>
@endforeach

      </ul>



    <div class="bloglist">
    @foreach($art as $k=>$v)
    		<h2><a title="{{$v->art_title}}" href="/a/{{$v->art_id}}"  target="_blank">{{$v->art_title}}</a></h2>
    		<ul>
    		<p>{{$v->art_description}}.....</p>
    <p class="readmore"><a title="{{$v->art_title}}" href="/a/{{$v->art_id}}"  target="_blank">阅读全文>></a></p>
    <p class="dateview"><span>{{date('Y-m-d',$v->art_time)}}</span><span>编辑：{{$v->art_editor}}</span><span> 个人博客:</span></p>
    	</ul>
    @endforeach


    </div> 
  </div>  
<aside>
   <nav>
      <ul>
       <li><a href="http://itbyc.com/web/" title="Html5+css3" target="_blank">网站开发</a></li>
       <li><a href="http://itbyc.com/log/"  title="杨雨心得" target="_blank">杨雨心得</a></li>
       <li><a href="http://itbyc.com/life/" title="网站运营" target="_blank">网站运营</a></li>
       <li><a href="http://itbyc.com/travel/" title="雨在路上" target="_blank">雨在路上</a></li>
       <li><a href="http://itbyc.com/regex/regex.html" title="正则表达式" target="_blank">正则表达式</a></li>
       <li><a  href="http://itbyc.com/travel/2480.html" title="杨雨个人博客模板下载"  target="_blank">源码下载</a></li>
     </ul>      
    </nav>
    <p class="slider"> 
    <a href="#">这个世界根本不存在“不会做”这回事，当你失去所有依靠的时候，你自然就什么都会了。</a>
   </p>
	<div class="vcard">
		<a href="/" target="_blank" title="杨雨个人档案"><img src="picture/photo.jpg" alt="杨雨个人网站" class="photo" height="124" width="93"></a>
      <p class="fn">姓名：<a href="http://itbyc.com" target="_blank" title="杨照佳">杨照佳</a></p>
      <p class="nickname">网名：杨雨</p>
      <p class="role">职业：网站开发、SEM</p>
      <p class="url">主页：itbyc.com</p>
      <p class="address">现居：云南昆明</p>
	</div>
	<p id="animation" class="qun">网站开发+QQ：809079280  </p>
	<div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare" style="clear:both">
		<a class="bds_qzone"></a>
		<a class="bds_tqq"></a>
		<a class="bds_t163"></a>
		<a class="bds_tsina"></a>
		<span class="bds_more"></span>
		<a class="shareCount"></a>
	</div>
	<div class="hotcomm">
      <h2>精彩文章推荐</h2>
		<ul><li><a title="杨雨个人博客模板下载" href="/travel/2480.html">杨雨个人博客模板下载</a></li>
<li><a title="个人博客的内页如何优化" href="/life/1949.html">个人博客的内页如何优化</a></li>
<li><a title="个人博客如何减少跳出提高流量" href="/life/1896.html">个人博客如何减少跳出提高流量</a></li>
<li><a title="个人博客品牌形象如何建立" href="/life/1887.html">个人博客品牌形象如何建立</a></li>
<li><a title="个人博客用户体验的重要程度" href="/life/1417.html">个人博客用户体验的重要程度</a></li>
<li><a title="个人博客如何获得优质外链" href="/life/2137.html">个人博客如何获得优质外链</a></li>

        </ul>
    </div>

   <div class="newbolg">
      <h2><a href="/">技术探讨</a></h2>
      	 <ul class="rank">
  		<li><a title="百度云服务器BCH使用后的感受" href="/log/13311.html">百度云服务器BCH使用后的感受</a></li>
<li><a title="如何让自己成为明星程序员？" href="/log/572.html">如何让自己成为明星程序员？</a></li>
<li><a title="如何在网页设计中使用留白？" href="/log/2276.html">如何在网页设计中使用留白？</a></li>
<li><a title="DedeCMS 5.7提示“系统无此标签，可能已经移除”的解决方法" href="/log/2233.html">DedeCMS 5.7提示“系统无此标签</a></li>
<li><a title="2014，感谢有你" href="/log/2462.html">2014，感谢有你</a></li>
<li><a title="网站跳出率高的优化方案" href="/log/seo/2457.html">网站跳出率高的优化方案</a></li>
<li><a title="使用jQuery+PHP+Mysql实现PHP抽奖程序" href="/log/php/2453.html">使用jQuery+PHP+Mysql实现PHP抽</a></li>
<li><a title="PHP+jQuery实现翻板抽奖" href="/log/php/2454.html">PHP+jQuery实现翻板抽奖</a></li>
<li><a title="php抽奖程序-jQuery+PHP实现幸运大转盘抽奖程序" href="/log/php/2455.html">php抽奖程序-jQuery+PHP实现幸运</a></li>
<li><a title="PHP如何获取内存使用情况" href="/log/2451.html">PHP如何获取内存使用情况</a></li>
<li><a title="PHP动态页生成静态页的程序代码" href="/log/2450.html">PHP动态页生成静态页的程序代码</a></li>
<li><a title="HTML5网页如何让所有的浏览器都能识别语义元素标签样式" href="/log/78.html">HTML5网页如何让所有的浏览器都</a></li>
  
        </ul>   
    <h2><a href="/">点击排行</a></h2>
         <ul class="rank">
  		<li><a title="帝国cms中关于[!--newsnav--]的问题" href="/cms/empirecms/17168.html">帝国cms中关于[!--newsnav--]的</a></li>
<li><a title="帝国cms采集图文教程(上,中,下)全集" href="/cms/empirecms/17167.html">帝国cms采集图文教程(上,中,下)</a></li>
<li><a title="帝国cms6.6注册欢迎邮件发送的方法" href="/cms/empirecms/17166.html">帝国cms6.6注册欢迎邮件发送的方</a></li>
<li><a title="phpcms+ucenter+discuz论坛整合教程" href="/cms/phpcms/17165.html">phpcms+ucenter+discuz论坛整合</a></li>
<li><a title="帝国CMS使用二级域名并解决顶一下的方法" href="/cms/empirecms/17164.html">帝国CMS使用二级域名并解决顶一</a></li>
<li><a title="PHPCMS网站转移空间教程" href="/cms/phpcms/17163.html">PHPCMS网站转移空间教程</a></li>
<li><a title="phpcms如何使用水印功能" href="/cms/phpcms/17162.html">phpcms如何使用水印功能</a></li>
<li><a title="帝国CMS 6.6中二级域名绑定子目录的方法 图文" href="/cms/empirecms/17161.html">帝国CMS 6.6中二级域名绑定子目</a></li>
<li><a title="用帝国自定义标签实现当前栏目高亮" href="/cms/empirecms/17160.html">用帝国自定义标签实现当前栏目高</a></li>
<li><a title="帝国ecms列表页标题图片判断功能实现方法" href="/cms/empirecms/17159.html">帝国ecms列表页标题图片判断功能</a></li>
<li><a title="谷歌将购买荷兰最大太阳能发电厂全部电能" href="/itnews/17158.html">谷歌将购买荷兰最大太阳能发电厂</a></li>
<li><a title="dedecms教程：实现列表缩图添加alt锚文本信息的解" href="/web/dedecms/17157.html">dedecms教程：实现列表缩图添加a</a></li>
  
        </ul>   
    </div>
<!--- <div class="tag_yun">
    <h2>博客热点</h2>
    <div class="tag_yun_list">
    {\dede\:\tag row='50' getall='1' sort='hot'}
<a style="[field:total runphp=yes]@me=getTagStyle(); [/field:total];" title="[field:tag /]([field:total /])" href="[field:link/]">[field:tag /]</a>
{\/dede\:\tag}
  </div>
    </div>
--->
</aside>
</div>
<footer>
<div class="fat">
     <section class="partner">
        <ul> 
         <h2>关于杨雨</h2>
         <p><a href="http://520.itbyc.com">雨的告白</a></p>
         <p><a href="#">个人档案</a></p>
         <p><a href="#" rel="nofollow">给我留言</p>
         <h2>网站赞助</h2>
         <p><a rel="nofollow" href="http://itbyc.com/tags/" target="_blank">热点标签</a></p>
         <p><a href="http://itbyc.com/sitemap.xml" title="sitemap" target="_blank">sitemap</a></p>
        </ul>
     </section>
      <section class="links">
         <h2>友情链接</h2>
  <ul>
  @foreach($link as $k=>$v)
<li><a href="{{$v->link_url}}" title="{{$v->link_title}}" target="_blank">{{$v->link_title}}</a></li>
  @endforeach

<!---<li class="more"><a href="" target="_blank" rel="nofollow">更多链接>></a></li>--->
  </ul>
     </section>
      <section class="contact">
        <h2>一直在努力……</h2>
        <p>7.21用一个月的时间，救活我死去的博客</p>
        <p>7月8日，配合工信部复审完成</p>
        <p>12月7日 谷歌第二次更新PR，博客PR到了2！</p>
    <p>11月6日 site发现百度放出了第一个快照6.4</p>
    <p>11月4日 百度建立了第一条索引</p>
  <p>今日更新：篇</p>
  <p></p>
      </section>
   </div>  
<div id="copright"><span>本站采用创作共用版权 CC BY-NC-ND/2.5/CN 许可协议 </span><span>滇ICP备14002061号-1</span>
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fca9c9aeca6d24b987c40c4c8ad091e42' type='text/javascript'%3E%3C/script%3E"));
</script>
</div>
</footer>
<!-- Baidu Button BEGIN -->
<script type="text/javascript" id="bdshare_js" data="type=tools&uid=6499638" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script>
</body>


</html>