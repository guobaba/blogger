<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
{{--<body>{{url('/home/zhuce/zhuce?user_id=').$id.'&user_token='.$user_token}}--}}
{{--恭喜您注册成功：<h3>{{ $user_email }}</h3>,点击<a href="http://www.guobaba.com/a/{{$id}}">连接</a>立即激活，激活成功请注意完善。--}}
已更新最新文章,<a href="{{url('/a/').'/'.$id}}">点击此处查看文章详情</a>
如需退订,请 <a href="{{url('/subscibe/debook?sub_email=').$sub_email.'&sub_token='.$sub_token}}">点击此处</a>.
</body>
</html>