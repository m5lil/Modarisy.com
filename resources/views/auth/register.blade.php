@extends('frontend.master')

@section('content')
    <!--slider***************************************-->
    <section class="modarsy-2">
        <section class="slider" style="height: 238px;">
            <div class="slid" style="height: 238px;">
                <div class="container">
                    <div class="row">
                        <div class="li-list">
                            <a href="#" class="home ">الرئيسية</a>
                            <a href="#" class="conntact-my active">نموذج التسجيل</a>
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
                            <a href="#">سجل معنا الان</a>
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
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}
                            <input type="text" name="type" value="{{ \Request::get('t') }}" hidden>

                                    <input id="first_name" type="text" class="form-control" name="first_name"  placeholder="الإسم الأول"
                                           value="{{ old('first_name') }}" required autofocus>

                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                    <input id="last_name" type="text" class="form-control" name="last_name"  placeholder="الإسم الأخير"
                                           value="{{ old('last_name') }}" required autofocus>

                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                    <input id="email" type="email" class="form-control" name="email"  placeholder="البريد الإلكترونى"
                                           value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                    <input id="password" type="password" class="form-control" name="password"  placeholder="كلمة المرور" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                    <input id="password-confirm" type="password" class="form-control"  placeholder="تأكيد كلمة المرور"
                                           name="password_confirmation" required>
                                    <select id="city" class="form-control" name="city" required>
                                        <option value="" disabled selected>المدينة</option>
                                        <option value="Riyadh">Riyadh</option>
                                        <option value="Dammam">Dammam</option>
                                        <option value="Safwa">Safwa</option>
                                        <option value="Al Qatif">Al Qatif</option>
                                        <option value="Dhahran">Dhahran</option>
                                        <option value="Al Faruq">Al Faruq</option>
                                        <option value="Khobar">Khobar</option>
                                        <option value="Jubail">Jubail</option>
                                        <option value="Sayhat">Sayhat</option>
                                        <option value="Jeddah">Jeddah</option>
                                        <option value="Ta'if">Ta'if</option>
                                        <option value="Mecca">Mecca</option>
                                        <option value="Al Hufuf">Al Hufuf</option>
                                        <option value="Medina">Medina</option>
                                        <option value="Rahimah">Rahimah</option>
                                        <option value="Rabigh">Rabigh</option>
                                        <option value="Yanbu` al Bahr">Yanbu` al Bahr</option>
                                        <option value="Abqaiq">Abqaiq</option>
                                        <option value="Mina">Mina</option>
                                        <option value="Ramdah">Ramdah</option>
                                        <option value="Linah">Linah</option>
                                        <option value="Abha">Abha</option>
                                        <option value="Jizan">Jizan</option>
                                        <option value="Al Yamamah">Al Yamamah</option>
                                        <option value="Tabuk">Tabuk</option>
                                        <option value="Sambah">Sambah</option>
                                        <option value="Ras Tanura">Ras Tanura</option>
                                        <option value="At Tuwal">At Tuwal</option>
                                        <option value="Sabya">Sabya</option>
                                        <option value="Buraidah">Buraidah</option>
                                        <option value="Madinat Yanbu` as Sina`iyah">Madinat Yanbu` as Sina`iyah</option>
                                        <option value="Hayil">Hayil</option>
                                        <option value="Khulays">Khulays</option>
                                        <option value="Khamis Mushait">Khamis Mushait</option>
                                        <option value="Ra's al Khafji">Ra's al Khafji</option>
                                        <option value="Najran">Najran</option>
                                        <option value="Sakaka">Sakaka</option>
                                        <option value="Al Bahah">Al Bahah</option>
                                        <option value="Rahman">Rahman</option>
                                        <option value="Jazirah">Jazirah</option>
                                    </select>
                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @endif
                                    <input id="address" type="address" class="form-control" name="address"  placeholder="العنوان"
                                           value="{{ old('address') }}" required>

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                    <input id="phone" type="phone" class="form-control" name="phone"  placeholder="رقم الجوال"
                                           value="{{ old('phone') }}" required>

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                            <label for="term">
                                <input name="term" id="term" type="checkbox" value="1">
                                <a href="{{ url('/terms') }}">أوافق على الشروط والأحكام</a>
                            </label>

                                    @if ($errors->has('term'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('term') }}</strong>
                                    </span>
                                    @endif

                                    <button type="submit" class="btn btn-primary">
                                        تسجيل
                                    </button>
                        </form>
                        </div>
                    </div>

                </div>
            </div>

        </section>
    </section>







@endsection
