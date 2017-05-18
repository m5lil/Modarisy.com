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
                                <h2> @lang('main.mr') / {{ Auth::user()->fullName() }}</h2>
                                <p> @lang('main.p_city') <span class="detils-p-2">: {{ Auth::user()->city }} </span></p>
                            </div>
                        </div>

                    </div>


                    <div class="blue infos_3">


                        {{ Form::model(Auth::user()->profile, array('route' => array('profile.update', Auth::user()->profile->id), 'method' => 'PUT','id'=>'formm','class' => 'form-horizontal','files' => true)) }}
                        <div class="form-group">
                            <div class="col-sm-12">
                               <input type="hidden" class="rating" disabled="disabled" value="{{Auth::user()->profile->getRating()}}"/> {{Auth::user()->profile->getRating()}} ( {{  count(Auth::user()->profile->reviews()->get())  }} @lang('main.rates') )
                            </div>
                        </div>
                        <hr>

                        <div class="form-group">
                            <div class="col-sm-12">
                                {{Form::textarea('intro',null,['class' => 'form-control editable', 'style' => 'margin:0;'])}}
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            {{Form::label('gen_exp', __('main.p_exp_years'), ['class' => 'col-sm-4 control-label'])}}
                            <div class="col-sm-8">
                                {{Form::text('gen_exp',null,['class' => 'form-control editable'])}}
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            {{Form::label('teach_hours', __('main.appropriate_time'), ['class' => 'col-sm-4 control-label'])}}
                            <div class="col-sm-8">
                                <select name="teach_time" class="form-control editable">
                                    <option selected
                                            disabled>{{PreferedTime(Auth::user()->profile->teach_hours)}}</option>
                                    <option value="1">@lang('main.morning')</option>
                                    <option value="2">@lang('main.half_day')</option>
                                    <option value="3">@lang('main.night')</option>
                                    <option value="4">@lang('main.all_time')</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            {{Form::label('teach_time', __('main.hours_by_day'), ['class' => 'col-sm-4 control-label'])}}
                            <div class="col-sm-8">
                                {{Form::text('teach_hours',null,['class' => 'form-control editable'])}}
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            {{Form::label('hour_rate', __('main.hour_rate'), ['class' => 'col-sm-4 control-label'])}}
                            <div class="col-sm-8">
                                {{Form::text('hour_rate',null,['class' => 'form-control editable'])}}
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            {{Form::label('gender', __('main.sex'), ['class' => 'col-sm-4 control-label'])}}
                            <div class="col-sm-8">
                                {{Form::select('gender',[1=>__('main.male'),2 =>__('main.female')],null,['class' => 'form-control editable'])}}
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
                        <div class="form-group">
                            {{Form::label('dbirth', __('main.bd'), ['class' => 'col-sm-4 control-label'])}}
                            <div class="col-sm-8">
                                {{Form::date('dbirth',null,['class' => 'form-control editable'])}}
                            </div>
                        </div>
                        <hr>
                        {{--<div class="form-group">--}}
                        {{--{{Form::label('age', 'السن', ['class' => 'col-sm-4 control-label'])}}--}}
                        {{--<div class="col-sm-8">--}}
                        {{--{{Form::number('age',null,['class' => 'form-control editable'])}}--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        <div class="form-group">
                            {{Form::label('specialty', __('main.speci'), ['class' => 'col-sm-4 control-label'])}}
                            <div class="col-sm-8">
                                {{Form::select('specialty',\App\Materials::pluck('title','slug'),null,['class' => 'form-control editable'])}}
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            {{Form::label('lang', __('main.lang'), ['class' => 'col-sm-4 control-label'])}}
                            <div class="col-sm-8">
                                {{Form::select('lang',['arabic'=>'عربى','english' =>'English'],null,['class' => 'form-control editable'])}}
                            </div>
                        </div>
                        {!! Form::submit(__('main.chng_details')) !!}

                        {!! Form::close() !!}

                    </div>
                </div>
                <div class="col-md-8">
                    <div class="last-mod-arsy">
                        <div class="Request" style="margin-top: 20px;">
                            <div class="advertising1-car-1">
                                <div class="row">
                                    <div class="col-md-4 col-sm-2 col-xs-12 ">
                                        <button class="bot-1 filter active" data-filter=".category-1">
                                            <i class="fa fa-bars" aria-hidden="true"></i>
                                            @lang('main.new_requ')
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
                                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                                            @lang('main.donee')
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
                                            <h3>{{$enquery->subject}}</h3>
                                            <p>{{$enquery->comment}}</p>
                                            @if($enquery->target)<span>@lang('main.why')
                                                : <strong>{{$enquery->target}}</strong></span>@endif
                                            <span>@lang('main.prefered_time') :
                                                <strong>{{PreferedTime($enquery->preferred_time)}}</strong>
                                            </span>
                                            <hr>
                                            @if (!Auth::user()->applicants->where('enquiry_id', $enquery->id)->first() )
                                                <a href="{{ url('/applicant/create/' . $enquery->id) }}"
                                                   class="btn btn-primary btn1"> @lang('main.apply') </a>
                                            @else
                                                <a href="{{ url('/messages/' . $enquery->id . '/' . Auth::user()->applicants->where('enquiry_id', $enquery->id)->first()->id) }}"
                                                   class="btn btn-primary btn1"> @lang('main.msgs')
                                                    <span class="badge"> {{ count(\App\Message::where('enquiry_id',$enquery->id)->where('read',0)->where('to', Auth::user()->id)->get()) }}</span></a>
                                            @endif
                                            <a href="{{url('/profile'). '/' .$enquery->user->id}}">
                                                <span class="circle">{{$enquery->user->FullName()}}</span></a>
                                            <span class="circle">{{$enquery->total_hours}} @lang('main.hour')</span>

                                        </div>
                                    </div>
                                @endforeach
                                @if(isset($progress_enquiries))
                                    @foreach($progress_enquiries as $enquery)
                                        <div class="col-md-12 col-sm-12 col-xs-12 mix category-2" data-bound="">
                                            <div class="caarss ">

                                                <h3>{{$enquery->subject}}</h3>
                                                <p>{{$enquery->comment}}</p>
                                                @if($enquery->target)<span>@lang('main.why')
                                                    : <strong>{{$enquery->target}}</strong></span>@endif
                                                <span>@lang('main.prefered_time') :
                                                <strong>{{PreferedTime($enquery->preferred_time)}}</strong>
                                            </span>
                                                <hr>
                                                <a href="{{ url('/messages/' . $enquery->id . '/' . $enquery->applicant_id) }}"
                                                   class="btn btn-primary btn1"> @lang('main.msgs') </a>

                                                <a href="{{url('/profile'). '/' .$enquery->user->id}}">
                                                    <span class="circle">{{$enquery->user->FullName()}}</span></a>
                                                <span class="circle">{{$enquery->total_hours}} @lang('main.hour')</span>


                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                @if(isset($done_enquiries))
                                    @foreach($done_enquiries as $enquery)
                                        <div class="col-md-12 col-sm-12 col-xs-12 mix category-3" data-bound="">
                                            <div class="caarss ">

                                                <h3>{{$enquery->subject}}</h3>
                                                <p>{{$enquery->comment}}</p>
                                                @if($enquery->target)<span>@lang('main.why')
                                                    : <strong>{{$enquery->target}}</strong></span>@endif
                                                <span>@lang('main.prefered_time') :
                                                <strong>{{PreferedTime($enquery->preferred_time)}}</strong>
                                            </span>
                                                <hr>
                                                <a href="{{url('/profile'). '/' .$enquery->user->id}}">
                                                    <span class="circle">{{$enquery->user->FullName()}}</span></a>
                                                <span class="circle">{{$enquery->total_hours}} @lang('main.hour')</span>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>


                    </div>

                    {{--<div class="panel panel-default" style="margin-top: 20px;">--}}
                    {{--<div class="panel-heading">@lang('main.the_rates')</div>--}}

                    {{--<div class="panel-body">--}}
                    {{--@foreach(Auth::user()->profile->reviews()->get() as $value)--}}
                    {{--<div class="col-md-12 col-sm-12 col-xs-12 mix category-3"--}}
                    {{--style="margin: 10px;background-color: #fff;">--}}
                    {{--<div class="caarss ">--}}
                    {{--<h4>--}}
                    {{--{{$value->title}} - <small>{{$value->author->FullName()}}</small>--}}
                    {{--</h4>--}}
                    {{--<p>{{@$value->body}}</p>--}}
                    {{--<p><input type="hidden" readonly="readonly" class="rating" value="{{$value->rating}}">--}}
                    {{--</p>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--@endforeach--}}
                    {{--</div>--}}
                    {{--</div>--}}

                </div>
            </div>

        </div>
    </secrion>

    <script>
        function uploadform() {
            document.getElementById('formm').submit();
        }
    </script>

@endsection
