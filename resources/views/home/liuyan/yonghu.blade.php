@extends('layouts.home')

@section('content')
<div class="am-g am-g-fixed blog-fixed">
    <div class="am-u-md-8 am-u-sm-12">
         <style>
                  .btn{
                    position: absolute;
                    right:20px;
                    background:yellowgreen;
                  }
                  .xxoo{
                    display:none;
                  }
              </style>
     
        
          @foreach($yonghu as $k=>$v)
           <article class="am-article blog-article-p">
            <div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-img">
                <img id="ss" src="/uploads/201707201642239891.jpg" alt="" class="am-u-sm-12">
            </div>
            <div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-text">
                <style>
                    #ss{
                        width:200px;
                        height:140px;
                        border-radius:100%;

                    }

                </style>
               
                <h3>留言人：{{$v->user_name}}</h>
                 <span>留言时间：{{date('Y-m-d H:i:s',$v->y_time)}}</span>
                <p>留言内容：{!!$v->y_dis!!}
                </p>
                <p><a href="{{'/'}}" class="blog-continue">返回首页</a></p>
                @if($v->y_status == 1)
                <h3>楼主回复：<span>{!!$v->y_re!!}</span></h3>
                @endif
                <div>
                   <span class="am-pagination-next"><button class="btn">留言</button></span>

            </div>

            
            </article>
          @endforeach
            <div class="xxoo">
                  <td>
                    {{csrf_field()}}
                    <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.config.js')}}"></script>
                    <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.all.min.js')}}"> </script>
                    <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/lang/zh-cn/zh-cn.js')}}"></script>
                    <script id="editor" type="text/plain" name="dis_content" style="width:800px;height:200px;" value=""></script>
                    <script type="text/javascript">
                        var ue = UE.getEditor('editor');
                    </script>
                    <style>
                        .edui-default{line-height: 28px;}
                        div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                        {overflow: hidden; height:20px;}
                        div.edui-box{overflow: hidden; height:22px;}
                    </style>
                  </td>
                 
                 <button class="tjiao" href="javascript:;style="background:orange">提  交</button>
            </div> 
          <script>
              $(function(){
                  $('.btn').click(function(){
                      $('.xxoo').css('display','block');
                  })
              })
                  $('.btn').dblclick(function(){
                      $('.xxoo').css('display','none');
                  })

                  $('.tjiao').click(function(){
                      form  = ue.getContent();
                   
                      
            
                      $.post("{{url('/home/liuyan/add')}}",{'_token':"{{csrf_token()}}",'y_dis':form},function(data){
                       location.href = location.href;
                       alert(data);                     
              })
                  })
          </script>
        
      <div class="page_list">
                    {!! $yonghu->render() !!}
      </div>
       <style>
    ol, ul li {
        text-align: center;
        float: left;
        list-style: none;
        padding-left: 2em;
        padding: 0;
        margin-left: 8px;
        width: 80px;
        height: 25px;
        background: #f5f4f4;
    }
</style>


    </div>

    <div class="am-u-md-4 am-u-sm-12 blog-sidebar">
        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-text-center blog-title"><span>About ME</span></h2>
            <img src="/home/assets/i/f14.jpg" alt="about me" class="blog-entry-img" >
            <p>妹纸</p>
            <p>
        我是妹子UI，中国首个开源 HTML5 跨屏前端框架
        </p><p>我不想成为一个庸俗的人。十年百年后，当我们死去，质疑我们的人同样死去，后人看到的是裹足不前、原地打转的你，还是一直奔跑、走到远方的我？</p>
        </div>
        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-text-center blog-title"><span>Contact ME</span></h2>
            <p>
                <a href=""><span class="am-icon-qq am-icon-fw am-primary blog-icon"></span></a>
                <a href=""><span class="am-icon-github am-icon-fw blog-icon"></span></a>
                <a href=""><span class="am-icon-weibo am-icon-fw blog-icon"></span></a>
                <a href=""><span class="am-icon-reddit am-icon-fw blog-icon"></span></a>
                <a href=""><span class="am-icon-weixin am-icon-fw blog-icon"></span></a>
            </p>
        </div>
        <div class="blog-clear-margin blog-sidebar-widget blog-bor am-g ">
            <h2 class="blog-title"><span>TAG cloud</span></h2>
            <div class="am-u-sm-12 blog-clear-padding">
            <a href="" class="blog-tag">amaze</a>
            <a href="" class="blog-tag">妹纸 UI</a>
            <a href="" class="blog-tag">HTML5</a>
            <a href="" class="blog-tag">这是标签</a>
            <a href="" class="blog-tag">Impossible</a>
            <a href="" class="blog-tag">开源前端框架</a>
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
<!-- content end -->

@endsection