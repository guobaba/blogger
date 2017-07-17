@extends('layouts.home')
@section('content')
<!-- content srart -->
<div class="am-g am-g-fixed blog-fixed blog-content">
    <div class="am-u-sm-12">
      <article class="am-article blog-article-p">
        <div class="am-article-hd">
       
          <h1 class="am-article-title blog-text-center">{{$art->art_title}}</h1>
          <p class="am-article-meta blog-text-center">
              <span><a href="#" class="blog-color">{{$art->cate_name}} &nbsp;</a></span>-
              <span><a href="#"></a></span>-
              <span><a href="#">{{date('Y-m-d',$art->art_time)}}</a></span>
          </p>
        </div>        
        <div class="am-article-bd">
        <img src="{{$art->art_thumb}}" alt="" class="blog-entry-img blog-article-margin">          
        <p class="class="am-article-lead"">
         {{$art->art_tag}} <br>
／{{$art->art_editor}}<br> <br>
     


        </p>
        {!!$art->art_content!!}
        </div>
      </article>
      {{--打赏功能--}}

      @if($art->cate_id==3)

        <div class="content" style="text-align:center">
              <p style="font-size:36px;"><a href="javascript:void(0)" onclick="dashangToggle()" class="dashang" title="打赏，支持一下" >打赏</a></p>
              <div class="hide_box"></div>
              <div class="shang_box">
                <a class="shang_close" href="javascript:void(0)" onclick="dashangToggle()" title="关闭"><img src="/home/images/close.jpg" alt="取消" /></a>
                <div class="shang_tit">
                    <p>感谢您的支持，我会继续努力的!</p>
                </div>
                <div class="shang_payimg" style="padding:0px">
                    <img src="/home/images/alipayimg.jpg" alt="扫码支持" title="扫一扫" />
                </div>
                <div class="pay_explain">扫码打赏，你说多少就多少</div>
                <div class="shang_payselect">
                    <div class="pay_item checked" data-id="alipay">
                        <span class="radiobox"></span>
                        <span class="pay_logo"><img src="/home/images/alipay.jpg" alt="支付宝" /></span>
                    </div>
                  <div class="pay_item" data-id="weipay">
                      <span class="radiobox"></span>
                      <span class="pay_logo"><img src="/home/images/wechat.jpg" alt="微信" /></span>
                  </div>
                </div>
                <div class="shang_info">
                  <p>打开<span id="shang_pay_txt">支付宝</span>扫一扫，即可进行扫码打赏哦</p>
                </div>
              </div>
        </div>
        <script type="text/javascript">
            $(function(){
                $(".pay_item").click(function(){
                    $(this).addClass('checked').siblings('.pay_item').removeClass('checked');
                    var dataid=$(this).attr('data-id');
                    $(".shang_payimg img").attr("src","/home/images/"+dataid+"img.jpg");
                    $("#shang_pay_txt").text(dataid=="alipay"?"支付宝":"微信");
                });
            });
            function dashangToggle(){
                $(".hide_box").fadeToggle();
                $(".shang_box").fadeToggle();
            }
        </script>
        {{--========================================================================================--}}
      @endif

        
        <div class="am-g blog-article-widget blog-article-margin">
          <div class="am-u-lg-4 am-u-md-5 am-u-sm-7 am-u-sm-centered blog-text-center">
            <span class="am-icon-tags"> &nbsp;</span><a href="#">标签</a> , <a href="#">TAG</a> , <a href="#">啦啦</a>
            <hr>
            <a href=""><span class="am-icon-qq am-icon-fw am-primary blog-icon"></span></a>
            <a href=""><span class="am-icon-wechat am-icon-fw blog-icon"></span></a>
            <a href=""><span class="am-icon-weibo am-icon-fw blog-icon"></span></a>
          </div>
        </div>

        <hr>
        <div class="am-g blog-author blog-article-margin">
          <div class="am-u-sm-3 am-u-md-3 am-u-lg-2">
            <img src="assets/i/f15.jpg" alt="" class="blog-author-img am-circle">
          </div>
          <div class="am-u-sm-9 am-u-md-9 am-u-lg-10">
          <h3><span>作者 &nbsp;: &nbsp;</span><span class="blog-color">amazeui</span></h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div>
        <hr>
        <ul class="am-pagination blog-article-margin">
          <li class="am-pagination-prev"><a href="#" class="">&laquo; 一切的回顾</a></li>
          <li class="am-pagination-next"><a href="">不远的未来 &raquo;</a></li>
        </ul>
        
        <hr>

        <form class="am-form am-g">
            <h3 class="blog-comment">评论</h3>
          <fieldset>
            <div class="am-form-group am-u-sm-4 blog-clear-left">
              <input type="text" class="" placeholder="名字">
            </div>
            <div class="am-form-group am-u-sm-4">
              <input type="email" class="" placeholder="邮箱">
            </div>

            <div class="am-form-group am-u-sm-4 blog-clear-right">
              <input type="password" class="" placeholder="网站">
            </div>
        
            <div class="am-form-group">
              <textarea class="" rows="5" placeholder="一字千金"></textarea>
            </div>
        
            <p><button type="submit" class="am-btn am-btn-default">发表评论</button></p>
          </fieldset>
        </form>

        <hr>
    </div>
</div>
<!-- content end -->

@endsection