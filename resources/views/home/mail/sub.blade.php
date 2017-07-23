<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
{{--恭喜您注册成功：<h3>{{ $user_email }}</h3>,点击<a href="www.guodada.com/home/zhuce/zhuce?user_id={{$id}}&user_token={{$user_token}}">连接</a>立即激活，激活成功请注意完善。--}}
恭喜您订阅成功：<h3>{{ $sub_email }}</h3>,如需退订,请 <a href="{{url('/subscibe/debook?sub_email=').$sub_email.'&sub_token='.$sub_token}}">点击此处</a>.
</body>
</html>