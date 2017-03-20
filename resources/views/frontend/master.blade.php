<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="lE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ setting('site_name') }} | @yield('title', '') </title>
    <link rel="stylesheet" href="{{ url('/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" href="{{ url('/css/animate.css') }}"/>
    <link rel="stylesheet" href="{{ url('/css/bootstrap.cs') }}s">
    <link rel="stylesheet" href="{{ url('/css/bootstrap-select.min.css') }}"/>
    <link rel="stylesheet" href="{{ url('/css/bootstrap-rtl.cs') }}s">
    <link rel="stylesheet" href="{{ url('/css/ticker-style.css') }}"/>
    <link rel="stylesheet" href="{{ url('/css/hover.css') }}"/>
    <link rel="stylesheet" href="{{ url('/css/owl.carousel.css') }}"/>
    <link rel="stylesheet" href="{{ url('/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ url('/css/style-ar.css') }}"/>
    <link rel="stylesheet" href="{{ url('/css/media.css') }}"/>

    <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>
<body>

<header>
    <div class="header">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs12">
                        <div class="heder-top-left">
                            <div class="liste">
                                <div class="bootom">

                                    <ul class="list-inline">
                                        <li class="facebook-1 hvr-float">
                                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li class="twitter-1 hvr-float">
                                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li class="youtube-1 hvr-float">
                                            <a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                        <li class="instagram-1 hvr-float">
                                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                        <li class="google-1 hvr-float">
                                            <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                        <li class="rss-1 hvr-float">
                                            <a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-6 xs-12">
                        <button class="bot-com-2"><a href="index_en.html">English</a></button>

                        <div class="heder-top-right">
                            <p class="wats">
                                0567816954
                                <span><i class="fa fa-whatsapp" aria-hidden="true"></i></span>
                            </p>
                            <p class="mail">
                                info@website.com
                                <span class="icon-top"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  header-bottom      -->


        <div class="head-b">
            <nav class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <div class="aside">
                                @if(setting('logo'))
                                    <img class=" img-logo-top-1 wow fadeInDown" data-wow-duration="" 2s""
                                    src="{{ url('/uploads/' . setting('logo')) }}">
                                @else
                                    {{ config('app.name', 'Modarrisi') }}
                                @endif
                            </div>
                        </a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav text-center nna">
                            <li class="active qw"><a href="#">الرئيسة <span class="sr-only">(current)</span></a></li>
                            <li class="qw"><a class="qwe" href="contact.html">العثور على مدرس</a></li>
                            <li class="qw"><a class="qwe" href="contact-3.html">كيف يعمل</a></li>
                            <li class="dropdown menu-item-has-children qw">
                                <a href="contact-me.html" class="dropdown-toggle qwe" data-toggle="dropdown"
                                   role="button"
                                   aria-haspopup="true" aria-expanded="false"> الطلبه<span class=""></span></a>
                                <ul class="dropdown-menu  sub-menu">
                                    <li><a href="contact-me-2.html">الطالب</a></li>
                                    <li><a href="contact-me.html">المدرس</a></li>
                                    <li><a href="contact-3.html"> ولى امر الطالب </a></li>

                                </ul>
                            </li>
                            <li class="qw"><a class="qwe" href="contact-4.html"> اتصل بنا</a></li>
                        </ul>


                    </div><!-- /.navbar-collapse -->
                    <div class="segin wow fadeInDown" data-wow-duration="" 2s
                    "">
                    <div class="bottom-headre">
                        @if (Auth::guest())
                            <button onclick="location.href='{{url('/')}}/be_member';" class="but-1 hvr-float-shadow">
                                اشتراك
                            </button>
                            <button onclick="location.href='{{url('/')}}/login';" class="but-2 hvr-float-shadow">دخول
                            </button>
                        @else
                            @if(!Auth::user()->profile)
                                <button onclick="location.href='{{url('/')}}/profile/create';"
                                        class="but-1 hvr-float-shadow">أكمل ملفك
                                </button>
                            @endif
                            <button type="submit"
                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                                class="but-2 hvr-float-shadow">خروج
                            </button>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @endif
                    </div>
                </div>
        </div><!-- /.container-fluid -->
        </nav>

    </div>
    </div>
</header>
<!-- end header-->

@yield('content')


<!--footer**************************************-->
<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <p class="first"> القائمة الرئيسية </p>
                    <hr>
                    {{Form::open(array('action' => 'SubscribersController@Submit','method' => 'post'))}}
                    {{Form::text('name',null,array('placeholder'=>'Type your Name here'))}}
                    {{Form::text('email',null,array('placeholder'=>'Type your E-mail address here'))}}
                    {{Form::submit('Submit!')}}

                    {{Form::close()}}
                    <div class="content"></div>


                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <p class="first"> تابعنا على الفيس </p>
                    <hr>
                    <div class="fot-im">
                        <img src="images/footer-soshil.png">
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <p class="first"> اتصل بنا </p>
                    <hr>
                    <div class="conect-me">
                        <p><span>   <i class="fa fa-envelope-o" aria-hidden="true"></i> </span> info@website.com </p>
                        <p><span>   <i class="fa fa-phone" aria-hidden="true"></i> </span> 009000000 / 009000000 </p>
                        <p><span>   <i class="fa fa-user-plus" aria-hidden="true"></i> </span> 0090000000 </p>
                        <p><span>   <i class="fa fa-map-marker" aria-hidden="true"></i> </span> السعودية , الرياض </p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <p class="first"> موقعنا على الخريطه </p>
                    <hr>

                    <div style='overflow:hidden;     margin-top: 35px;height:200px;width:100%;'>
                        <div id='gmap_canvas' style='height:200px;width:100%; border-radius: 8px;'></div>
                        <div>
                            <small><a href="http://embedgooglemaps.com">embedgooglemaps.com</a></small>
                        </div>
                        <div>
                            <small>
                                <a href="http://www.proxysitereviews.com /categories/myprivateproxy/">Myprivateproxy</a>
                            </small>
                        </div>
                        <style>#gmap_canvas img {
                                max-width: none !important;
                                background: none !important
                            }</style>
                    </div>
                    <script type='text/javascript'>function init_map() {
                            var myOptions = {
                                zoom: 10,
                                center: new google.maps.LatLng(24.7135517, 46.67529569999999),
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                            };
                            map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
                            marker = new google.maps.Marker({
                                map: map,
                                position: new google.maps.LatLng(24.7135517, 46.67529569999999)
                            });
                            infowindow = new google.maps.InfoWindow({content: '<strong>المنصوره ساميه الجمل</strong><br>Riyad, Saudi Arabia<br>'});
                            google.maps.event.addListener(marker, 'click', function () {
                                infowindow.open(map, marker);
                            });
                            infowindow.open(map, marker);
                        }
                        google.maps.event.addDomListener(window, 'load', init_map);</script>

                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <p class="footer-bottom-p">جميع الحقوق محفوظة لـ موقع مدرسى 2016</p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="footer-bottom-img">
                        <img src="images/footer-log-bottom.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<script src="{{ url('/js/jquery-1.12.2.js') }}"></script>

<script src="{{ url('/js/bootstrap.min.js') }}"></script>
<script src="{{ url('/js/bootstrap-select.min.js') }}"></script>
<script src="{{ url('/js/owl.carousel.js') }}"></script>
<script src="{{ url('/js/jquery.ticker.js') }}"></script>
<script src="{{ url('/js/wow.min.js') }}"></script>
<script>new WOW().init();</script>
<script src="{{ url('/js/jquery.mixitup.js') }}"></script>
<script src="{{ url('/js/JavaScript-1.js') }}"></script>
<script type="text/javascript">


    {{--Ajax For Subscribe to newsletter--}}
    //    $(document).ready(function (){
    //        $('div.content').hide();
    //        $('input[type="submit"]').click(function(e){
    //            e.preventDefault();
    //            $.post('/subscribers/submit', {
    //                _token: $('input[name="_token"]').val(),
    //                name: $('input[name="name"]').val(),
    //                email: $('input[name="email"]').val()
    //            }, function($data){
    //                if($data=='1') {
    //                    $('div.content').hide().removeClass('success error').addClass('success').html('You\'ve successfully subscribed to ournewsletter').fadeIn('fast');
    //                } else {
    //                    $('div.content').hide().removeClass('success error').addClass('error').html('There has been an error occurred:<br /><br />'+$data).fadeIn('fast');
    //                }
    //            });
    //        });
    //        $('form').submit(function(e){
    //            e.preventDefault();
    //            $('input[type="submit"]').click();
    //        });
    //    });


</script>

</body>
</html>
