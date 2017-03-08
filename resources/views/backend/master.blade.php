<!DOCTYPE HTML>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
    <title> لوحة التحكم </title>
    <link href="{{ url('plugins/semantic/dist/semantic.rtl.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ mix('css/admin.css') }}" rel='stylesheet' type='text/css'>
    <meta name="csrf" value="{{ csrf_token() }}">
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{url('css/all.css')}}">
    <style>
        .item{border: 1px solid #f0f0f0;}
    </style>
    @stack('css')
</head>

<body>
    <div class="ui icon primary basic open button" style="position:fixed; top:15px; right:20px; z-index: 102;">
        <i class="left blue content icon"></i>
    </div>

        <div class="ui vertical sidebar menu left accordion pointing" id="toc">
            <a href="#" class="ui medium image borderless">
                <img src="{{url('images/3.png')}}" />
            </a>
            <a href="/dashboard/settings" class="item">
                <i class="options blue icon"></i> الإعدادت العامة
            </a>

            {{-- <a href="/dashboard/inbox" class="item">
                <i class="inbox blue icon"></i> البريد الوارد
            </a>
            <a href="/dashboard/pages" class="item">
                <i class="inbox blue icon"></i> الصفحات
            </a>

            <div class="ui item title">
                <i class="dropdown icon"></i> الأعضاء والصلاحيات
            </div>
            <div class="content">
                <a href="/dashboard/users" class="item">
                    <i class="file icon"></i> الأعضاء
                </a>
                <a href="/dashboard/roles" class="item">
                    <i class="file icon"></i> الصلاحيات
                </a>
            </div>


            <div class="ui item title">
                <i class="dropdown icon"></i> الإعلانات
            </div>
            <div class="content">
                <a href="/dashboard/" class="item">
                    <i class="file icon"></i> الأقسام
                </a>
                <a href="/dashboard/" class="item">
                    <i class="file icon"></i> الإعلانات
                </a>
                <a href="/dashboard/" class="item">
                    <i class="file icon"></i> الماركات/الموديلات
                </a>
            </div>
            <div class="ui item title">
                <i class="dropdown icon"></i> الإعلانات
            </div>
            <div class="content">
                <a href="/dashboard/" class="item">
                    <i class="file icon"></i> الأقسام
                </a>
                <a href="/dashboard/" class="item">
                    <i class="file icon"></i> الإعلانات
                </a>
            </div>
 --}}
        </div>
        <div class="pusher" style="">
            <div class="ui grid">
                <div class="right floated sixteen wide column">
                    <div class=" ui container">
                        <div class="ui basic segment">
                            <div class="ui secondary pointing labeled icon menu">
                                <div class="ui dropdown item border1">
                                    <i class="inbox icon blue"></i> لوحة التحكم
                                    <div class="menu">
                                        <a href="/dashboard/" class="item">
                                            <i class="user icon blue"></i> الرئيسية
                                        </a>
                                        <a href="/dashboard/settings" class="item">
                                            <i class="user icon blue"></i> إعدادت الموقع
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
                                    <i class="inbox icon
                                    @if (App\Inbox::where('read', 0)->count() > 0)
                                        teal"><div class="floating ui circular teal label">{{App\Inbox::where('read', 0)->count()}}</div>
                                    @else
                                        blue">
                                    @endif
                                    </i> البريد الوارد
                                </a>
                                <a href="/dashboard/bar" class="item border1">
                                    <i class="area chart icon blue"></i> تقارير
                                </a>
                                <a href="/dashboard/subscribers" class="item border1">
                                    <i class="area chart icon blue"></i> القائمة البريدية
                                </a>
                                <div class="right menu">
                                    <div class="ui inline dropdown item">
                                        <div class="text">
                                            <i class="mail icon"></i> Admin
                                            <i class="dropdown icon"></i>
                                        </div>
                                        <div class="menu">
                                            @if (Auth::check())
                                                <a href="{{'/dashboard/users/' . Auth::user()->id}}/edit" class="item">
                                                    <i class="file icon"></i> الملف الشخصى
                                                </a>

                                            @endif
                                            <div class="item">
                                                <i class="file icon"></i> تغير كلمة المرور
                                            </div>
                                            <div class="item">
                                                <i class="file icon"></i> تسجيل خروج
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if (Session::has('message'))
                                <div class="ui teal segment">{{ Session::get('message') }}</div>
                                <div class="ui clearing divider"></div>
                            @endif
                            {{ Html::ul($errors->all(),['class' => 'ui error message']) }}
                            <br />
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
