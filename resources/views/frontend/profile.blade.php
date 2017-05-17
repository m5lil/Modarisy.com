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
                                    @if($profile->user->type == 2) أ / @elseif($profile->user->type == 3) @lang('main.p_student')
                                    / @endif
                                    {{ $profile->user->fullName() }}</h2>
                                <p> @lang('main.p_city') <span class="detils-p-2">: {{ $profile->user->city }} </span></p>
                                <p> @lang('main.p_speci') <span class="detils-p-2">:{{$profile->specialty}}</span></p>
                            </div>
                        </div>
                    </div>
                    <p> @lang('main.share') :
                    <pre onClick="this.select();">http://modarisy.com/profile/{{Request::segment(3)}}</pre>
                    <ul class="share-buttons">
                      <li><a href="https://www.facebook.com/sharer/sharer.php?u=http://modarisy.com/profile/{{Request::segment(3)}}&t=" title="Share on Facebook" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;"><img alt="Share on Facebook" src="{{url('/')}}/images/flat_web_icon_set/black/Facebook.png"></a></li>
                      <li><a href="https://twitter.com/intent/tweet?source=http://modarisy.com/profile/{{Request::segment(3)}}&text=:%20http%3A%2F%2Fmodarisy.com" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + ':%20'  + encodeURIComponent(document.URL)); return false;"><img alt="Tweet" src="{{url('/')}}/images/flat_web_icon_set/black/Twitter.png"></a></li>
                      <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=http%3A%2F%2Fmodarisy.com&title=&summary=&source=http://modarisy.com/profile/{{Request::segment(3)}}" target="_blank" title="Share on LinkedIn" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(document.URL) + '&title=' +  encodeURIComponent(document.title)); return false;"><img alt="Share on LinkedIn" src="{{url('/')}}/images/flat_web_icon_set/black/LinkedIn.png"></a></li>
                      <li><a href="mailto:?subject=&body=:http://modarisy.com/profile/{{Request::segment(3)}}" target="_blank" title="Send email" onclick="window.open('mailto:?subject=' + encodeURIComponent(document.title) + '&body=' +  encodeURIComponent(document.URL)); return false;"><img alt="Send email" src="{{url('/')}}/images/flat_web_icon_set/black/Email.png"></a></li>
                    </ul>
                    </p>
                    <hr />
                    @if($profile->user->type == 2)
                        <p>@lang('main.p_rate') <span class="detils-p-2"><input type="hidden" class="rating" disabled="disabled" value="{{$profile->getRating()}}"/> {{$profile->getRating()}} ( {{  count($profile->reviews()->get())  }} تقييمات )</span></p>
                        <p>@lang('main.p_speci') <span class="detils-p-2">: {{ $profile->specialty }} $ / @lang('main.p_hour') </span></p>
                        <hr>
                        <p> @lang('main.p_hour_rate') <span class="detils-p-2">: {{ $profile->hour_rate }} $ / @lang('main.p_hour') </span></p>
                        <hr>
                        <p> @lang('main.p_teach_lang') <span class="detils-p-2">: {{ $profile->lang }} </span></p>
                        <hr>
                        <p> @lang('main.p_exp_years') <span class="detils-p-2">: {{ $profile->gen_exp }} </span></p>
                        <hr>
                        <p> @lang('main.p_sch_exp') <span class="detils-p-2">: {{ $profile->sch_exp }} </span></p>
                        <hr>
                        <p> @lang('main.p_prefer_time') <span
                                    class="detils-p-2">: {{ PreferedTime($profile->teach_time) }} </span></p>
                        <hr>
                        <hr>
                        <p> @lang('main.p_done') <span
                                    class="detils-p-2">: {{ count($profile->user->applicants->where('statue',3)) }} </span>
                        </p>
                        <hr>
                    @elseif($profile->user->type == 3)

                    @endif
                    <p> @lang('main.p_school') <span class="detils-p-2">: {{ $profile->school }} </span></p>
                    <hr>
                    <p> @lang('main.p_age')<span class="detils-p-2">: {{ $profile->age }} </span></p>
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
                            <h2>@lang('main.about_me')</h2>

                            <p>{{ $profile->intro }}</p>
                        </div>
                        @if($profile->user->type == 2)
                            <div class="Request" style="margin-top: 20px;">
                                <div class="advertising1-car-1">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-2 col-xs-12 ">
                                            <button class="bot-2 filter active" data-filter=".category-2">
                                                <i class="fa fa-wpforms" aria-hidden="true"></i>
                                                @lang('main.p_proccess')
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
                                                    <p>@lang('main.p_target') : <strong>{{$enquery->target}}</strong> |
                                                        @lang('main.p_preferd_time') :
                                                        <strong>{{$enquery->PreferedTime($enquery->preferred_time)}}</strong>
                                                    </p>
                                                    <hr>
                                                    <ul class="list-inline">
                                                        <li><a href="{{url('/profile'). '/' .$enquery->user->id}}">@lang('main.p_student') :
                                                                <span>{{$enquery->user->FullName()}}</span></a></li>
                                                        <li>@lang('main.p_total_houre') : <span>{{$enquery->total_hours}}@lang('main.p_hour')</span></li>
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
                                                        @lang('main.p_preferd_time') :
                                                        <strong>{{$enquery->PreferedTime($enquery->preferred_time)}}</strong>
                                                    </p>
                                                    <hr>
                                                    <ul class="list-inline">
                                                        <li><a href="{{url('/profile'). '/' .$enquery->user->id}}">@lang('main.p_student') :
                                                                <span>{{$enquery->user->FullName()}}</span></a></li>
                                                        <li>@lang('main.p_total_houre') : <span>{{$enquery->total_hours}} @lang('main.p_hour')</span></li>
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
                                                <i class="fa fa-bars" aria-hidden="true"></i> @lang('main.p_requests')
                                            </button>
                                        </div>
                                        <div class="col-md-4 col-sm-2 col-xs-12 ">
                                            <button class="bot-2 filter " data-filter=".category-2">
                                                <i class="fa fa-wpforms" aria-hidden="true"></i>
                                                @lang('main.p_proccess')
                                            </button>
                                        </div>
                                        <div class="col-md-4 col-sm-2 col-xs-12 ">
                                            <button class="bot-3 filter " data-filter=".category-3">
                                                <i class="fa fa-check-circle" aria-hidden="true"></i>@lang('main.p_donee')
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
                                                <p>الغرض من الطلب : <strong>{{$enquery->target}}</strong> |                                                @lang('main.p_preferd_time') :
                                                    <strong>{{$enquery->PreferedTime($enquery->preferred_time)}}</strong>
                                                </p>
                                                <hr>
                                                <ul class="list-inline">
                                                    <li>@lang('main.p_total_houre') : <span>{{$enquery->total_hours}} @lang('main.p_hour')</span></li>
                                                </ul>

                                            </div>
                                        </div>
                                    @endforeach
                                    @foreach($applicants as $applicant)
                                        <div class="col-md-12 col-sm-12 col-xs-12 mix category-2" data-bound="">
                                            <div class="caarss ">

                                                <h3><a href="#">{{$applicant->enquiry->subject}}</a></h3>
                                                <p>{{$applicant->brief}}</p>
                                                <p>@lang('main.p_mr') /  {{$applicant->user->FullName()}}</p>
                                                <hr>
                                                <ul class="list-inline">
                                                    <li>@lang('main.p_total_houre') : <span>{{$applicant->total_hours}} @lang('main.p_hour')</span></li>
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
                                                    <li>@lang('main.p_total_houre') : <span>{{$applicant->enquiry->total_hours}} @lang('main.p_hour')</span></li>
                                                    <li>@lang('main.p_hour_rate') : <span>${{$applicant->hour_price}} / @lang('main.p_hour')</span></li>
                                                    <li>@lang('main.p_total_price') : <span>{{$applicant->enquiry->total_hours * $applicant->hour_price }} @lang('main.dollar')</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                    </div>
                    <div class="panel panel-default" style="margin-top: 20px;">
                        <div class="panel-heading">@lang('main.p_rates')</div>

                        <div class="panel-body">
                            @foreach($profile->reviews()->get() as $value)
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
@endsection
