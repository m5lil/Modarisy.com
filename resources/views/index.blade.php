@extends('frontend.master')



@section('content')

    <!--slider***************************************-->
    <section class="slider">
        <div class="slid">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xs-12 right-right">
                        <div class="dede cors wow fadeInUp" data-wow-duration="2s">
                            <h3 style="color: #fff; text-align: center; margin-bottom: 40px;">@lang('main.ask_request')</h3>
                            {!! Form::open(array('action' => 'EnquiryController@createRequest', 'method' => 'post')) !!}
                            <input type="text" name="subject" placeholder="@lang('main.request_title')">

                            @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                {{Form::select('material',array_add(\App\Materials::pluck('title','slug'),'0',__('main.choose_material')),0,['class' => 'form-control'])}}
                            @else
                                {{Form::select('material',array_add(\App\Materials::pluck('slug','slug'),'0',__('main.choose_material')),0,['class' => 'form-control'])}}
                            @endif

                            <input type="number" min="1" name="total_hours" placeholder="@lang('main.num_hours')">
                            @if(Auth::check())
                            <button type="submit" class="se">@lang('main.ask')</button>
                            {!! Form::close() !!}
                            @else
                            {!! Form::close() !!}
                            <button  onclick="location.href='{{url('/be_member')}}';"  class="slid-but-1 hvr-float-shadow">@lang('main.register_now')</button>
                            @endif
                            {{--<p><a href="#">بحث متقدم</a></p>--}}
                            
                        </div>

                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="slider-right  wow fadeInUp" data-wow-duration="2s">
                            <h2>@lang('main.ask_via_website')</h2>
                            <p>{{ setting('intro' . LaravelLocalization::getCurrentLocale())}}</p>
                            <div class="slider-but">
                                <button  onclick="location.href='{{url('/be_member')}}';"  class="slid-but-1 hvr-float-shadow">@lang('main.register_now')</button>
                                <button  onclick="location.href='{{url('/contact')}}';"  class="slid-but-2 hvr-float-shadow">@lang('main.contact_us')</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--***************************************slider-->
    <!--title***************************************-->
    <section class="title">
        <div class="titl">
            <div class="container">
                <div class="heit-title text-center">
                    <p>@lang('main.how_work')</p>
                    <img src="{{url('/images/after.png')}}">
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12  wow fadeInUp" data-wow-duration="2s">
                        <div class="tit">
                                <span class="tit-icon">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </span>
                            <span class="tit-h2">{{setting('step1' . LaravelLocalization::getCurrentLocale())}}</span>
                        </div>
                        <div class="tit-p"><p>{{setting('step1' . LaravelLocalization::getCurrentLocale() .'c')}}</p></div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12  wow fadeInUp" data-wow-duration="2s">
                        <div class="tit">
                                <span class="tit-icon">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                </span>
                            <span class="tit-h2">{{setting('step2' . LaravelLocalization::getCurrentLocale())}}</span>
                        </div>
                        <div class="tit-p">
                            <p>{{setting('step2' . LaravelLocalization::getCurrentLocale().'c')}}</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12  wow fadeInUp" data-wow-duration="2s">
                        <div class="tit">
                                <span class="tit-icon">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </span>
                            <span class="tit-h2">{{setting('step3'  . LaravelLocalization::getCurrentLocale())}}</span>
                        </div>
                        <div class="tit-p">
                            <p>{{setting('step3' . LaravelLocalization::getCurrentLocale().'c')}}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--***************************************title-->
    <!--Details*************************************-->
    <section class="Details">
        <div class="Detail text-center">
            <div class="contaimer  wow fadeInUp" data-wow-duration="2s">
                <h2>{{setting('intro2' . LaravelLocalization::getCurrentLocale())}}</h2>
                <p>{{setting('intro2'. LaravelLocalization::getCurrentLocale().'c')}}</p>
                <div class="Details-but">
                    <button  onclick="location.href='{{url('/be_member')}}';" class="slid-but-1 hvr-float-shadow">@lang('main.register_now')</button>
                    <button  onclick="location.href='{{url('/contact')}}';" class="slid-but-2 hvr-float-shadow">@lang('main.contact_us')</button>
                </div>
            </div>
        </div>
    </section>
    <!--*************************************Details-->

    <!--map*****************************************-->

    <div class="map-map-cors">
        <div class="cors-1  wow fadeInUp" data-wow-duration="2s">
            <p class="cors-right-1"><a href="#">@lang('main.find_teachers')</a></p>

            {!! Form::open(array('action' => 'HomeController@filter', 'method' => 'GET')) !!}

            @if(LaravelLocalization::getCurrentLocale() == 'ar')
                {{Form::select('specialty',array_add(\App\Materials::pluck('title','slug'),'',__('main.choose_material')),null,['class' => 'selectpicker'])}}
            @else
                {{Form::select('specialty',array_add(\App\Materials::pluck('slug','slug'),'',__('main.choose_material')),null,['class' => 'selectpicker'])}}
            @endif

            <select name="teach_time"  class="selectpicker">
                <option selected disabled>@lang('main.prefered_time')</option>
                <option value="1">@lang('main.morning')</option>
                <option value="2">@lang('main.half_day')</option>
                <option value="3">@lang('main.night')</option>
                <option value="4">@lang('main.all_time')</option>
            </select>
            <div class="text-center"><h5>@lang('main.choose_location')</h5></div>

            <select name="distance"  class="selectpicker" required>
                <option selected disabled>@lang('main.distance_far')</option>
                <option value="10">10</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="200">200</option>
            </select>

            {!! Form::hidden('lat', null, ['id' => 'lat']) !!}
            {!! Form::hidden('lng', null, ['id' => 'lng']) !!}

            <button type="submit" class="se">@lang('main.search')</button>
            {!! Form::close() !!}

        </div>
    </div>
    <div id="map" style="height: 530px; width: 100%;">

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
                                click: function(event) {
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




            GMaps.geolocate({
                success: function(position) {
                    map.setCenter(position.coords.latitude, position.coords.longitude);
                },
                not_supported: function() {
                    alert("Your browser does not support geolocation");
                },
            });


    </script>


    <!--*****************************************map-->

    <!--owl-slider**********************************-->
    <section class="owl-slider">
        <div class="owl-slid">
            <div class="owl-slid-hite text-center">
                <p>@lang('main.testimonial')</p>
                <img src="{{url('/images/after.png')}}">
            </div>
            <div class="container">
                <div class="owl-carousel">
                    @foreach(\App\Testimonial::all() as $value)
                    <div class="item  wow fadeInUp" data-wow-duration="2s">
                        <div class="Clients">
                                <span class="Client-img">
                                    <img src="{{url('/uploads/' . @$value->photo)}}">
                                </span>
                            <span class="Client-driv">
                                    <span class="name">{{$value->name}}</span>
                                    <span class="work">{{$value->title}}</span>
                                </span>
                        </div>
                        <div class="clint-right">
                            <p>{{$value->body}}</p>
                            <i class="fa fa-comments" aria-hidden="true"></i>
                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!--**********************************owl-slider-->

@endsection
