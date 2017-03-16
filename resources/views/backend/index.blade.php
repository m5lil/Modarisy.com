@extends('backend.master')



@section('content')

    @if (Auth::user()->id == 1 && !Auth::user() ->isAn('admin'))
        {!!Auth::user()->assign('admin')!!}
    @endif

    <div class="ui label">
        <i class="mail icon"></i> {{count(\App\Inbox::get())}} رسالة
    </div>
    <div class="ui label">
        <i class="file icon"></i> {{count(\App\Page::get())}} صفحة
    </div>

    <hr/>

    <div class="ui four link cards">
        <a href="#" class="card">
            <div class="image">
                <img src="{{url('/images/png/cogwheel-2.png')}}">
            </div>
            <div class="content">
                <div class="header">الإعدادت العامة</div>
                <div class="description">
                    تعديل إعدادت الموقع من الإسم وبيانات الإتصال وروابط الصفحات الإجتماعية وخلافه
                </div>
            </div>
        </a>

        <a href="#" class="card">
            <div class="image">
                <img src="{{url('/images/png/interface.png')}}">
            </div>
            <div class="content">
                <div class="header">الصفحـــــــات</div>
                <div class="description">
                    إضافة وتعديل الصفحات الثابته فى الموقع مثل صفحة عن الموقع أو الشروط والأحكام أو أى صفحة تريد وضعها
                    فى الموقع دو الحاجه للجوء لمختص
                </div>
            </div>
            <div class="extra content">
            <span class="right floated">
                {{count(\App\Page::where('statue',0))}} صفحة غير مفعلة
            </span>
                <span>
              <i class="file icon"></i> {{count(\App\Page::get())}} صفحة
            </span>
            </div>
        </a>

        <a href="#" class="card">
            <div class="image">
                <img src="{{url('/images/png/profile.png')}}">
            </div>
            <div class="content">
                <div class="header">الأعضـــــاء</div>
                <div class="description">
                    يمكن إضافة وعرض وتعديل وحذف الأعضاء وأيضا إضافهة صلاحيات جديده وتحديدها لأعضـــــاء معينه
                </div>
            </div>
            <div class="extra content">
            <span class="right floated">
                {{count(\App\User::where('activated',0)->get())}} عضو غير مفعل
            </span>
                <span>
              <i class="user icon"></i> {{count(\App\User::get())}} عضو
            </span>
            </div>
        </a>

        <a href="#" class="card">
            <div class="image">
                <img src="{{url('/images/png/profile.png')}}">
            </div>
            <div class="content">
                <div class="header">المدرسين</div>
                <div class="description">
                    يمكن إضافة وعرض وتعديل وحذف الأعضاء وأيضا إضافهة صلاحيات جديده وتحديدها لأعضـــــاء معينه
                </div>
            </div>
            <div class="extra content">
            <span class="right floated">
                {{count(\App\Profile::where('statue',0)->get())}} مدرس غير مفعل
            </span>
                <span>
              <i class="user icon"></i> {{count(\App\User::get())}} <مدرس></مدرس>
            </span>
            </div>
        </a>

        <a href="#" class="card">
            <div class="image">
                <img src="{{url('/images/png/paper-plane.png')}}">
            </div>
            <div class="content">
                <div class="header">الرسائل</div>
                <div class="description">
                    يمكن إضافة وعرض وتعديل وحذف الأعضاء وأيضا إضافهة صلاحيات جديده وتحديدها لأعضـــــاء معينه
                </div>
            </div>
            <div class="extra content">
            <span class="right floated">
                 {{count(\App\Inbox::where('read', 0)->get())}} رسالة جديده
            </span>
                <span>
              <i class="mail icon"></i> {{count(\App\Inbox::get())}} رسالة
            </span>
            </div>
        </a>
        <a href="#" class="card">
            <div class="image">
                <img src="{{url('/images/png/power.png')}}">
            </div>
            <div class="content">
                <div class="header">تسجيل الخروج</div>
                <div class="description">
                    اتسجيل الخروج من لوحة التحكم
                </div>
            </div>
        </a>
    </div>
@endsection
