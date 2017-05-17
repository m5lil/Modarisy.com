@extends('frontend.master')

@section('content')

    <section class="modarsy-2">
        <section class="with-us text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2>
                            <a href="#">@lang('main.login_login')</a>
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
                            <form role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}
                                <label class="label" for="email">@lang('main.login_mail') : </label>

                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}" required autofocus placeholder="@lang('main.login_mail')">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                                <label class="label" for="password">@lang('main.login_pass') : </label>
                                <input id="password" type="password" class="form-control" name="password" required placeholder="@lang('main.login_pass')">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                                <button type="submit" class="">
                                    @lang('main.login_login')
                                </button>
                                <br>
                                <div class="pull-left">
                                <label>
                                    <input type="checkbox"
                                           name="remember" {{ old('remember') ? 'checked' : '' }}> @lang('main.login_remember')
                                </label>
                                </div>
                                <div class="pull-right">
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    @lang('main.login_forget')
                                </a>
                                <a href="{{url('/be_member')}}">@lang('main.login_newone')</a>
                                </div>
                            </form>
                            <div style="clear: both;"></div>

                            <div class="footer-social-icons">
                                <h4>@lang('main.or_login_with')</h4>
                                <ul class="social-icons">
                                    <li><a href="{{url('/auth/facebook')}}" class="social-icon"> <i class="fa fa-facebook"></i></a></li>
                                    <li><a href="{{url('/auth/linkedin')}}" class="social-icon"> <i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>

                            <br />
                        </div>
                        {{--<div class="text-center">--}}
                            {{--<a href="#" class="fa fa-facebook"></a>--}}
                            {{--<a href="#" class="fa fa-twitter"></a>--}}
                        {{--</div>--}}

                    </div>

                </div>
            </div>

        </section>

    </section>
@endsection
