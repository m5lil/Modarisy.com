@extends('frontend.master')

@section('content')

    <section class="modarsy-2">
        <section class="with-us text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2>
                            <a href="#">تسجيل دخول</a>
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
                            <form role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}
                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                                <button type="submit" class="">
                                    تسجيل دخول
                                </button>
                                <br>
                                <label>
                                    <input type="checkbox"
                                           name="remember" {{ old('remember') ? 'checked' : '' }}> تذكرنى
                                </label>
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    نسيت كلمة المرور?
                                </a>
                            </form>
                            <div style="clear: both;"></div>
                            <div class="text-center">
                                <button onclick="location.href='{{url('/register')}}'" class="">
                                    إنشاء حساب جديد
                                </button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </section>

    </section>
@endsection
