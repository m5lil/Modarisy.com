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
                            <a href="#" class="conntact-my active">طلب درس خاص </a>
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
                            <a href="#">قم بمليء البيانات الخاصة بك لتكمل الملف الخاص بك</a>
                            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على
                                الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة
                                لوريم إيبسوم أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم
                إيبسوم ....</p>
                        </h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="modarsyy-1">
            <div class="container">
                <div class="row">

                    <div class="col-sm-6 col-xs-12">
                        <div class="form">
                            {!! Form::open(array('action' => 'EnquiryController@store', 'method' => 'POST')) !!}

                            <select name="material" id="">
                                <option selected disabled>المادة</option>
                                <option value="arabic">لغة عربية</option>
                                <option value="scince">علوم</option>
                                <option value="math">رياضيات</option>
                            </select>

                            <input type="text" name="subject" value="{{ Cache::get('subject') }}" placeholder="موضوع الدرس">

                            <textarea name="comment" id="" cols="30" rows="10" placeholder="ملاحظات"></textarea>

                            <input type="text" name="target" placeholder="الهدف من الدرس - مثال: التتحضير للإمتحان..">

                            <input type="text" value="{{ Cache::get('total_hours') }}" name="total_hours" placeholder="عدد الساعات المطلوبة">

                            <select name="preferred_time" id="">
                                <option selected disabled>مواعيد التدريس المناسبة</option>
                                <option value="1">صباحا من 8ص وحتى 12م</option>
                                <option value="2">منتصف اليوم من 12م وحتى 6م</option>
                                <option value="3">مساءا من 6م وحتى 10م</option>
                                <option value="4">فى أى وقت فى اليوم</option>
                            </select>

                            <input id="pac-input" type="text" placeholder="Search Box"/>

                            {!! Form::hidden('lat', null, ['id' => 'lat']) !!}

                            {!! Form::hidden('lng', null, ['id' => 'lng']) !!}

                            {!! Form::submit('طلب') !!}

                            {!! Form::close() !!}
                        </div>
                    </div>


                    <div class="col-sm-6 col-xs-12">
                        <div id="map-canvas" style="height: 730px; width: 100%;">
                            <script type="text/javascript">
                                var $maperizer = $('#map-canvas').maperizer(Maperizer.MAP_OPTIONS);

                                $maperizer.maperizer('setCenter', {
                                    location: 'Saudi Arabia'
                                });

                                var latField = $('input#lat'),
                                    lngField = $('input#lng');

                                $maperizer.maperizer('attachEventsToMap', [{
                                        name: 'click',
                                        callback: function(event){
                                            $maperizer.maperizer('removeAllMarkers');
                                            $maperizer.maperizer('addMarker', {
                                                lat: event.latLng.lat(),
                                                lng: event.latLng.lng(),
                                            });
                                            latField.val(event.latLng.lat());
                                            lngField.val(event.latLng.lng());
                                        }
                                    }]
                                );

                            </script>

                    </div>

                </div>
            </div>

        </section>
    </section>







@endsection
