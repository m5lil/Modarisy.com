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
                            <a href="#">العروض المقدمة</a>
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
                            <div class="col-md-12 col-sm-12 col-xs-12 mix category-3"
                                 style="margin: 10px;background-color: #fff;">
                                <div class="caarss ">
                                    <h3>
                                        <a href="{{url('profile/' . $value->user->id)}}"> {{$value->user->fullName()}}</a>
                                    </h3>
                                    <p>{{@$value->brief}}</p>
                                    <hr>
                                    <ul class="list-inline">
                                        <a href="{{ url('/messages/' . $enquiry_id . '/' . $value->id) }}"
                                           class="btn btn-primary btn1"> الرسائل <span class="badge"> {{ count(\App\Message::where('enquiry_id',$enquiry_id)->where('read')->where('applicant_id', $value->id)->get()) }}</span></a>
                                        @if(\App\Enquiry::find($enquiry_id)->statue != 2)
                                        <a href="{{ url('/applicant/accept/' . $enquiry_id . '/' . $value->id) }}"
                                           class="btn btn-default btn1"> قبول العرض </a>
                                        @endif
                                        <li><span style="border: solid #ddd 2px; padding: 2px 10px; ">{{@$value->hour_price}}</span> دولار / ساعة</li>
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
