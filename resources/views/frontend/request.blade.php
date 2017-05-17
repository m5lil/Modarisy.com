@extends('frontend.master')

@section('content')
    <!--slider***************************************-->
    <section class="modarsy-2">
        <section class="slider" style="height: 238px;">
            <div class="slid" style="height: 238px;">
                <div class="container">
                    <div class="row">
                        <div class="li-list">

                            <a href="#" class="conntact-my active">@lang('main.req_apply') </a>
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
                            <a href="#">@lang('main.fill_form')</a>

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
                            {!! Form::open(array('action' => 'EnquiryController@store', 'method' => 'POST')) !!}

                            <label class="label">@lang('main.choose_material') <i style="color:#ff898b;">*</i> </label>
                            @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                {{Form::select('material',array_add(\App\Materials::pluck('title','slug'),'0',__('main.choose_material')),0,['class' => 'form-control'])}}
                            @else
                                {{Form::select('material',array_add(\App\Materials::pluck('slug','slug'),'0',__('main.choose_material')),0,['class' => 'form-control'])}}
                            @endif
                            @if ($errors->has('material'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('material') }}</strong>
                                    </span>
                            @endif



                            <label class="label">@lang('main.lesson_title') <i style="color:#ff898b;">*</i> </label>
                            <input type="text" name="subject" value="{{ Request::Input('subject') ?: old('subject')}}"
                                   placeholder="@lang('main.lesson_title')">

                            @if ($errors->has('subject'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                            @endif

                            <textarea name="comment" id="" cols="30" rows="10"
                                      placeholder="@lang('main.notes')">{{old('comment')}}</textarea>

                            <label class="label">@lang('main.target')</label>
                            <input type="text" name="target" value="{{old('target')}}"
                                   placeholder="@lang('main.target')">

                            <label class="label">@lang('main.many_hours1')</label>
                            <input type="number" min="1"
                                   value="{{ Request::Input('total_hours') ?: old('total_hours') }}" name="total_hours"
                                   placeholder="@lang('main.many_hours')">


                            <label class="label">@lang('main.prefered_time') <i style="color:#ff898b;">*</i> </label>
                            <select name="preferred_time" id="">
                                <option selected disabled>@lang('main.prefered_time')</option>
                                @if(old('preferred_time'))
                                    <option selected
                                            value="{{ old('preferred_time') }}">{{ PreferedTime(old('preferred_time')) }}</option>
                                @endif
                                <option value="1">@lang('main.morning')</option>
                                <option value="2">@lang('main.half_day')</option>
                                <option value="3">@lang('main.night')</option>
                                <option value="4">@lang('main.all_time')</option>
                            </select>

                            @if ($errors->has('preferred_time'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('preferred_time') }}</strong>
                                    </span>
                            @endif

                            {!! Form::hidden('lat', null, ['id' => 'lat']) !!}

                            {!! Form::hidden('lng', null, ['id' => 'lng']) !!}

                            {!! Form::submit(__('main.ask')) !!}

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
                        <div id="map" style="height: 730px; width: 100%;"></div>

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
                                        title: 'Marker #',
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


.'    <script !src="">
        document.getElementById("map").style.height = (document.getElementById("one").clientHeight - 30) + "px";
    </script>





@endsection
