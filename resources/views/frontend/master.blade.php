<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="lE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{setting('description')}}">
    <meta name="keywords" content="{{setting('site_keywords')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{setting('fav_icon')}}">
    <title>{{ setting('site_name') }} | @yield('title', 'Welcome you') </title>
    <link rel="stylesheet" href="{{ url('/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" href="{{ url('/css/animate.css') }}"/>
    <link rel="stylesheet" href="{{ url('/css/bootstrap.cs') }}s">
    <link rel="stylesheet" href="{{ url('/css/bootstrap-select.min.css') }}"/>
    @if(LaravelLocalization::getCurrentLocale() == 'ar')
        <link rel="stylesheet" href="{{ url('/css/bootstrap-rtl.css') }}">
    @endif
    <link rel="stylesheet" href="{{ url('/css/ticker-style.css') }}"/>
    <link rel="stylesheet" href="{{ url('/css/hover.css') }}"/>
    <link rel="stylesheet" href="{{ url('/css/owl.carousel.css') }}"/>
    <link rel="stylesheet" href="{{ url('/css/style.css') }}"/>

    <link rel="stylesheet" href="{{ url('/css/style-' . LaravelLocalization::getCurrentLocale() . '.css') }}"/>
    <link rel="stylesheet" href="{{ url('/css/media.css') }}"/>
    <link rel="stylesheet" href="{{ url('/css/jquery-ui.min.css') }}"/>
    <link rel="stylesheet" href="{{ url('/css/notie.min.css') }}"/>
    <link rel="stylesheet" href="{{ url('/css/bootstrap-formhelpers.min.css') }}"/>
    <script src="{{ url('/js/jquery-1.12.2.js') }}"></script>
    <script src="{{ url('/js/jquery-ui.min.js') }}"></script>

    {{--<script src="http://maps.google.com/maps/api/js"></script>--}}

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWymiO9Sk-Xp_8gVAuegZ3TpJ1FtbFLZI&amp;sensor=false&amp;signed_in=false&amp;libraries=geometry,places"></script>
    {{--<script src="{{asset('js/markerclusterer.js')}}"></script>--}}
    {{--<script src="{{asset('js/maperizer/List.js')}}"></script>--}}
    {{--<script src="{{asset('js/maperizer/Maperizer.js')}}"></script>--}}
    {{--<script src="{{asset('js/maperizer/map-options.js')}}"></script>--}}
    {{--<script src="{{asset('js/maperizer/jqueryui.maperizer.js')}}"></script>--}}
    <script src="{{asset('js/notie.min.js')}}"></script>

    <script src="{{ url('/js/gmap.min.js') }}"></script>
    {{--<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>--}}
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
        window.notie
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
                                            <a href="{{ setting('facebook') }}"><i class="fa fa-facebook"
                                                                                   aria-hidden="true"></i></a></li>
                                        <li class="twitter-1 hvr-float">
                                            <a href="{{ setting('twitter') }}"><i class="fa fa-twitter"
                                                                                  aria-hidden="true"></i></a></li>
                                        <li class="youtube-1 hvr-float">
                                            <a href="{{ setting('youtube') }}"><i class="fa fa-youtube"
                                                                                  aria-hidden="true"></i></a></li>
                                        {{--<li class="google-1 hvr-float">--}}
                                        {{--<a href="{{ setting('facebook') }}"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>--}}
                                        {{--<li class="rss-1 hvr-float">--}}
                                        {{--<a href="{{ setting('facebook') }}"><i class="fa fa-rss" aria-hidden="true"></i></a></li>--}}
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-6 xs-12">
                        <!-- <button class="bot-com-2"><a href="index_en.html">English</a></button> -->
                        <div class="heder-top-right">
                            <ul class="left_header">

                                @if (Auth::guest())
                                    <li>
                                        <a data-toggle="tooltip" data-placement="bottom" title="@lang('main.register')" href="{{url('/be_member')}}"><i class="fa fa-user-plus"></i></a>
                                    </li>
                                    <li>
                                        <a data-toggle="tooltip" data-placement="bottom" title="@lang('main.login')" href="{{url('/login')}}"><i class="fa fa-lock"></i></a>
                                    </li>
                                @else
                                        <li class="user_hover">
                                            <a href="{{url('/profile/create')}}">
                                                @if(@Auth::user()->profile->photo)<img src="{{url('/uploads/' . @Auth::user()->profile->photo)}}">@endif
                                            <span>{{Auth::user()->first_name}}</span>
                                            </a>
                                            <ul class="sub-menu-left">
                                                @if(!Auth::user()->profile)
                                                    <li><a href="{{url('/profile/create')}}">{{__('main.complete_profile')}}</a></li>
                                                @else
                                                    <li><a href="{{url('/home')}}">{{__('main.your_profile')}}</a></li>
                                                @endif
                                                <li><a data-toggle="tooltip"
                                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                   data-placement="bottom" title="@lang('main.exit')">
                                                    <i class="fa fa-power-off "></i>
                                                </a></li>
                                                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                                      style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>

                                            </ul><!-- sub-menu for user -->
                                        </li><!-- user hover -->

                                    @if(Auth::user()->profile)<li class="notifications">
                                        <a href="" data-toggle="tooltip" data-placement="bottom" title="@lang('main.messages')"><i class="fa fa-envelope-o"></i><span class="badge">{{ count(\App\Message::where('to',Auth::user()->id)->where('read', 0)->get()) }}</span></a>
                                        </li>@endif
                                @endif


                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    @if($localeCode == LaravelLocalization::getCurrentLocale())
                                        <li class="active">
                                            <img class="flag flag-{{$localeCode}}"/>
                                        </li>
                                    @elseif($url = LaravelLocalization::getLocalizedURL($localeCode))
                                        <li>
                                            <a rel="alternate" hreflang="{{$localeCode}}" href="{{$url}}">
                                                <img class="flag flag-{{$localeCode}}"/>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach


                            </ul><!-- left header -->
                        </div><!-- top-right -->
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
                                @if(file_exists(public_path() . '/uploads/' . setting('logo')))
                                    <img class=" img-logo-top-1 wow fadeInDown" data-wow-duration=" 2s"
                                         src="{{ url('/uploads/' . setting('logo')) }}">
                                @else
                                    <div style="font-size: 24px; margin-top: 45px; text-transform: uppercase;">{{ config('app.name', 'Modarrisi') }}</div>
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
                            @foreach(App\Menu::orderBy('order','asc')->get() as $menuItem)
                                @if( $menuItem->parent_id == 0 )
                                    <li class="qw {{ $menuItem->url ? '' : "dropdown menu-item-has-children" }}">
                                        <a href="@if($menuItem->children->isEmpty())
                                        @if(in_array($menuItem->url,\App\Page::pluck('slug')->toArray()))
                                        {{ $menuItem->url}}
                                        @elseif(strpos($menuItem->url, '/') !== false )
                                        {{ $menuItem->url}}
                                        @else
                                                http://{{$menuItem->url}}
                                        @endif
                                        @else
                                                #
                                            @endif" {{ $menuItem->children->isEmpty() ? '' : "class=\"dropdown-toggle\" data-toggle=dropdown role=button aria-expanded=false" }}>{{ $menuItem->title }}</a>


                                        @endif

                                        @if( ! $menuItem->children->isEmpty() )
                                            <ul class="dropdown-menu sub-menu" role="menu">
                                                @foreach($menuItem->children as $subMenuItem)
                                                    <li>
                                                        <a href="
                                                            @if(in_array($subMenuItem->url,\App\Page::pluck('slug')->toArray()))
                                                        {{$subMenuItem->url}}
                                                        @elseif(strpos($subMenuItem->url, 'section/') !== false )
                                                        {{$subMenuItem->url}}
                                                        @else
                                                                http://{{$subMenuItem->url}}
                                                        @endif
                                                                ">{{ $subMenuItem->title }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>

                                    @endforeach

                        </ul>


                    </div><!-- /.navbar-collapse -->
                    <div class="segin wow fadeInDown" data-wow-duration="2s">
                        <div class="bottom-headre">
                            @if (Auth::guest())
                                <button onclick="location.href='{{url('/be_member')}}';"
                                        class="but-1 hvr-float-shadow">@lang('main.h_register')
                                </button>
                                <button onclick="location.href='{{url('/login')}}';"
                                        class="but-2 hvr-float-shadow">@lang('main.login')
                                </button>
                            @endif
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </nav>

        </div>
    </div>
</header>
<!-- end header-->

<script type="text/javascript">
    {{--@if($errors->all())--}}
        {{--notie.alert({text: '{{ Html::ul($errors->all(),['class' => 'list1']) }}',time: 8,});--}}
    {{--@endif--}}

    @if (Session::has('message'))
        notie.alert({text: '{{ Session::get('message') }}'});
    @endif
    @if (Session::has('error'))
        notie.alert({type: 3, text: '{{ Session::get('error') }}'});
    @endif

</script>

@yield('content')


<!--footer**************************************-->
<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <p class="first"> @lang('main.news_letter')</p>
                    <hr>
                    <div class="form123">
                        {{Form::open(array('action' => 'SubscribersController@Submit','method' => ' '))}}
                        {{Form::text('name',null,array('placeholder'=>__('main.y_name'),'class' => 'input1'))}}
                        {{Form::text('email',null,array('placeholder'=>__('main.y_email'),'class' => 'input1'))}}
                        {{Form::submit(__('main.subscribe'),['class' => 'input1'])}}
                        {{Form::close()}}
                        <div class="content"></div>
                    </div>

                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <p class="first"> @lang('main.follow_fb') </p>
                    <hr>
                    <div class="fot-im">
                        <iframe src="https://www.facebook.com/plugins/page.php?href={{setting('facebook')}}%2F&tabs=timeline&width=260&height=270&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=418325768507501"
                                width="260" height="270" style="border:none;overflow:hidden" scrolling="no"
                                frameborder="0" allowTransparency="true"></iframe>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <p class="first"> @lang('main.contact_us') </p>
                    <hr>
                    <div class="conect-me">
                        <p><span>   <i class="fa fa-envelope-o" aria-hidden="true"></i> </span> {{setting('email')}}
                        </p>
                        <p><span>   <i class="fa fa-phone" aria-hidden="true"></i> </span> {{setting('phone')}} </p>
                        <p><span>   <i class="fa fa-user-plus" aria-hidden="true"></i> </span> {{setting('postal')}}
                        </p>
                        <p><span>   <i class="fa fa-map-marker" aria-hidden="true"></i> </span> {{setting('address')}}
                        </p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <p class="first"> @lang('main.on_map') </p>
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
                    <script type='text/javascript'>
                        function init_map() {
                            var myOptions = {
                                zoom: 10,
                                center: new google.maps.LatLng( {{setting('lat')}}, {{setting('lng')}} ),
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                            };
                            map1 = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
                            marker = new google.maps.Marker({
                                map: map,
                                position: new google.maps.LatLng( {{setting('lat')}}, {{setting('lng')}} )
                            });
                            infowindow = new google.maps.InfoWindow({content: '<div style="color:teal" ><b>{{setting('site_name')}}</b><br>{{setting('address')}}<br></din>'});
                            google.maps.event.addListener(marker, 'click', function () {
                                infowindow.open(map1, marker);
                            });
                            infowindow.open(map1, marker);
                        }
                        google.maps.event.addDomListener(window, 'load', init_map);
                    </script>

                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <p class="footer-bottom-p">{{setting('copyright')}}</p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="footer-bottom-img">
                        <img src="{{ url('/images/footer-log-bottom.png')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<script src="{{ url('/js/bootstrap.min.js') }}"></script>
<script src="{{ url('/js/bootstrap-select.min.js') }}"></script>
<script src="{{ url('/js/bootstrap-rating.min.js') }}"></script>
<script src="{{ url('/js/owl.carousel.js') }}"></script>
<script src="{{ url('/js/jquery.ticker.js') }}"></script>
<script src="{{ url('/js/wow.min.js') }}"></script>
<script>new WOW().init();</script>
<script src="{{ url('/js/jquery.mixitup.js') }}"></script>
<script src="{{ url('/js/JavaScript-1.js') }}"></script>
<script src="{{ url('/js/bootstrap-formhelpers.min.js') }}"></script>
<script type="text/javascript">


    {{--Ajax For Subscribe to newsletter--}}
        $(document).ready(function () {
        $('div.content').hide();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('input.subscribe').click(function (e) {
            e.preventDefault();
            $.post('ar/subscribers/submit', {
                _token: $('input[name="_token"]').val(),
                name: $('input[name="name"]').val(),
                email: $('input[name="email"]').val()
            }, function ($data) {
                if ($data == '1') {
                    notie.alert({text: '{{__('main.newsletter')}}', time: 8,});
                } else {
                    notie.alert({text: $data, time: 8,});
                }
            });
        });
        $('.form123').submit(function (e) {
            e.preventDefault();
            $('input[type="submit"]').click();
        });
    });
    $('input.rating').rating();

    $('.notifications').click(function () {
        $('.notifications_box').fadeToggle(500)
    })
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });


</script>

</body>
</html>
