@extends('frontend.master')

@section('content')
    <!--slider***************************************-->
    <section class="slider" style="height: 238px;">
        <div class="slid" style="height: 238px;     padding: 40px 0px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
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
                                <img class="slid-detils" src="{{url('/uploads/' . Auth::user()->profile->photo)}}"
                                     alt="thumbnail">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="slid-detils-wright">
                                <h2> أ / {{ Auth::user()->fullName() }}</h2>
                                <p> المدينة <span class="detils-p-2">: {{ Auth::user()->city }} </span></p>
                            </div>
                        </div>

                    </div>
                    <p>التقييم <span class="detils-p-2"><input type="hidden" class="rating" disabled="disabled"
                                                               value="{{Auth::user()->profile->getRating()}}"/> {{Auth::user()->profile->getRating()}}
                            ( {{  count(Auth::user()->profile->reviews()->get())  }} تقييمات )</span></p>

                    {{ Form::model(Auth::user()->profile, array('route' => array('profile.update', Auth::user()->profile->id), 'method' => 'PUT','class' => 'form-horizontal','files' => true)) }}
                    <div class="form-group">
                        {{Form::label('gen_exp', 'سنوات الخبره', ['class' => 'col-sm-4 control-label'])}}
                        <div class="col-sm-8">
                            {{Form::text('gen_exp',null,['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        {{Form::label('teach_hours', 'وقت التعليم المناسب', ['class' => 'col-sm-4 control-label'])}}
                        <div class="col-sm-8">
                            <select name="teach_time" class="form-control">
                                <option selected disabled>{{PreferedTime(Auth::user()->profile->teach_hours)}}</option>
                                <option value="1">صباحا من 8ص وحتى 12م</option>
                                <option value="2">منتصف اليوم من 12م وحتى 6م</option>
                                <option value="3">مساءا من 6م وحتى 10م</option>
                                <option value="4">فى أى وقت فى اليوم</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        {{Form::label('teach_time', 'عدد ساعات التدريس فى اليوم', ['class' => 'col-sm-4 control-label'])}}
                        <div class="col-sm-8">
                            {{Form::text('teach_hours',null,['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        {{Form::label('hour_rate', 'سعر الساعة', ['class' => 'col-sm-4 control-label'])}}
                        <div class="col-sm-8">
                            {{Form::text('hour_rate',null,['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        {{Form::label('intro', 'عن نفسك', ['class' => 'col-sm-4 control-label'])}}
                        <div class="col-sm-8">
                            {{Form::textarea('intro',null,['class' => 'form-control', 'style' => 'margin:0;'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        {{Form::label('gender', 'النوع', ['class' => 'col-sm-4 control-label'])}}
                        <div class="col-sm-8">
                            {{Form::select('gender',[1=>'ذكر',2 =>'أنثى'],null,['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        {{Form::label('school', 'المدرسة', ['class' => 'col-sm-4 control-label'])}}
                        <div class="col-sm-8">
                            {{Form::text('school',null,['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        {{Form::label('dbirth', 'تاريخ الميلاد', ['class' => 'col-sm-4 control-label'])}}
                        <div class="col-sm-8">
                            {{Form::date('dbirth',null,['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        {{Form::label('age', 'السن', ['class' => 'col-sm-4 control-label'])}}
                        <div class="col-sm-8">
                            {{Form::text('age',null,['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        {{Form::label('photo', 'الصورة', ['class' => 'col-sm-4 control-label'])}}
                        <div class="col-sm-8">
                            {!! Form::file('photo') !!}
                            {!! Form::hidden('photo_w', 250) !!}
                            {!! Form::hidden('photo_h', 250) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {{Form::label('specialty', 'التخصص', ['class' => 'col-sm-4 control-label'])}}
                        <div class="col-sm-8">
                            {{Form::select('specialty',\App\Materials::pluck('title','slug'),null,['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        {{Form::label('lang', 'اللغة', ['class' => 'col-sm-4 control-label'])}}
                        <div class="col-sm-8">
                            {{Form::select('lang',['arabic'=>'عربى','english' =>'English'],null,['class' => 'form-control'])}}
                        </div>
                    </div>
                    {!! Form::submit('تعديل البيانات') !!}

                    {!! Form::close() !!}
                </div>
                <div class="col-md-8">
                    <div class="last-mod-arsy">
                        <div class="Request" style="margin-top: 20px;">
                            <div class="advertising1-car-1">
                                <div class="row">
                                    <div class="col-md-4 col-sm-2 col-xs-12 ">
                                        <button class="bot-1 filter active" data-filter=".category-1">
                                            <i class="fa fa-bars" aria-hidden="true"></i>
                                            طلبات جديدة
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
                                @foreach($enquiries as $enquery)
                                    <div class="col-md-12 col-sm-12 col-xs-12 mix category-1" data-bound="">
                                        <div class="caarss ">

                                            <h3><a href="#">{{$enquery->subject}}</a></h3>
                                            <p>{{$enquery->comment}}</p>
                                            <p>الغرض من الطلب : <strong>{{$enquery->target}}</strong> |الوقت المفضل :
                                                <strong>{{$enquery->PreferedTime($enquery->preferred_time)}}</strong>
                                            </p>
                                            <hr>
                                            <ul class="list-inline">
                                                @if (!Auth::user()->applicants->where('enquiry_id', $enquery->id)->first() )
                                                    <a href="{{ url('/applicant/create/' . $enquery->id) }}"
                                                       class="btn btn-primary btn1"> تقدم بعرضك </a>
                                                @else
                                                    <a href="{{ url('/messages/' . $enquery->id . '/' . Auth::user()->applicants->where('enquiry_id', $enquery->id)->first()->id) }}"
                                                       class="btn btn-primary btn1"> الرسائل  الرسائل <span class="badge"> {{ count(\App\Message::where('enquiry_id',$enquery->id)->where('read')->where('applicant_id', Auth::user()->applicants->where('enquiry_id', $enquery->id)->first()->id))->get()) }}</span></a>
                                                @endif
                                                <li><a href="{{url('/profile'). '/' .$enquery->user->id}}">الطالب :
                                                        <span>{{$enquery->user->FullName()}}</span></a></li>
                                                <li>عدد الساعات : <span>{{$enquery->total_hours}} ساعة</span></li>
                                            </ul>

                                        </div>
                                    </div>
                                @endforeach
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


                    </div>

                    <div class="panel panel-default" style="margin-top: 20px;">
                        <div class="panel-heading">التقييمات</div>

                        <div class="panel-body">
                            @foreach(Auth::user()->profile->reviews()->get() as $value)
                                <div class="col-md-12 col-sm-12 col-xs-12 mix category-3"
                                     style="margin: 10px;background-color: #fff;">
                                    <div class="caarss ">
                                        <h4>
                                            {{$value->title}} - <small>{{$value->author->FullName()}}</small>
                                        </h4>
                                        <p>{{@$value->body}}</p>
                                        <p><input type="hidden" readonly="readonly" class="rating" value="{{$value->rating}}">
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
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
