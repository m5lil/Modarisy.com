<html>
<head></head>
<body style="background: white; color: #444;">
<div style="width: 80%; margin: 0 auto; direction: rtl">
    <h1>{{$title}}</h1>
    <p>{!! $content !!}</p>
    <p><a href="{{url('/profile/' . @$teacher->id)}}">{{ @$teacher->first_name }}</a></p>
</div>
</body>
</html>