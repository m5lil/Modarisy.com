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

                        @foreach($profiles as $profile)
                        <div class="col-md-12 col-sm-12 col-xs-12 mix category-3" style="margin: 10px;background-color: #fff;">
                            <div class="caarss ">
                                <h3><a href="{{url('profile/' . $profile->id)}}"> {{@$profile->user->fullName()}}</a></h3>
                                <p>{{@$profile->intro}}</p>
                                <hr>
                                <ul class="list-inline">
                                    <li>{{@$profile->hour_rate}}$ / ساعة</li>
                                    <li>سنوات الخبرة : <strong>{{@$profile->gen_exp}}</strong></li>
                                    <li>التخصص : <strong>{{@$profile->specialty}}</strong></li>
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
