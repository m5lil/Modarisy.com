@extends('frontend.master')

@section('content')
    @if($post)
    <!--slider***************************************-->
    <section class="slider" style="height: 238px;">
        <div class="slid" style="height: 238px;">
            <div class="container">
                <div class="row">
                    <div class="li-list">
                        <a href="#" class="home ">الرئيسية</a>
                        <a href="#" class="conntact-my active"> {{ $post->title }}</a>
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
                        <a href="#">{{ $post->title }}</a>
                    </h2>
                    <br>
                    <img class="img-responsive" src="{{url('/uploads/') . '/' .$post->photo }}" alt="">
                    {!! $post->body !!}
                </div>
            </div>
        </div>
    </section>
    @else
        <section class="slider" style="height: 238px;">
            <div class="slid" style="height: 238px;">
                <div class="container">
                    <div class="row">
                        <div class="li-list">
                            <a href="#" class="home ">الرئيسية</a>
                            <a href="#" class="conntact-my active">صفحة غير موجوده</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endif



@endsection
