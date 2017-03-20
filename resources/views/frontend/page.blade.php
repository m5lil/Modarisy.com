@extends('frontend.master')

@section('content')

    <!--slider***************************************-->
    <section class="slider" style="height: 238px;">
        <div class="slid" style="height: 238px;">
            <div class="container">
                <div class="row">
                    <div class="li-list">
                        <a href="#" class="home ">الرئيسية</a>
                        <a href="#" class="conntact-my active"> {{ $page->title }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="with-us">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2>
                        <a href="#">{{ $page->title }}</a>
                    </h2>
                    <br>
                    <img class="img-responsive" src="{{url('/uploads/') . '/' .$page->photo }}" alt="">
                    {!! $page->body !!}
                </div>
            </div>
        </div>
    </section>




@endsection
