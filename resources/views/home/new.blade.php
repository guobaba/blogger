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
         
       
            <h3 class="blog-comment">评论</h3>
            <style>
                #button{
                  margin-left: 200px;
                }
            </style>
             <div>
           @if(!(empty($dis)))
          @foreach($dis as $k=>$v)
             <div>
               <span>{{$v['user_name']}}</span>---回复----
               <span>{{$v['user_name']}}</span>---：
               <span >{!!$v['dis_content']!!}</span><button id="art"  data-dis_id='{{$v['dis_id']}}' user_id="{{$v['user_id']}}">回复</button>
             </div><hr>
          @endforeach
           @endif
  
          </div>
           <form  class="am-form am-g" action="{{url('/dis/0')}}" method="post">
                  
           
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
                          <a id="tjiao" href="javascript:;" art_id="{{$art->art_id}}">提交</a>

                
  
        </form>
<script>
    
    $(function(){
        var form = null;
        var id = 0;
        var art_id = 0;
        $('button').click(function(){
          id = $(this).attr('data-dis_id');
          


        });
        $('#tjiao').click(function(){
              form  = ue.getContent();
              art_id = $(this).attr('art_id');
              user_id = $('#art').attr('user_id');
             

              $.post("{{url('/dis/')}}/"+id,{'_token':"{{csrf_token()}}",'dis_content':form,'art_id':art_id,'re_id':id,'user_id':user_id},function(data){
                 if(data.status == 0){
                     location.href = location.href;
                     layer.msg(data.msg, {icon: 6});
                 }else{
                     location.href = location.href;
                     layer.msg(data.msg, {icon: 5});
                 }
              })
      });
   
  })

</script>

        <hr>
    </div>
</div>
<!-- content end -->

@endsection