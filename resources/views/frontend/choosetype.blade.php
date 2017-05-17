@extends('frontend.master')

@section('content')
@if(\Auth::user()->type == 0)

    <section class="modarsy-2">
        <section class="slider" style="height: 238px;">
            <div class="slid"  style="height: 238px;">
                <div class="container">
                    <div class="row">
                        <div class="li-list">

                            <a href="#" class="conntact-my active">@lang('main.choose_type')</a>
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
                            <a href="#">@lang('main.choose_type')</a>
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
                            <a style="margin-bottom:12px" href="{{ url('/choosetype/3') }}"> @lang('main.student')</a>
                        </div>

                    </div>
                    <div class="col-sm-6 col-xs-12">

                        <div class="forme">
                            <a style="margin-bottom:12px" href="{{ url('/choosetype/2') }}">@lang('main.teacher')</a>
                        </div>

                    </div>

                    <hr>

                </div>
            </div>

        </section>


    </section>
@else

    <script type="text/javascript">
        window.location = "{{ url('/profile/create') }}";//here double curly bracket
    </script>

@endif
@endsection
