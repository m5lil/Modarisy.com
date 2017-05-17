@extends('frontend.master')

@section('content')
    @if($page)
    <!--slider***************************************-->
    <section class="slider" style="height: 238px;">
        <div class="slid" style="height: 238px;">
            <div class="container">
                <div class="row">
                    <div class="li-list">

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
                    @if($page->photo)
                    <img class="img-responsive" src="{{url('/uploads/') . '/' .$page->photo }}" alt="">
                    @endif
                    {!! $page->body !!}
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

                            <a href="#" class="conntact-my active">صفحة غير موجوده</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endif



@endsection
