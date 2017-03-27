@extends('frontend.master')

@section('content')
    <!--slider***************************************-->
    <section class="modarsy-2">
        <section class="slider" style="height: 238px;">
            <div class="slid" style="height: 238px;">
                <div class="container">
                    <div class="row">
                        <div class="li-list">
                            <a href="#" class="home ">الرئيسية > </a>
                            <a href="#" class="conntact-my">نموذج التسجيل  > </a>
                            <a href="#" class="conntact-my active">إكمال الملف الشخصى </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="with-us text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2>
                            <a href="#">قم بمليء البيانات الخاصة بك لتكمل الملف الخاص بك</a>
                            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على
                                الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة
                                لوريم إيبسوم أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم
                إيبسوم ....</p>
                        </h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="modarsyy-1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="form">
                            {!! Form::open(array('route' => 'profile.store', 'method' => 'POST','files' => true)) !!}

                            <input type="text" name="school" placeholder="المدرسة">

                            <textarea name="intro" id="" cols="30" rows="10" placeholder="مقدمة عن نفسك..."></textarea>

                            <select name="hear" id="">
                                <option selected disabled>من أين سمعت عنا</option>
                                <option value="من خلال صديق">من خلال صديق</option>
                                <option value="من خلال محرك بحث">من خلال محرك بحث</option>
                                <option value="من خلال إعلان مطبوع">من خلال إعلان مطبوع</option>
                                <option value="من خلال البريد الإلكترونى">من خلال البريد الإلكترونى</option>
                                <option value="من خلال رسالة على جوالك">من خلال رسالة على جوالك</option>
                            </select>

                            {!! Form::date('dbirth') !!}

                            <input type="text" name="age" placeholder="العمر">

                            <label for="gender">
                                <input name="gender" type="radio" value="1"> ذكر
                            </label>

                            <label for="gender">
                                <input name="gender" type="radio" value="2"> أنثى
                            </label>

                            <select name="lang" id="">
                                <option selected disabled>لغة المادة</option>
                                <option value="english">English</option>
                                <option value="arabic">عربى</option>
                            </select>

                            @if(Auth::user()->type == 2)
                                {{Form::select('specialty',\App\Materials::pluck('title','slug'),null,['class' => 'form-control'])}}
                                <input type="text" name="gen_exp" placeholder="سنوات الخبره فى مجال تخصصك">
                                <input type="text" name="sch_exp" placeholder="سنوات العمل فى مجال التدريس">
                                <input type="text" name="hour_rate" placeholder="سعر الساعة بالدولار">
                                <input type="text" name="teach_time" placeholder="عدد الساعات المناسبة للتدريس فى اليوم من خلال موقعنا">
                                <select name="teach_hours" id="">
                                    <option selected disabled>مواعيد التدريس المناسبة</option>
                                    <option value="1">صباحا من 8ص وحتى 12م</option>
                                    <option value="2">منتصف اليوم من 12م وحتى 6م</option>
                                    <option value="3">مساءا من 6م وحتى 10م</option>
                                    <option value="4">فى أى وقت فى اليوم</option>
                                </select>
                            @elseif(Auth::user()->type == 3)
                                <select name="level" id="">
                                    <option selected disabled>المرحلة التعليمية</option>
                                    <option value="1">الصف الأول الإبتدائى</option>
                                    <option value="2">الصف الثانى الإبتدائي</option>
                                    <option value="3">الصف الأول الإبتدائى</option>
                                    <option value="4">الصف الثانى الإبتدائي</option>
                                </select>
                            @endif

                            {!! Form::label('photo', 'صورتك') !!}
                            {!! Form::file('photo') !!}
                            {!! Form::hidden('photo_w', 250) !!}
                            {!! Form::hidden('photo_h', 250) !!}

                            {!! Form::submit('حفظ البيانات') !!}

                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>
            </div>

        </section>
    </section>







@endsection
