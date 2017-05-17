@extends('frontend.master')

@section('content')

    <section class="modarsy-2">
        <section class="slider" style="height: 238px;">
            <div class="slid"  style="height: 238px;">
                <div class="container">
                    <div class="row">
                        <div class="li-list">

                            <a href="#" class="conntact-my active">@lang('main.register')</a>
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
                            <a href="#">@lang('main.register')</a>
                        </h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="modarsyy-1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-12">

                        <div class="forme">
                            <a style="margin-bottom:12px" href="{{ url('/register?t=3') }}"> @lang('main.stu_reg')</a>
                        </div>

                    </div>
                    <div class="col-sm-6 col-xs-12">

                        <div class="forme">
                            <a style="margin-bottom:12px" href="{{ url('/register?t=2') }}">@lang('main.teach_reg')</a>
                        </div>

                    </div>

                    <hr>

                </div>
                <div class="row">
                    <div class="col-sm-6 col-xs-12 col-sm-offset-3">
                        <div class="footer-social-icons">
                            <h4>@lang('main.or_login_with')</h4>
                            <ul class="social-icons">
                                <li><a href="{{url('/auth/facebook')}}" class="social-icon"> <i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{url('/auth/linkedin')}}" class="social-icon"> <i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>

        </section>


    </section>




@endsection
