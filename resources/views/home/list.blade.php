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
            <h2 class="blog-text-center blog-title"><span>About Me</span></h2>
            <img src="home/assets/i/f14.jpg" alt="about we" class="blog-entry-img" >
      @foreach($per as $k=>$v)      
            <p>{{$v['pers_name']}}</p>
            <p>{{$v['pers_city']}}</p>
            <p>{{$v['pers_shuo']}}</p>
      @endforeach
        </div>
        <div class="blog-sidebar-widget blog-bor">

        </div>
        <div class="blog-clear-margin blog-sidebar-widget blog-bor am-g ">
            <h2 class="blog-title"><span>TAG cloud</span></h2>
            <div class="am-u-sm-12 blog-clear-padding">
            @foreach($art as $k=>$v)
            <a href="/a/{{$v->art_id}}" class="blog-tag"> {{$v->art_title}}</a>
            @endforeach
            </div>
        </div>
        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-title"><span>么么哒</span></h2>
            <ul class="am-list">
                <li><a href="#">每个人都有一个死角， 自己走不出来，别人也闯不进去。</a></li>
                <li><a href="#">我把最深沉的秘密放在那里。</a></li>
                <li><a href="#">你不懂我，我不怪你。</a></li>
                <li><a href="#">每个人都有一道伤口， 或深或浅，盖上布，以为不存在。</a></li>
            </ul>
        </div>
    </div>
</div>


@endsection