@extends('frontend.master')

@section('content')
    <!--slider***************************************-->
    <section class="slider" style="height: 238px;">
        <div class="slid" style="height: 238px;     padding: 40px 0px;">
            <div class="container">
                <div class="row">
                    @if(Auth::user()->type == 3)
                        <div class="col-md-12 col-xs-12">
                            <a class="send-mas"
                               @if(LaravelLocalization::getCurrentLocale() == 'en')
                               style="float:right;"
                               @endif
                               href="{{url('/request/create')}}">@lang('main.ask_request')</a>
                        </div>
                    @endif
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

                                @if(Auth::user()->profile->photo)
                                    <img class="slid-detils" src="{{url('/uploads/' . Auth::user()->profile->photo)}}"
                                         alt="thumbnail">
                                    <div class="file-upload" style="bottom: 90px; left: -10px;">
                                        {!! Form::file('photo',['class' => 'file-upload__input','onchange' =>'uploadform();', 'form' => 'formm']) !!}
                                        {!! Form::hidden('photo_w', 250) !!}
                                        {!! Form::hidden('photo_h', 250) !!}
                                    </div><!-- file -->

                                @else
                                    <img class="slid-detils" src="{{url('/uploads/profile.png')}}" alt="thumbnail">
                                @endif

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="slid-detils-wright">
                                <h2>@lang('main.p_student') {{ Auth::user()->first_name }}</h2>
                                <p> @lang('main.p_city') <span class="detils-p-2">: {{ Auth::user()->city }} </span></p>
                            </div>
                        </div>

                    </div>
                    <h2 class="dede-h2">@lang('main.ur_details')</h2>

                    {{--<a class="btn btn-primary btn1" data-toggle="modal"--}}
                       {{--data-target="#myModal1"> @lang('main.edit')--}}
                    {{--</a>--}}

                    <div class="blue infos_3">
                        {{ Form::model(Auth::user()->profile, array('route' => array('profile.update', Auth::user()->profile->id), 'method' => 'PUT','id'=>'formm','class' => 'form-horizontal','files' => true)) }}
                        <hr>
                        <div class="form-group">
                            {{--{{Form::label('intro', __('main.about_u'), ['class' => 'col-sm-4 control-label'])}}--}}
                            <div class="col-sm-12">
                                {{Form::textarea('intro',null,['class' => 'form-control editable', 'style' => 'margin:0;'])}}
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            {{Form::label('gender', __('main.sex'), ['class' => 'col-sm-4 control-label'])}}
                            <div class="col-sm-8">
                                {{Form::select('gender',[1=>__('main.male') ,2 => __('main.female')],null,['class' => 'form-control editable'])}}
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            {{Form::label('school', __('main.np_school'), ['class' => 'col-sm-4 control-label'])}}
                            <div class="col-sm-8">
                                {{Form::text('school',null,['class' => 'form-control editable'])}}
                            </div>
                        </div>
                        <hr>
                        {{--
                        <div class="form-group">--}}
                            {{--{{Form::label('dbirth', __('main.bd'), ['class' => 'col-sm-4 control-label'])}}--}}
                            {{--<div class="col-sm-8">--}}
                                {{--{{Form::date('dbirth',null,['class' => 'form-control editable'])}}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--
                        <div class="form-group">--}}
                        {{--{{Form::label('age', 'السن', ['class' => 'col-sm-4 control-label'])}}--}}
                        {{--<div class="col-sm-8">--}}
                        {{--{{Form::number('age',null,['class' => 'form-control editable'])}}--}}
                        {{--</div>--}}
                        {{--</div>--}}

                        <div class="form-group">
                            {{Form::label('lang', __('main.language'), ['class' => 'col-sm-4 control-label'])}}
                            <div class="col-sm-8">
                                {{Form::select('lang',['arabic'=>'عربى','english' =>'English'],null,['class' => 'form-control editable'])}}
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            {{Form::label('level', __('main.edu_level'), ['class' => 'col-sm-4 control-label'])}}
                            <div class="col-sm-8">

                                @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                    {{Form::select('level',\App\Edulevel::pluck('title','id'), null,['class' => 'form-control editable'])}}
                                @else
                                    {{Form::select('level',\App\Edulevel::pluck('slug','id'), null,['class' => 'form-control editable'])}}
                                @endif

                            </div>
                        </div>

                        {!! Form::submit(__('main.chng_details')) !!}

                        {!! Form::close() !!}


                    </div>

                    {{--<div class="modal fade" id="myModal1" tabindex="-1" role="dialog"--}}
                         {{--aria-labelledby="myModalLabel">--}}
                        {{--<div class="modal-dialog" role="document">--}}
                            {{--<div class="modal-content">--}}
                                {{--<div class="modal-body text-center">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-md-12">--}}
                                        {{--{{ Form::model(Auth::user()->profile, array('route' => array('profile.update', Auth::user()->profile->id), 'method' => 'PUT','id'=>'formm','class' => 'form','files' => true)) }}--}}

                                        {{--{{Form::label('gender', __('main.about_u'), ['class' => ''])}}--}}
                                        {{--{{Form::textarea('intro',null,['class' => 'input1', 'style' => 'margin:0;'])}}--}}

                                        {{--{{Form::label('gender', __('main.sex'), ['class' => ''])}}--}}
                                        {{--{{Form::select('gender',[1=>__('main.male') ,2 => __('main.female')],null,['class' => 'input1','placeholder' => __('main.sex')])}}--}}

                                        {{--{{Form::label('school', __('main.np_school'), ['class' => ''])}}--}}
                                        {{--{{Form::text('school',null,['class' => 'input1','placeholder' => __('main.np_school')])}}--}}

                                        {{--{{Form::label('dbirth', __('main.bd'), ['class' => ''])}}--}}
                                        {{--{{Form::date('dbirth',null,['class' => 'input1','placeholder' => __('main.bd')])}}--}}

                                        {{--{{Form::label('lang', __('main.language'), ['class' => ''])}}--}}
                                        {{--{{Form::select('lang',['arabic'=>'عربى','english' =>'English'],null,['class' => 'input1','placeholder' => __('main.language')])}}--}}

                                        {{--{{Form::label('level', __('main.edu_level'), ['class' => ''])}}--}}
                                        {{--@if(LaravelLocalization::getCurrentLocale() == 'ar')--}}
                                            {{--{{Form::select('level',\App\Edulevel::pluck('title','id'), null,['class' => 'input1'])}}--}}
                                        {{--@else--}}
                                            {{--{{Form::select('level',\App\Edulevel::pluck('slug','id'), null,['class' => 'input1'])}}--}}
                                        {{--@endif--}}

                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--</div>--}}
                                {{--<div class="modal-footer">--}}
                                    {{--<button type="button" class=" btn-warning btn1"--}}
                                            {{--data-dismiss="modal">@lang('main.exit')--}}
                                    {{--</button>--}}
                                    {{--<button type="submit"--}}
                                            {{--class=" btn-primary btn1">@lang('main.chng_details')--}}
                                    {{--</button>--}}
                                {{--</div>--}}
                                {{--{!! Form::close() !!}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                </div>
                <div class="col-md-8">
                    <div class="last-mod-arsy">
                        <div class="Request" style="margin-top: 20px;">
                            <div class="advertising1-car-1">
                                <div class="row">
                                    <div class="col-md-4 col-sm-2 col-xs-12 ">
                                        <button class="bot-1 filter active" data-filter=".category-1">
                                            <i class="fa fa-bars" aria-hidden="true"></i> @lang('main.my_orders')
                                        </button>
                                    </div>
                                    <div class="col-md-4 col-sm-2 col-xs-12 ">
                                        <button class="bot-2 filter " data-filter=".category-2">
                                            <i class="fa fa-wpforms" aria-hidden="true"></i>
                                            @lang('main.proccessing')
                                        </button>
                                    </div>
                                    <div class="col-md-4 col-sm-2 col-xs-12 ">
                                        <button class="bot-3 filter " data-filter=".category-3">
                                            <i class="fa fa-check-circle" aria-hidden="true"></i> @lang('main.done')
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

                                            <h3>{{$enquery->subject}}
                                                @if($enquery->statue == 0)<span>( @lang('main.suspended') )</span>@endif
                                            </h3>
                                            <p>{{$enquery->comment}}</p>
                                            @if($enquery->target)<span>@lang('main.why')
                                                : <strong>{{$enquery->target}}</strong></span>@endif
                                            <span>@lang('main.prefered_time') :
                                                <strong>{{PreferedTime($enquery->preferred_time)}}</strong>
                                            </span>
                                            <hr>
                                            <a href="{{ url('/request/' . $enquery->id) . '/delete' }}"
                                               class="btn btn-danger btn1"> <i class="fa fa-trash-o"></i> </a>

                                            <a href="{{ url('/applicants/' . $enquery->id) }}"
                                               class="btn btn-primary btn1"> <i
                                                        class="fa fa-wpforms"></i> @lang('main.offers')
                                                @lang('main.intro') <span
                                                        class="badge"> {{ count(\App\Applicant::where('enquiry_id',$enquery->id)->where('statue', 1)->get()) }}</span></a>

                                            @if($enquery->total_hours)<span class="circle">@lang('main.num_hours') :
                                                {{$enquery->total_hours}}</span>@endif

                                        </div>
                                    </div>
                                @endforeach
                                @foreach($applicants as $applicant)
                                    <div class="col-md-12 col-sm-12 col-xs-12 mix category-2" data-bound="">
                                        <div class="caarss ">

                                            <h3>{{$applicant->enquiry->subject}}</h3>
                                            <p>{{$applicant->brief}}</p>
                                            <span>@lang('main.mr') / {{$applicant->user->FullName()}}</span>
                                            <hr>
                                            <a class="btn btn-primary btn1" data-toggle="modal"
                                               data-target="#myModal"> @lang('main.lesson_done')
                                            </a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                                 aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body text-center">
                                                            {!! Form::open(array('action' => 'ApplicantController@finish', 'method' => 'POST')) !!}
                                                            <input type="hidden" name="rating" class="rating"
                                                                   value="1" data-filled="fa fa-star fa-3x"
                                                                   data-empty="fa fa-star-o fa-3x"/>
                                                            <input type="hidden" name="enquiry_id"
                                                                   value="{{ $applicant->enquiry_id }}"/>

                                                            <input type="hidden" name="applicant_id"
                                                                   value="{{ $applicant->id }}"/>
                                                            <br>
                                                            <br>
                                                            <input type="text" name="title" value="" class="input1"
                                                                   placeholder="@lang('main.rate_title')"/>
                                                            <br>
                                                            <textarea name="body" value="" class="input1"
                                                                      style="height: 100px;"
                                                                      placeholder="@lang('main.ur_opinion')"/></textarea>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning btn1"
                                                                    data-dismiss="modal">@lang('main.exit')
                                                            </button>
                                                            <button type="submit"
                                                                    class="btn btn-primary btn1">@lang('main.save')
                                                            </button>
                                                        </div>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>

                                            <a href="{{ url('/messages/' . $applicant->enquiry_id . '/' . $applicant->id) }}"
                                               class="btn btn-primary btn1"> @lang('main.msgs') <span
                                                        class="badge"> {{ count(\App\Message::where('enquiry_id',$applicant->enquiry_id)->where('read',0)->where('applicant_id', $applicant->id)->get()) }}</span></a>

                                            @if($applicant->hour_price)<span class="circle">
                                                    {{$applicant->hour_price}} @lang('main.hour_rate')</span>@endif


                                        </div>
                                    </div>
                                @endforeach
                                @foreach($done_applicants as $applicant)
                                    <div class="col-md-12 col-sm-12 col-xs-12 mix category-3" data-bound="">
                                        <div class="caarss ">

                                            <h3>{{$applicant->enquiry->subject}}</h3>
                                            <p>{{$applicant->brief}}</p>
                                            <p>@lang('main.mr') / {{$applicant->user->FullName()}}</p>
                                            <hr>

                                            <span class="circle"> {{$applicant->enquiry->total_hours}} @lang('main.hour')</span>
                                            <span class="circle"> ${{$applicant->hour_price}}
                                                / @lang('main.hour')</span>
                                            {{--<span class="circle"> {{$applicant->enquiry->total_hours * $applicant->hour_price }}</span>--}}

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </secrion>

    <script>
        function uploadform() {
            document.getElementById('formm').submit();
        }
        $('body').on('click', '[data-editable]', function(){

            var $el = $(this);

            var $input = $('<input name="dd"/>').val( $el.text() );
            $el.replaceWith( $input );

            var save = function(){
                var $p = $('<span data-editable />').text( $input.val() );
                $input.replaceWith( $p );
            };

            $input.one('blur', save).focus();

        });

    </script>

@endsection
