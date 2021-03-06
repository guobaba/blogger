@extends('layouts.home')
@section('content')
<!-- content srart -->
@if(session('error'))
    <span>{{session('error')}}</span>

@endif
<div class="am-g am-g-fixed blog-fixed blog-content">
    <div class="am-u-sm-12">
      <article class="am-article blog-article-p">
        <div class="am-article-hd">
       	  @if(!empty($art))
          <h1 class="am-article-title blog-text-center">{{$art['art_title']}}</h1>
          <p class="am-article-meta blog-text-center">
              <span><a href="/" class="blog-color">{{$art['art_name']}} &nbsp;</a></span>-
              <span><a href="/"></a></span>-
              <span><a href="/">{{date('Y-m-d',$art['art_time'])}}</a></span>
          </p>
        </div>        
        <div class="am-article-bd">
        <img src="{{$art['art_thumb']}}" alt="" class="blog-entry-img blog-article-margin">
        <p class="class="am-article-lead"">
         {{$art['art_tag']}} <br>
／{{$art['art_editor']}}<br> <br>
        </p>
        {!!$art['art_content']!!}
        @endif
        </div>
         <!-- 点赞、打赏功能 -->
    <div>
      <button id="zz" 
        @if($zan)
          style="background:gold;";
        @else
          style = 'background:';
        @endif
        ><span id="yy" class="glyphicon glyphicon-thumbs-up animation" aria-hidden="true" title="点赞"></span></button>
      <span id="zz-txt">{{$art['art_zan']}}</span>
      <!-- <span id="add-num"><em>+1</em></span> -->

      
      <button id ='btn'><span class="glyphicon glyphicon-jpy" aria-hidden="" title="打赏我"></span></button>
      <div id="xo" style="width:100px;height:100px;display:none;">
        <img src="/home/images/weixin.jpg" alt="">
      </div>

    </div>
   
    <script type="text/javascript">

            // 打赏
            $('#btn').click(function(){
                if($('#xo').css('display') =='none'){
                  $('#xo').fadeIn(1000);
                }else{
                  $('#xo').fadeOut(1000);
                }
            });

            // 点赞
            $("#zz").click(function(){

            @if(!$zan)
              $(this).css('background','gold');
              $.post("{{url('/home/zan')}}",{'_token':"{{csrf_token()}}",art_id:"{{$art['art_id']}}"},function(data){
                  location.href = location.href;
                  alert(data);
              });
            @else
              alert('您已经点过赞了。');
            @endif
            });
            // var text_box = $("#add-num");
            // var num=parseInt(zz_txt.text());
            // num += 1;
            // zz_txt.text(num);

            
            
    </script>

    <!-- 收藏 -->
    <div>
        
    </div>
      </article>





    <ul class="am-pagination">
    @if(empty($article1))
    <li class="am-pagination-prev">没有上一篇了</li>
    @else
     <li class="am-pagination-prev"><a href="/a/{{$article1['art_id']}}">上一篇：{{$article1['art_title']}}</a></li>
     @endif

    @if(empty($article2))
    <li class="am-pagination-next">没有下一篇了</li>
    @else
     <li class="am-pagination-next"><a href="/a/{{$article2['art_id']}}">下一篇：{{$article2['art_title']}}</a></li>
     @endif
    </ul>
        
        <div class="am-g blog-article-widget blog-article-margin">
        </div>

        <hr>
        <div class="am-g blog-author blog-article-margin">
          <div class="am-u-sm-3 am-u-md-3 am-u-lg-2">
            <img src="/home/assets/i/f15.jpg" alt="" class="blog-author-img am-circle">
          </div>
          <div class="am-u-sm-9 am-u-md-9 am-u-lg-10">
          <h3><span>作者 &nbsp;: &nbsp;</span><span class="blog-color">华北F4</span></h3>
            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div>
        <hr>
        <ul class="am-pagination blog-article-margin">
          <li class="am-pagination-prev"><a href="#" class="">&laquo; 一切的回顾</a></li>
          <li class="am-pagination-next"><a href="">不远的未来 &raquo;</a></li>
        </ul>
        
        <hr>
         
       
            <h3 class="blog-comment">评论</h3>
       	@if(!empty($dis))
          @foreach($dis as $k=>$v)
             <div>
{{dump('->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->')}}
               <span>{{$v['user_email']}}</span>---回复----
               @if(!$v['re_id'])
                <span>文章</span><br>
               @else
                <span>{{$v['user_name']}}</span>---：<br>
               @endif
               <span >回复内容:{!!$v['dis_content']!!}</span><br><button class="art"  data-dis_id='{{$v['dis_id']}}' user_id="{{$v['user_id']}}" style="background:yellowgreen">点我选择</button>
             </div><hr>
          @endforeach
  		  @endif
     
                <tr>
                  <th>评论：</th>
                  <td>
                    {{csrf_field()}}
                    <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.config.js')}}"></script>
                    <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.all.min.js')}}"> </script>
                    <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/lang/zh-cn/zh-cn.js')}}"></script>
                    <script id="editor" type="text/plain" name="dis_content" style="width:850px;height:200px;" value="">xx</script>
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
                </tr>
                          
        <button id="tjiao" href="javascript:;" art_id="{{$art->art_id}}" style="background:orange">提  交</button>
                  

                   

                
  
      
<script>

    $(function(){
     
        var form = null;
        var id = 0;
        var art_id = 0;
        $('.art').click(function(){
          id = $(this).attr('data-dis_id');
          console.log(id);
          
        });

        $('#tjiao').click(function(){
              form  = ue.getContent();
              art_id = $(this).attr('art_id');
            
              $.post("{{url('/dis/')}}/"+id,{'_token':"{{csrf_token()}}",'dis_content':form,'art_id':art_id,'re_id':id},function(data){
                    location.href = location.href;
                    alert(data);
              })
       })

    });


</script>

        <hr>
    </div>
</div>
<!-- content end -->

@endsection