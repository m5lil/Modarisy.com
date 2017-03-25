@extends('frontend.master')

@section('content')
    <!--slider***************************************-->
    <section class="slider" style="height: 238px;">
        <div class="slid" style="height: 238px;     padding: 40px 0px;">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-xs-12">
                        {{--<a class="send-mas" href="#">ارسال رساله</a>--}}
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--***************************************slider-->
    <secrion class="mod-arsy">
        <div class="container">
            <div class="row">
                <div class="col-md-4 dede">
                    <div class="first-mod-arsy">

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="slid-detils-img">
                                <img class="slid-detils" src="{{url('/uploads/' . @$profile->photo)}}" alt="thumbnail">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="slid-detils-wright">
                                <h2>
                                    @if($profile->user->type == 2) أ / @elseif($profile->user->type == 3) الطالب
                                    / @endif
                                    {{ $profile->user->fullName() }}</h2>
                                <p> المدينة <span class="detils-p-2">: {{ $profile->user->city }} </span></p>
                                <p> التخصص <span class="detils-p-2">:{{$profile->specialty}}</span></p>
                            </div>
                        </div>
                    </div>
                    @if($profile->user->type == 2)
                        <p>التخصص <span class="detils-p-2">: {{ $profile->specialty }} $ / ساعة </span></p>
                        <hr>
                        <p> سعر الساعة <span class="detils-p-2">: {{ $profile->hour_rate }} $ / ساعة </span></p>
                        <hr>
                        <p> لغة التدريس <span class="detils-p-2">: {{ $profile->lang }} </span></p>
                        <hr>
                        <p> سنوات الخبره <span class="detils-p-2">: {{ $profile->gen_exp }} </span></p>
                        <hr>
                        <p> سنوات العمل فى المدرسة <span class="detils-p-2">: {{ $profile->sch_exp }} </span></p>
                        <hr>
                        <p> وقت التدريس المناسب <span
                                    class="detils-p-2">: {{ PreferedTime($profile->teach_time) }} </span></p>
                        <hr>
                        <hr>
                        <p> الدروس التى أنهاها <span
                                    class="detils-p-2">: {{ count($profile->user->applicants->where('statue',3)) }} </span>
                        </p>
                        <hr>
                    @elseif($profile->user->type == 3)

                    @endif
                    <p> المدرسة <span class="detils-p-2">: {{ $profile->school }} </span></p>
                    <hr>
                    <p> السن <span class="detils-p-2">: {{ $profile->age }} </span></p>
                    <hr>
                    <hr>

                    {{--<h2 class="dede-h2">رسالة سريعة</h2>--}}
                    {{--<input type="text" placeholder="الاسم">--}}
                    {{--<textarea>--}}

                    {{--</textarea>--}}
                    {{--<input type="number">--}}
                    {{--<label>--}}
                    {{--<input type="checkbox"> تحديدالعنصر--}}
                    {{--</label>--}}
                    {{--<button>ارسال</button>--}}
                </div>
                <div class="col-md-8">
                    <div class="last-mod-arsy">
                        <div class="about-teatcher">
                            <h2>تعرف على</h2>

                            <p>{{ $profile->intro }}</p>
                        </div>
                        @if($profile->user->type == 2)
                            <div class="Request" style="margin-top: 20px;">
                                <div class="advertising1-car-1">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-2 col-xs-12 ">
                                            <button class="bot-2 filter " data-filter=".category-2">
                                                <i class="fa fa-wpforms" aria-hidden="true"></i>
                                                جاري العمل علية
                                            </button>
                                        </div>
                                        <div class="col-md-4 col-sm-2 col-xs-12 ">
                                            <button class="bot-3 filter " data-filter=".category-3">
                                                <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                تم تنفيذها
                                            </button>
                                        </div>

                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="advertising2-car-2">
                                <div class="row" id="Container">
                                    @if(isset($progress_enquiries))
                                        @foreach($progress_enquiries as $enquery)
                                            <div class="col-md-12 col-sm-12 col-xs-12 mix category-2" data-bound="">
                                                <div class="caarss ">

                                                    <h3><a href="#">{{$enquery->subject}}</a></h3>
                                                    <p>{{$enquery->comment}}</p>
                                                    <p>الغرض من الطلب : <strong>{{$enquery->target}}</strong> |
                                                        الوقت المفضل :
                                                        <strong>{{$enquery->PreferedTime($enquery->preferred_time)}}</strong>
                                                    </p>
                                                    <hr>
                                                    <ul class="list-inline">
                                                        <a href="{{ url('/messages/' . $enquery->id . '/' . $enquery->applicant_id) }}"
                                                           class="btn btn-primary btn"> الرسائل </a>
                                                        <li><a href="{{url('/profile'). '/' .$enquery->user->id}}">الطالب :
                                                                <span>{{$enquery->user->FullName()}}</span></a></li>
                                                        <li>عدد الساعات : <span>{{$enquery->total_hours}} ساعة</span></li>
                                                    </ul>

                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    @if(isset($done_enquiries))
                                        @foreach($done_enquiries as $enquery)
                                            <div class="col-md-12 col-sm-12 col-xs-12 mix category-3" data-bound="">
                                                <div class="caarss ">

                                                    <h3><a href="#">{{$enquery->subject}}</a></h3>
                                                    <p>{{$enquery->comment}}</p>
                                                    <p>الغرض من الطلب : <strong>{{$enquery->target}}</strong> |
                                                        الوقت المفضل :
                                                        <strong>{{$enquery->PreferedTime($enquery->preferred_time)}}</strong>
                                                    </p>
                                                    <hr>
                                                    <ul class="list-inline">
                                                        <li><a href="{{url('/profile'). '/' .$enquery->user->id}}">الطالب :
                                                                <span>{{$enquery->user->FullName()}}</span></a></li>
                                                        <li>عدد الساعات : <span>{{$enquery->total_hours}} ساعة</span></li>
                                                    </ul>

                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @elseif($profile->user->type == 3)
                            <div class="Request" style="margin-top: 20px;">
                                <div class="advertising1-car-1">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-2 col-xs-12 ">
                                            <button class="bot-1 filter active" data-filter=".category-1">
                                                <i class="fa fa-bars" aria-hidden="true"></i> طلبات الدروس
                                            </button>
                                        </div>
                                        <div class="col-md-4 col-sm-2 col-xs-12 ">
                                            <button class="bot-2 filter " data-filter=".category-2">
                                                <i class="fa fa-wpforms" aria-hidden="true"></i>
                                                جاري العمل علية
                                            </button>
                                        </div>
                                        <div class="col-md-4 col-sm-2 col-xs-12 ">
                                            <button class="bot-3 filter " data-filter=".category-3">
                                                <i class="fa fa-check-circle" aria-hidden="true"></i> تم
                                            </button>
                                        </div>

                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="advertising2-car-2">
                                <div class="row" id="Container">
                                    @foreach($enquiries as $enquery)
                                        <div class="col-md-12 col-sm-12 col-xs-12 mix category-1" data-bound="">
                                            <div class="caarss ">

                                                <h3><a href="#">{{$enquery->subject}}</a></h3>
                                                <p>{{$enquery->comment}}</p>
                                                <p>الغرض من الطلب : <strong>{{$enquery->target}}</strong> |                                                الوقت المفضل :
                                                    <strong>{{$enquery->PreferedTime($enquery->preferred_time)}}</strong>
                                                </p>
                                                <hr>
                                                <ul class="list-inline">
                                                    <a href="{{ url('/request/' . $enquery->id) . '/delete' }}"
                                                       class="btn btn-danger btn1"> <i class="fa fa-trash-o"></i> </a>

                                                    <a href="{{ url('/applicants/' . $enquery->id) }}"
                                                       class="btn btn-primary btn1"> <i class="fa fa-wpforms"></i> العروض المقدمة <span class="badge"> {{ count(\App\Applicant::where('enquiry_id',$enquery->id)->where('statue', 1)->get()) }}</span></a>

                                                    <li>عدد الساعات : <span>{{$enquery->total_hours}} ساعة</span></li>
                                                </ul>

                                            </div>
                                        </div>
                                    @endforeach
                                    @foreach($applicants as $applicant)
                                        <div class="col-md-12 col-sm-12 col-xs-12 mix category-2" data-bound="">
                                            <div class="caarss ">

                                                <h3><a href="#">{{$applicant->enquiry->subject}}</a></h3>
                                                <p>{{$applicant->brief}}</p>
                                                <p>الأستاذ /  {{$applicant->user->FullName()}}</p>
                                                <hr>
                                                <ul class="list-inline">
                                                    <a href="{{ url('/applicant/finish/' . $applicant->enquiry_id . '/' . $applicant->id) }}"
                                                       class="btn btn-default btn1"> إنتهى الدرس </a>
                                                    <a href="{{ url('/messages/' . $applicant->enquiry_id . '/' . $applicant->id) }}"
                                                       class="btn btn-primary btn1"> الرسائل <span class="badge"> {{ count(\App\Message::where('enquiry_id',$applicant->enquiry_id)->where('read',0)->where('applicant_id', $applicant->id)->get()) }}</span></a>

                                                    <li>عدد الساعات : <span>{{$applicant->total_hours}} ساعة</span></li>
                                                </ul>

                                            </div>
                                        </div>
                                    @endforeach
                                    @foreach($done_applicants as $applicant)
                                        <div class="col-md-12 col-sm-12 col-xs-12 mix category-3" data-bound="">
                                            <div class="caarss ">

                                                <h3><a href="#">{{$applicant->enquiry->subject}}</a></h3>
                                                <p>{{$applicant->brief}}</p>
                                                <p>الأستاذ /  {{$applicant->user->FullName()}}</p>
                                                <hr>
                                                <ul class="list-inline">
                                                    <li>عدد الساعات : <span>{{$applicant->enquiry->total_hours}} ساعة</span></li>
                                                    <li>سعر الساعة : <span>${{$applicant->hour_price}} / ساعة</span></li>
                                                    <li>إجمالى السعر : <span>{{$applicant->enquiry->total_hours * $applicant->hour_price }} دولار</span></li>
                                                </ul>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </secrion>
    <!--owl-slider**********************************-->
    <section class="owl-slider">
        <div class="owl-slid">
            <div class="owl-slid-hite text-center">
                <p>كيف تعمل</p>
                <img src="images/after.png">
            </div>
            <div class="container">
                <div class="owl-carousel">
                    <div class="item  wow fadeInUp" data-wow-duration="2s">
                        <div class="Clients">
                            <span class="Client-img">
                                <img src="images/clint.png">
                            </span>
                            <span class="Client-driv">
                                <span class="name">أحمد الالفى</span>
                                <span class="work">مدرس</span>
                            </span>
                        </div>
                        <div class="clint-right">
                            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على
                                الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة
                                لوريم إيبسوم أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم
                                إيبسوم ....</p>
                            <i class="fa fa-comments" aria-hidden="true"></i>
                        </div>
                    </div>

                    <div class="item  wow fadeInUp" data-wow-duration="2s">
                        <div class="Clients">
                            <span class="Client-img">
                                <img src="images/clint.png">
                            </span>
                            <span class="Client-driv">
                                <span class="name">أحمد الالفى</span>
                                <span class="work">مدرس</span>
                            </span>
                        </div>
                        <div class="clint-right">
                            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على
                                الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة
                                لوريم إيبسوم أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم
                                إيبسوم ....</p>
                            <i class="fa fa-comments" aria-hidden="true"></i>
                        </div>
                    </div>

                    <div class="item wow bounceIn" data-wow-duration="2s">
                        <div class="Clients">
                            <span class="Client-img">
                                <img src="images/clint.png">
                            </span>
                            <span class="Client-driv">
                                <span class="name">أحمد الالفى</span>
                                <span class="work">مدرس</span>
                            </span>
                        </div>
                        <div class="clint-right">
                            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على
                                الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة
                                لوريم إيبسوم أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم
                                إيبسوم ....</p>
                            <i class="fa fa-comments" aria-hidden="true"></i>
                        </div>
                    </div>

                    <div class="item wow bounceIn" data-wow-duration="2s">
                        <div class="Clients">
                            <span class="Client-img">
                                <img src="images/clint.png">
                            </span>
                            <span class="Client-driv">
                                <span class="name">أحمد الالفى</span>
                                <span class="work">مدرس</span>
                            </span>
                        </div>
                        <div class="clint-right">
                            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على
                                الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة
                                لوريم إيبسوم أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم
                                إيبسوم ....</p>
                            <i class="fa fa-comments" aria-hidden="true"></i>
                        </div>
                    </div>

                    <div class="item wow bounceIn" data-wow-duration="2s">
                        <div class="Clients">
                            <span class="Client-img">
                                <img src="images/clint.png">
                            </span>
                            <span class="Client-driv">
                                <span class="name">أحمد الالفى</span>
                                <span class="work">مدرس</span>
                            </span>
                        </div>
                        <div class="clint-right">
                            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على
                                الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة
                                لوريم إيبسوم أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم
                                إيبسوم ....</p>
                            <i class="fa fa-comments" aria-hidden="true"></i>
                        </div>
                    </div>

                    <div class="item wow bounceIn" data-wow-duration="2s">
                        <div class="Clients">
                            <span class="Client-img">
                                <img src="images/clint.png">
                            </span>
                            <span class="Client-driv">
                                <span class="name">أحمد الالفى</span>
                                <span class="work">مدرس</span>
                            </span>
                        </div>
                        <div class="clint-right">
                            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على
                                الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة
                                لوريم إيبسوم أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم
                                إيبسوم ....</p>
                            <i class="fa fa-comments" aria-hidden="true"></i>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!--**********************************owl-slider-->
@endsection
