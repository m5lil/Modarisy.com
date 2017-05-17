@extends('frontend.master')

@section('content')
    <!--slider***************************************-->
    <section class="modarsy-2">
        <section class="slider" style="height: 238px;">
            <div class="slid" style="height: 238px;">
                <div class="container">
                    <div class="row">
                        <div class="li-list">

                            <a href="#" class="conntact-my active">@lang('main.register_form')</a>
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
                            <a href="#">@lang('main.singup_now') - @lang('main.type'. \Request::get('t') )</a>
                        </h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="modarsyy-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xs-12 col-md-offset-3">
                        <div class="form">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}
                            <input type="text" name="type" value="{{ \Request::get('t') }}" hidden>
                            <label class="label" for="first_name">@lang('main.firstname')</label>
                                    <input id="first_name" type="text" class="form-control" name="first_name"
                                           value="{{ old('first_name') }}" required autofocus>

                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                            <label class="label" for="last_name">@lang('main.lastname')</label>
                            <input id="last_name" type="text" class="form-control" name="last_name"
                                           value="{{ old('last_name') }}" required autofocus>

                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                            <label class="label" for="email">@lang('main.email')</label>
                            <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                            <label class="label" for="password">@lang('main.password')</label>
                            <input id="password" type="password" class="form-control" name="password"   required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                            <label class="label" for="password-confirm">@lang('main.repeatpass')</label>
                            <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                            <label class="label" for="city">@lang('main.city')</label>
                            <select id="city" class="form-control" name="city" required>
                                        <option value="Riyadh - الرياض">Riyadh - الرياض</option>
                                        <option value="Dammam - الدمام">Dammam - الدمام</option>
                                        <option value="Safwa - صفوة">Safwa - صفوة</option>
                                        <option value="Al Qatif - القطيف">Al Qatif - القطيف</option>
                                        <option value="Dhahran - الظهران">Dhahran - الظهران</option>
                                        <option value="Al Faruq - الفاروق">Al Faruq - الفاروق</option>
                                        <option value="Khobar - الخبر">Khobar - الخبر</option>
                                        <option value="Jubail - الجبيل">Jubail - الجبيل</option>
                                        <option value="Sayhat - السايحات">Sayhat - السايحات</option>
                                        <option value="Jeddah - جدة">Jeddah - جدة</option>
                                        <option value="Ta'if - الطايف">Ta'if - الطايف</option>
                                        <option value="Mecca - مكة">Mecca - مكة</option>
                                        <option value="Al Hufuf -الهفوف">Al Hufuf -الهفوف</option>
                                        <option value="Medina - المدية">Medina - المدية</option>
                                        <option value="Rahimah - رحيمة">Rahimah - رحيمة</option>
                                        <option value="Rabigh - غبر">Rabigh - غبر</option>
                                        <option value="Yanbu` al Bahr - ينبوع البحر">Yanbu` al Bahr - ينبوع البحر</option>
                                        <option value="Abqaiq - البقيع">Abqaiq - البقيع</option>
                                        <option value="Mina - منا">Mina - منا</option>
                                        <option value="Ramdah - الرمضة">Ramdah - الرمضة</option>
                                        <option value="Linah - لينه">Linah - لينه</option>
                                        <option value="Abha أبها">Abha أبها</option>
                                        <option value="Jizan - جيزان">Jizan - جيزان</option>
                                        <option value="Al Yamamah - اليمامة">Al Yamamah - اليمامة</option>
                                        <option value="Tabuk - تبوك">Tabuk - تبوك</option>
                                        <option value="Sambah - سمبة">Sambah - سمبة</option>
                                        <option value="Ras Tanura - راس تنورة">Ras Tanura - راس تنورة</option>
                                        <option value="At Tuwal - الطوال">At Tuwal - الطوال</option>
                                        <option value="Sabya- صبياء">Sabya- صبياء</option>
                                        <option value="Buraidah - بريدة">Buraidah - بريدة</option>
                                        <option value="Madinat Yanbu` as Sina`iyah - ينبع الصناعية">Madinat Yanbu` as Sina`iyah - ينبع الصناعية</option>
                                        <option value="Hayil - حائل">Hayil - حائل</option>
                                        <option value="Khulays - خليص">Khulays - خليص</option>
                                        <option value="Khamis Mushait - خميس مشيط‎‎">Khamis Mushait - خميس مشيط‎‎</option>
                                        <option value="Ra's al Khafji - الخفجي">Ra's al Khafji - الخفجي</option>
                                        <option value="Najran - نجران ">Najran - نجران </option>
                                        <option value="Sakaka - سكاكا">Sakaka - سكاكا</option>
                                        <option value="Al Bahah - الباحة‎‎">Al Bahah - الباحة‎‎</option>
                                        <option value="Jazirah - الجزيرة">Jazirah - الجزيرة</option>
                                    </select>
                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @endif
                            <label class="label" for="address">@lang('main.adress')</label>

                            <input id="address" type="text" class="form-control" name="address"
                                           value="{{ old('address') }}" required>

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                            <label class="label" for="phone">@lang('main.phone')</label>

                            <input style="direction: ltr;" id="phone" type="text" class="input-medium bfh-phone form-control"  data-format="05d ddd ddd-dddd" name="phone"
                                           value="{{ old('phone') }}" required>

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                            <label  for="term">
                                <input name="term" id="term" type="checkbox" value="1">
                                @lang('main.term')  <a href="{{ url('/terms') }}" target=" _blank">@lang('main.term_link') </a>
                            </label>

                                    @if ($errors->has('term'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('term') }}</strong>
                                    </span>
                                    @endif

                                    <button type="submit" class="btn btn-primary">
                                        @lang('main.register')
                                    </button>
                        </form>
                        </div>
                    </div>

                </div>
            </div>

        </section>
    </section>







@endsection
