@extends('frontend.master')

@section('content')
    @if($posts)
    <!--slider***************************************-->
    <section class="slider" style="height: 238px;">
        <div class="slid" style="height: 238px;">
            <div class="container">
                <div class="row">
                    <div class="li-list">
                        <a href="#" class="home ">الرئيسية</a>
                        <a href="#" class="conntact-my active">مقالات  {{ $category_name }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="with-us">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    @foreach($posts as $value)
                        <div class="col-md-12 col-sm-12 col-xs-12 mix category-3"
                             style="margin: 10px;background-color: #eee;">
                            <div class="caarss ">
                                <h3>
                                    <a href="{{url('post/' . $value->id)}}"> {{$value->title}}</a>
                                </h3>
                                <p>{{ str_limit(strip_tags($value->body), 150, '...') }}</p>
                                <hr>
                                <ul class="list-inline">
                                    <li>أنشأ منذ {{ \Date::parse($value->created_at)->diffForHumans() }}</li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
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
                            <a href="#" class="conntact-my active">لا يوجد مقالات فى هذا القسم</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endif



@endsection
