@extends('layouts.home')

@section('content')
<!-- content srart -->
<div class="am-g am-g-fixed blog-fixed">
    <div class="am-u-md-8 am-u-sm-12">


        @foreach($art as $k=>$v)
        <article class="am-g blog-entry-article">
            <div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-img">
                <img src="{{$v->art_thumb}}" alt="" class="am-u-sm-12">
            </div>
            <div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-text">
                <span>作者：{{$v->art_editor}}</span><br>
                <span>-------</span>
                <span>发布时间:{{date('Y-m-d',$v->art_time)}}</span><br>
                 <span>描述:</span>
                <h1><a href="/a/{{$v->art_id}}">{{$v->art_title}}</a></h1>
                <p>{{$v->art_tag}}</p>                             
                <p><a href="" class="blog-continue">continue</a></p>
            </div>
        </article>
        @endforeach

   
        
        <ul class="am-pagination">
  <li class="am-pagination-prev"><a href="">&laquo; Prev</a></li>
  <li class="am-pagination-next"><a href="">Next &raquo;</a></li>
</ul>
    </div>
  <div class="am-u-md-4 am-u-sm-12 blog-sidebar">
          <div class="blog-sidebar-widget blog-bor">
              <h2 class="blog-text-center blog-title"><span>关于我</span></h2>
              @foreach($per as $k=>$v)
                  <img src="{{$v['pers_avatar']}}" alt="关于我" class="blog-entry-img" >
                  <p>{{$v['pers_name']}}</p>
                  <p>{{$v['pers_city']}}</p>
                  <p>{{$v['pers_shuo']}}</p>
              @endforeach
          </div>

          <div class="blog-sidebar-widget blog-bor">
              <h2 class="blog-text-center blog-title"><span>联系我</span></h2>
              <p>
                  <a href="https://user.qzone.qq.com/939818543"><span class="am-icon-qq am-icon-fw am-primary blog-icon"></span></a>
                  <a href="https://github.com/guobaba/blogger"><span class="am-icon-github am-icon-fw blog-icon"></span></a>
                  <a href=""><span class="am-icon-weibo am-icon-fw blog-icon"></span></a>
                  <a href=""><span class="am-icon-reddit am-icon-fw blog-icon"></span></a>
                  <a href=""><span class="am-icon-weixin am-icon-fw blog-icon"></span></a>
              </p>
          </div>

          <div class="blog-clear-margin blog-sidebar-widget blog-bor am-g ">
              <h2 class="blog-title"><span>类型</span></h2>
              <div class="am-u-sm-12 blog-clear-padding">
                  @foreach($aa as $k=>$v)
                      <a href="/cate/{{$v->cate_id}}" class="blog-tag"> {{$v->cate_name}}</a>
                  @endforeach
              </div>
          </div>

          <div class="blog-sidebar-widget blog-bor">
              <h2 class="blog-title"><span>最热文章</span></h2>
              <ul class="am-list">
                  @foreach($arts as $kkk=>$vvv)
                      <li><a href="/a/{{$vvv->art_id}}">{{$vvv->art_title}}</a></li>
                  @endforeach
              </ul>
          </div>
    </div>
</div>


@endsection