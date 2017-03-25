@extends('frontend.master')



@section('content')

    <!--slider***************************************-->
    <section class="slider">
        <div class="slid">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xs-12 right-right">
                        <div class="dede cors wow fadeInUp" data-wow-duration="2s">
                            <h3 style="color: #fff; text-align: center; margin-bottom: 40px;">أطلب درس خاص</h3>
                            {!! Form::open(array('action' => 'EnquiryController@createRequest', 'method' => 'post')) !!}
                            <input type="text" name="subject" placeholder="موضوع الدرس">
                            <input type="text" name="total_hours" placeholder="عدد الساعات المطلوبة">
                            <button class="se">أطلب الآن</button>
                            {{--<p><a href="#">بحث متقدم</a></p>--}}
                            {!! Form::close() !!}
                        </div>

                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="slider-right  wow fadeInUp" data-wow-duration="2s">
                            <h2>أطلب درس خاص عبر موقعنا بسهولة</h2>
                            <p>
                                وسوف يرد عليك مجموعة من المدرسين الأكفاء المختارين بعناية من إدارة الموقع واقبل المدرس
                                الذى تشاء
                            </p>
                            <div class="slider-but">
                                <button  onclick="location.href='{{url('/be_member')}}';"  class="slid-but-1 hvr-float-shadow">أشترك الان</button>
                                <button  onclick="location.href='{{url('/contact')}}';"  class="slid-but-2 hvr-float-shadow">تواصل معنا</button>
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
                    <p>كيف تعمل</p>
                    <img src="{{url('/images/after.png')}}">
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12  wow fadeInUp" data-wow-duration="2s">
                        <div class="tit">
                                <span class="tit-icon">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </span>
                            <span class="tit-h2">
                                    الاشتراك فى الخدمة
                                </span>
                        </div>
                        <div class="tit-p">
                            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على
                                الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة
                                لوريم إيبسوم ...</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12  wow fadeInUp" data-wow-duration="2s">
                        <div class="tit">
                                <span class="tit-icon">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                </span>
                            <span class="tit-h2">
                                     ابحث عن مدرس في مدينتك
                                </span>
                        </div>
                        <div class="tit-p">
                            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على
                                الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة
                                لوريم إيبسوم ...</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12  wow fadeInUp" data-wow-duration="2s">
                        <div class="tit">
                                <span class="tit-icon">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </span>
                            <span class="tit-h2">
                                   التواصل بينكم
                                </span>
                        </div>
                        <div class="tit-p">
                            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على
                                الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة
                                لوريم إيبسوم ...</p>
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
                <h2> تعلم من أكبر شبكة من المعلمين ذوي الخبرة </h2>
                <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل
                    الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم ...</p>
                <div class="Details-but">
                    <button  onclick="location.href='{{url('/be_member')}}';" class="slid-but-1 hvr-float-shadow">أشترك الان</button>
                    <button  onclick="location.href='{{url('/contact')}}';" class="slid-but-2 hvr-float-shadow">تواصل معنا</button>
                </div>
            </div>
        </div>
    </section>
    <!--*************************************Details-->

    <!--map*****************************************-->

    <div class="map-map-cors">
        <div class="cors-1  wow fadeInUp" data-wow-duration="2s">
            <p class="cors-right-1"><a href="#">إبحث عن طلبات دروس واردة</a></p>

            {!! Form::open(array('action' => 'HomeController@filter', 'method' => 'POST')) !!}
            <select name="material" class="selectpicker">
                <option selected disabled>المادة</option>
                <option value="arabic">لغة عربية</option>
                <option value="scince">علوم</option>
                <option value="math">رياضيات</option>
            </select>

            <select name="preferred_time"  class="selectpicker">
                <option selected disabled>مواعيد التدريس المناسبة</option>
                <option value="1">صباحا من 8ص وحتى 12م</option>
                <option value="2">منتصف اليوم من 12م وحتى 6م</option>
                <option value="3">مساءا من 6م وحتى 10م</option>
                <option value="4">فى أى وقت فى اليوم</option>
            </select>
            <select name="distance"  class="selectpicker" required>
                <option selected disabled>المسافة لا تزيد عن</option>
                <option value="10">10 كيلو</option>
                <option value="50">50 كيلو</option>
                <option value="100">100 كيلو</option>
                <option value="200">200 كيلو</option>
            </select>
            <div class="text-center"><h4>اختر موقعك من الخريطه</h4></div>
            <input id="pac-input" type="text" placeholder="Search Box"/>

            {!! Form::hidden('lat', null, ['id' => 'lat']) !!}
            {!! Form::hidden('lng', null, ['id' => 'lng']) !!}

            <button type="submit" class="se">بحث الان</button>
            {!! Form::close() !!}

        </div>
    </div>
    <div id="map-canvas" style="height: 530px; width: 100%;">

    </div>
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


    <!--*****************************************map-->

    <!--owl-slider**********************************-->
    <section class="owl-slider">
        <div class="owl-slid">
            <div class="owl-slid-hite text-center">
                <p>كيف تعمل</p>
                <img src="{{url('/images/after.png')}}">
            </div>
            <div class="container">
                <div class="owl-carousel">
                    <div class="item  wow fadeInUp" data-wow-duration="2s">
                        <div class="Clients">
                                <span class="Client-img">
                                    <img src="{{url('/images/clint.png')}}">
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
                                    <img src="{{url('/images/clint.png')}}">
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
                                    <img src="{{url('/images/clint.png')}}">
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
                                    <img src="{{url('/images/clint.png')}}">
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
                                    <img src="{{url('/images/clint.png')}}">
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
                                    <img src="{{url('/images/clint.png')}}">
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
