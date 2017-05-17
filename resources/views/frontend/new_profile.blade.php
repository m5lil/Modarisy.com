@extends('frontend.master')

@section('content')
    <!--slider***************************************-->
    @if(!\Auth::user()->profile)
        @if (\Auth::user()->type == 0)
            <script type="text/javascript">
                window.location = "{{ url('/choosetype') }}";//here double curly bracket
            </script>
        @endif
        <section class="modarsy-2">
            <section class="slider" style="height: 238px;">
                <div class="slid" style="height: 238px;">
                    <div class="container">
                        <div class="row">
                            <div class="li-list">

                                <a href="#" class="conntact-my">@lang('main.register') > </a>
                                <a href="#" class="conntact-my active">@lang('main.np_completing_profile')</a>
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
                                <a href="#">@lang('main.np_complete_ur_profile')</a>
                            </h2>
                        </div>
                    </div>
                </div>
            </section>
            <section class="modarsyy-1">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <div class="form" id="one">
                                {!! Form::open(array('route' => 'profile.store', 'method' => 'POST','files' => true)) !!}
                                <label class="label">@lang('main.np_school')</label>

                                <input type="text" name="school" value="{{ old('school') }}" placeholder="@lang('main.np_school')">

                                <textarea name="intro" id="" cols="30" rows="10"
                                          placeholder="@lang('main.np_intro_for_u')">{{ old('intro') }}</textarea>
                                <label class="label">@lang('main.np_how_u_hear1')</label>

                                <select name="hear" id="">
                                    <option {{ old('level') ? 'selected' : '' }} value="{{ old('hear') }}">{{ old('hear') ? __('main.choosed') : __('main.np_how_u_hear')}}</option>
                                    <option value="من خلال صديق">@lang('main.np_from_friend')</option>
                                    <option value="من خلال محرك بحث">@lang('main.np_search_engine')</option>
                                    <option value="من خلال إعلان مطبوع">@lang('main.np_ads_print')</option>
                                    <option value="من خلال البريد الإلكترونى">@lang('main.np_emails')</option>
                                    <option value="من خلال رسالة على جوالك">@lang('main.np_sms')</option>
                                </select>

                                <label class="label">@lang('main.bd') <i style="color:#ff898b;">*</i></label>

                                {{ Form::date('dbirth',null,['id' => 'dadte','placeholder' => 'BD']) }}
                                @if ($errors->has('dbirth'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dbirth') }}</strong>
                                    </span>
                                @endif

                                {{--<input type="text" value="" name="age" placeholder="العمر">--}}

                                <br/>
                                <label class="label">@lang('main.sex') <i style="color:#ff898b;">*</i> </label>

                                <select name="gender" id="">
                                    <option selected disabled>@lang('main.sex')</option>
                                    <option {{ old('gender') === '1' ? 'selected' : '' }} value="1">@lang('main.np_male')</option>
                                    <option {{ old('gender') === '2' ? 'selected' : '' }} value="2">@lang('main.np_female')</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif

                                <br/>
                                <label class="label">@lang('main.np_language') <i style="color:#ff898b;">*</i> </label>

                                <select name="lang" id="">
                                    <option selected disabled>@lang('main.np_language')</option>
                                    <option {{ old('lang') === 'english' ? 'selected' : '' }} value="english">English
                                    </option>
                                    <option {{ old('lang') === 'arabic' ? 'selected' : '' }} value="arabic">عربى
                                    </option>
                                </select>
                                @if ($errors->has('lang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lang') }}</strong>
                                    </span>
                                @endif

                                <label class="label">@lang('main.prefered_time') <i style="color:#ff898b;">*</i></label>
                                <select name="teach_hours" id="">
                                    <option disabled>@lang('main.prefered_time') <i style="color:#ff898b;">*</i> </option>
                                    <option value="1" {{ old('teach_hours') === 1 ? 'selected' : '' }}>@lang('main.morning')</option>
                                    <option value="2" {{ old('teach_hours') === 2 ? 'selected' : '' }}>@lang('main.half_day')</option>
                                    <option value="3" {{ old('teach_hours') === 3 ? 'selected' : '' }}>@lang('main.night')</option>
                                    <option value="4" {{ old('teach_hours') === 4 ? 'selected' : '' }}>@lang('main.all_time')</option>
                                </select>
                                @if ($errors->has('teach_hours'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('teach_hours') }}</strong>
                                    </span>
                                @endif


                            @if(Auth::user()->type == 2)
                                    <label class="label">@lang('main.choose_material') <i style="color:#ff898b;">*</i> </label>

                                    @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                        {{Form::select('specialty',array_add(\App\Materials::pluck('title','slug'),'',__('main.choose_material')),null,['class' => 'form-control'])}}
                                    @else
                                        {{Form::select('specialty',array_add(\App\Materials::pluck('slug','slug'),'',__('main.choose_material')),null,['class' => 'form-control'])}}
                                    @endif
                                    @if ($errors->has('specialty'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('specialty') }}</strong>
                                    </span>
                                    @endif

                                    <label class="label">@lang('main.np_exp_years')</label>
                                    <input type="number" value="{{old('gen_exp')}}" name="gen_exp"
                                           placeholder="@lang('main.np_exp_years1')">
                                    <label class="label">@lang('main.np_sch_exp')</label>
                                    <input type="number" value="{{old('sch_exp')}}" name="sch_exp"
                                           placeholder="@lang('main.np_sch_exp1')">
                                    <label class="label">@lang('main.np_hour_rate')</label>
                                    <input type="number" value="{{old('hour_rate')}}" name="hour_rate"
                                           placeholder="@lang('main.np_hour_rate')">
                                    <label class="label">@lang('main.np_prefer_hour')</label>
                                    <input type="number" value="{{old('teach_time')}}" name="teach_time"
                                           placeholder="@lang('main.np_prefer_hour1')">

                                @elseif(Auth::user()->type == 3)
                                    <label class="label">@lang('main.edu_level')</label>
                                    @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                        {{Form::select('level',\App\Edulevel::pluck('title','id'),old('level'),['class' => 'form-control'])}}
                                    @else
                                        {{Form::select('level',\App\Edulevel::pluck('slug','id'),old('level'),['class' => 'form-control'])}}
                                    @endif


                                    {{--<select name="level" id="">--}}
                                    {{--<option disabled>المرحلة التعليمية</option>--}}
                                    {{--<option value="1" {{ old('level') === 1 ? 'selected' : '' }}>الصف الأول الإبتدائى</option>--}}
                                    {{--<option value="2" {{ old('level') === 2 ? 'selected' : '' }}>الصف الثانى الإبتدائي</option>--}}
                                    {{--<option value="3" {{ old('level') === 3 ? 'selected' : '' }}>الصف الأول الإبتدائى</option>--}}
                                    {{--<option value="4" {{ old('level') === 4 ? 'selected' : '' }}>الصف الثانى الإبتدائي</option>--}}
                                    {{--</select>--}}
                                @endif

                                <label class="label"></label>

                                <div class="file-upload">
                                    <label for="upload" class="file-upload__label"><i class="fa fa-image"></i> <span id="file_name"> @lang('main.np_pic')</span> </label>
                                    {!! Form::file('photo',['class' => 'file-upload__input','onchange' =>'getFileData(this);']) !!}
                                </div><!-- file -->

                                {!! Form::hidden('photo_w', 250) !!}
                                {!! Form::hidden('photo_h', 250) !!}
                                <input id="lat" name="lat" type="hidden">

                                <input id="lng" name="lng" type="hidden">

                                <button type="submit">@lang('main.np_save')</button>

                                {!! Form::close() !!}
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            @if ($errors->has('lat'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('lat') }}</strong>
                                    </span>
                            @else
                                <p>@lang('main.np_choose_location') <i style="color:#ff898b;">*</i></p>
                            @endif

                            <div id="map" style="height: 900px; width: 100%;">

                            </div>

                            <script type="text/javascript">

                                //            prettyPrint();
                                var latField = $('input#lat'),
                                    lngField = $('input#lng');

                                map = new GMaps({
                                    div: '#map',
                                    lat: 24.786734541988878,
                                    lng: 46.6259765625,
                                    zoom: 6,
                                    click: function (event) {
                                        map.removeMarkers();
                                        var lat = event.latLng.lat();
                                        var lng = event.latLng.lng();
                                        map.addMarker({
                                            lat: lat,
                                            lng: lng,
                                        });
                                        var lat = event.latLng.lat();
                                        var lng = event.latLng.lng();
                                        latField.val(lat);
                                        lngField.val(lng);

                                    },

                                });
                                console.log(map)

                                GMaps.geolocate({
                                    success: function (position) {
                                        map.setCenter(position.coords.latitude, position.coords.longitude);
                                    },
                                    not_supported: function () {
                                        alert("Your browser does not support geolocation");
                                    },
                                });

                            </script>


                        </div>

                    </div>
                </div>

            </section>
        </section>
    @else
        <script type="text/javascript">
            window.location = "{{ url('/home') }}";//here double curly bracket
        </script>
    @endif

    <script !src="">
        function getFileData(myFile){
            var file = myFile.files[0];
            var filename = file.name;
            document.getElementById('file_name').innerHTML = filename;
        }

        if ($('#dadte')[0].type != 'date') $('#dadte').datepicker();
        document.getElementById("map").style.height = (document.getElementById("one").clientHeight - 30) + "px";
        $(document).on('click', '.browse', function () {
            var file = $(this).parent().parent().parent().find('.file');
            file.trigger('click');
        });
        $(document).on('change', '.file', function () {
            $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
        });
    </script>

@endsection
