<!DOCTYPE HTML>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0"/>
    <title> لوحة التحكم </title>
    <link href="{{ url('plugins/semantic/dist/semantic.rtl.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ mix('css/admin.css') }}" rel='stylesheet' type='text/css'>
    <meta name="csrf" value="{{ csrf_token() }}">
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{url('css/all.css')}}">
    <style>
        .item {
            border: 1px solid #f0f0f0;
        }
    </style>
    @stack('css')
</head>

<body>
<div class="ui icon primary basic open button" style="position:fixed; top:15px; right:20px; z-index: 102;">
    <i class="left blue content icon"></i>
</div>

<div class="ui vertical sidebar menu left accordion pointing" id="toc">
    <a href="#" class="ui medium image borderless">
        <img src="{{url('images/3.png')}}"/>
    </a>
    <a href="/dashboard/settings" class="item">
        <i class="options blue icon"></i> الإعدادت العامة
    </a>

    <a href="/dashboard/home_settings" class="item">
        <i class="options blue icon"></i> إعدادات الصفحة الرئيسية
    </a>

    <a href="/dashboard/inbox" class="item">
        <i class="inbox blue icon"></i> البريد الوارد
    </a>
    <a href="/dashboard/pages" class="item">
        <i class="file blue icon"></i> الصفحات</a>

    <div class="ui item title">
        <i class="dropdown icon"></i> الأعضاء والصلاحيات
    </div>
    <div class="content">
        <a href="/dashboard/users" class="item">
            <i class="hashtag icon"></i> الأعضاء
        </a>
        <a href="/dashboard/abilities" class="item">
            <i class="hashtag icon"></i> الصلاحيات
        </a>
        <a href="/dashboard/users/members/students" class="item">
            <i class="hashtag icon"></i> التلاميذ
        </a>
        <a href="/dashboard/users/members/teachers" class="item">
            <i class="hashtag icon"></i> المدرسين
        </a>
    </div>


    <div class="ui item title">
        <i class="dropdown icon"></i> الطلبات
    </div>
    <div class="content">
        <a href="/dashboard/enquiries" class="item">
            <i class="hashtag icon"></i>الطلبات
        </a>
        <a href="/dashboard/enquiries/statue/suspend" class="item">
            <i class="hashtag icon"></i>غير مفعلة
        </a>
        <a href="/dashboard/enquiries/statue/active" class="item">
            <i class="hashtag icon"></i>الطلبات الجديدة
        </a>
        <a href="/dashboard/enquiries/statue/in-progress" class="item">
            <i class="hashtag icon"></i>جارى العمل عليها
        </a>
        <a href="/dashboard/enquiries/statue/done" class="item">
            <i class="hashtag icon"></i>تم إنهائها
        </a>
    </div>

    <div class="ui item title">
        <i class="dropdown icon"></i> العروض
    </div>
    <div class="content">
        <a href="/dashboard/applicants" class="item">
            <i class="hashtag icon"></i> العروض
        </a>
        <a href="/dashboard/applicants/statue/suspend" class="item">
            <i class="hashtag icon"></i> غير مفعلة
        </a>
        <a href="/dashboard/applicants/statue/active" class="item">
            <i class="hashtag icon"></i> الطلبات الجديدة
        </a>
        <a href="/dashboard/applicants/statue/in-progress" class="item">
            <i class="hashtag icon"></i>  جارى العمل عليها
        </a>
        <a href="/dashboard/applicants/statue/done" class="item">
            <i class="hashtag icon"></i> تم إنهائها
        </a>
    </div>
    <div class="ui item title">
        <i class="dropdown icon"></i> المدونة
    </div>
    <div class="content">
        <a href="/dashboard/blog/categories" class="item">
            <i class="hashtag icon"></i> الأقسام
        </a>
        <a href="/dashboard/blog/posts" class="item">
            <i class="hashtag icon"></i> المقالات
        </a>
    </div>

    <a href="/dashboard/materials" class="item">
        <i class="book blue icon"></i> المواد
    </a>

    <a href="/dashboard/edulevels" class="item">
        <i class="book blue icon"></i> المراحل التعليمية
    </a>

    <a href="/dashboard/testimonials" class="item">
        <i class="comment blue icon"></i> آراء العملاء
    </a>


</div>
<div class="pusher" style="">
    <div class="ui grid">
        <div class="right floated sixteen wide column">
            <div class=" ui container">
                <div class="ui basic segment">
                    <div class="ui secondary pointing labeled icon menu">
                        <div class="ui dropdown item border1">
                            <i class="home icon blue"></i> لوحة التحكم
                            <div class="menu">
                                <a href="/dashboard/" class="item">
                                    <i class="home icon blue"></i> الرئيسية
                                </a>
                                <a href="/dashboard/settings" class="item">
                                    <i class="options icon blue"></i> إعدادت الموقع
                                </a>
                                <a href="/dashboard/home_settings" class="item">
                                    <i class="options icon blue"></i> إعدادت الصفحة الرئيسية
                                </a>
                            </div>
                        </div>
                        <a href="/dashboard/pages" class="item border1">
                            <i class="file icon blue"></i> الصفحات
                        </a>
                        <a href="/dashboard/menu" class="item border1">
                            <i class="ellipsis horizontal icon blue"></i> القائمة
                        </a>
                        <div class="ui dropdown item border1">
                            <i class="users icon blue"></i> الأعضاء
                            <div class="menu">
                                <a href="/dashboard/users" class="item">
                                    <i class="user icon blue"></i> الأعضاء
                                </a>
                                <a href="/dashboard/users/members/teachers" class="item">
                                    <i class="user icon blue"></i> المدرسين
                                </a>
                                <a href="/dashboard/users/members/students" class="item">
                                    <i class="user icon blue"></i> الطلبه
                                </a>
                                <a href="/dashboard/abilities" class="item">
                                    <i class="user icon blue"></i> الصلاحيات
                                </a>
                            </div>
                        </div>
                        <a href="/dashboard/inbox" class="item border1">
                            <i class="mail icon
                                    @if (App\Inbox::where('read', 0)->count() > 0)
                                    teal">
                                <div class="floating ui circular teal label">{{App\Inbox::where('read', 0)->count()}}</div>
                                @else
                                    blue">
                                @endif
                            </i> البريد الوارد
                        </a>
                        <div class="ui dropdown item border1">
                            <i class="inbox icon blue"></i> العروض
                            <div class="menu">
                                <a href="/dashboard/applicants" class="item">
                                    <i class="hashtag icon"></i> العروض
                                </a>
                                <a href="/dashboard/applicants/statue/suspend" class="item">
                                    <i class="hashtag icon"></i> غير مفعلة
                                </a>
                                <a href="/dashboard/applicants/statue/active" class="item">
                                    <i class="hashtag icon"></i> الطلبات الجديدة
                                </a>
                                <a href="/dashboard/applicants/statue/in-progress" class="item">
                                    <i class="hashtag icon"></i>  جارى العمل عليها
                                </a>
                                <a href="/dashboard/applicants/statue/done" class="item">
                                    <i class="hashtag icon"></i> تم إنهائها
                                </a>
                            </div>
                        </div>
                        <div class="ui dropdown item border1">
                            <i class="wpforms icon blue"></i> الطلبات
                            <div class="menu">
                                <a href="/dashboard/enquiries" class="item">
                                    <i class="hashtag icon"></i> الطلبات
                                </a>
                                <a href="/dashboard/enquiries/statue/suspend" class="item">
                                    <i class="hashtag icon"></i> غير مفعلة
                                </a>
                                <a href="/dashboard/enquiries/statue/active" class="item">
                                    <i class="hashtag icon"></i> الطلبات الجديدة
                                </a>
                                <a href="/dashboard/enquiries/statue/in-progress" class="item">
                                    <i class="hashtag icon"></i>  جارى العمل عليها
                                </a>
                                <a href="/dashboard/enquiries/statue/done" class="item">
                                    <i class="hashtag icon"></i> تم إنهائها
                                </a>
                            </div>
                        </div>
                        <div class="ui dropdown item border1">
                            <i class="wordpress icon blue"></i> المدونة
                            <div class="menu">
                                <a href="/dashboard/blog/categories" class="item">
                                    <i class="folder open icon"></i> الأقسام
                                </a>
                                <a href="/dashboard/blog/posts" class="item">
                                    <i class="file text outline icon"></i> المقالات
                                </a>
                            </div>
                        </div>
                        <a href="/dashboard/subscribers" class="item border1">
                            <i class="mail square icon blue"></i> القائمة البريدية
                        </a>
                        <div class="right menu">
                            <div class="ui inline dropdown item">
                                <div class="text">
                                    <i class="user icon"></i> {{Auth::user()->first_name}}
                                    <i class="dropdown icon"></i>
                                </div>
                                <div class="menu">
                                    @if (Auth::check())
                                        <a href="{{url('/dashboard/users/' . Auth::user()->id)}}/edit" class="item">
                                            <i class="hashtag icon"></i> الملف الشخصى
                                        </a>
                                    @endif
                                    <a href="{{ url('/') }}" target="_blank" class="item">
                                        <i class="hashtag icon"></i> زيارة الموقع
                                    </a>
                                        <a type="submit"
                                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                                                class="item"><i class="power icon"></i>  خروج
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (Session::has('message'))
                        <div class="ui teal segment">{{ Session::get('message') }}</div>
                        <div class="ui clearing divider"></div>
                    @endif
                    {{ Html::ul($errors->all(),['class' => 'ui error message']) }}
                    <br/>
                    @yield('content')


                    <div class="ui clearing divider"></div>
                    <div class="ui right floated horizontal list">
                        <a class="item" href="#">الدعم</a>
                        <a class="item" href="#">مواد تعليمية</a>
                        <a class="item" href="#">إتصل بنا</a>
                        <div class="disabled item" href="#">© Elryad.com</div>
                    </div>
                    <div class="ui horizontal list">
                        <div class="item" href="#">لوحة تحكم صممت خصيصا لعملاء شركة الرياض</div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">

    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>

</script>
{{-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"
integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
crossorigin="anonymous"></script> --}}
<script src={{ mix( 'js/app.js') }}></script>
<script src={{ url( '/js/admin.js') }}></script>
<script src="{{ url('plugins/semantic/dist/semantic.min.js') }}"></script>
@stack('scripts')


</body>

</html>
