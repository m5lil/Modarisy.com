@extends('frontend.master')

@section('content')
    <!--slider***************************************-->
    <section class="modarsy-2">
        <section class="slider" style="height: 238px;">
            <div class="slid" style="height: 238px;">
                <div class="container">
                    <div class="row">
                        <div class="li-list">
                            <a href="#" class="home ">الرئيسية > </a>
                            <a href="#" class="conntact-my active">المدرسين المسجلين بالموقع </a>
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
                            <a href="#">قائمة بملفات الأعضاء المدرسين</a>
                        </h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="modarsyy-1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">

                        @foreach($applicants as $value)
                        <div class="col-md-12 col-sm-12 col-xs-12 mix category-3" style="margin: 10px;background-color: #fff;">
                            <div class="caarss ">
                                <h3><a href="{{url('profile/' . $value->user->id)}}"> {{@$value->user->fullName()}}</a></h3>
                                <p>{{@$value->brief}}</p>
                                <hr>
                                <ul class="list-inline">
                                    <a href="{{ url('/messages/' . $lecture_id . '/' . $value->id) }}" class="btn btn-primary"> الرسائل </a>
                                    <li>{{@$value->hour_price}}$ / ساعة</li>
                                </ul>
                            </div>
                        </div>
                    @endforeach

                    </div>

                </div>
            </div>

        </section>
    </section>







@endsection
