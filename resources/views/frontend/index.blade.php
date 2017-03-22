@extends('frontend.master')



@section('content')

    <!--slider***************************************-->
    <section class="slider">
        <div class="slid">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xs-12 right-right">
                        <div class="cors  wow fadeInUp" data-wow-duration="2s">

                            <select class="selectpicker">
                                <option>المرحله التعليمية</option>
                                <option>Ketchup</option>
                                <option>Relish</option>
                            </select>

                            <select class="selectpicker">
                                <option>المستوى</option>
                                <option>Ketchup</option>
                                <option>Relish</option>
                            </select>

                            <select class="selectpicker">
                                <option>المادة</option>
                                <option>Ketchup</option>
                                <option>Relish</option>
                            </select>
                            <button class="se">بحث الان</button>
                            <p><a href="#">بحث متقدم</a></p>
                        </div>

                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="slider-right  wow fadeInUp" data-wow-duration="2s">
                            <h2> ابحث عن مدرس في مدينتك</h2>
                            <p>
                                هذا الخدمة تساعدك على أيجاد أقرب مدرس لك كل ما عليك هو التسجيل فى الموقع وأبدء البحث عن
                                المدرسين , الموقع يتوفر على 150 مدرس من جميع انحاء المدينة .
                            </p>
                            <div class="slider-but">
                                <button class="slid-but-1 hvr-float-shadow">أشترك الان</button>
                                <button class="slid-but-2 hvr-float-shadow">تواصل معنا</button>
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
                    <img src="{{url('images/after.png')}}">
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
                    <button class="slid-but-1 hvr-float-shadow">أشترك الان</button>
                    <button class="slid-but-2 hvr-float-shadow">تواصل معنا</button>
                </div>
            </div>
        </div>
    </section>
    <!--*************************************Details-->

    <!--map*****************************************-->

    <div class="map-map-cors">
        <div class="cors-1  wow fadeInUp" data-wow-duration="2s">
            <p class="cors-right-1"><a href="#"> ابحث عن مدرس فى مدينتك</a></p>
            <select class="selectpicker">
                <option>المرحلة التعليمية</option>
                <option>Ketchup</option>
                <option>Relish</option>
            </select>

            <select class="selectpicker">
                <option>المستوى</option>
                <option>Ketchup</option>
                <option>Relish</option>
            </select>

            <select class="selectpicker">
                <option>المادة</option>
                <option>Ketchup</option>
                <option>Relish</option>
            </select>
            <button class="se">بحث الان</button>

        </div>
    </div>
    <div id="map" style="height: 530px; width: 100%;">

    </div>
    <script type="text/javascript">
        var locations = [
            ['Bondi Beach', -33.890542, 151.274856, 4],
            ['Coogee Beach', -33.923036, 151.259052, 5],
            ['Cronulla Beach', -34.028249, 151.157507, 3],
            ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
            ['Maroubra Beach', -33.950198, 151.259302, 1]
        ];

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: new google.maps.LatLng(-33.92, 151.25),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow();

        var marker, i;

        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map
            });

            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    </script>


    <!--*****************************************map-->

    <!--owl-slider**********************************-->
    <section class="owl-slider">
        <div class="owl-slid">
            <div class="owl-slid-hite text-center">
                <p>كيف تعمل</p>
                <img src="{{url('images/after.png')}}">
            </div>
            <div class="container">
                <div class="owl-carousel">
                    <div class="item  wow fadeInUp" data-wow-duration="2s">
                        <div class="Clients">
                                <span class="Client-img">
                                    <img src="{{url('images/clint.png')}}">
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
                                    <img src="{{url('images/clint.png')}}">
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
                                    <img src="{{url('images/clint.png')}}">
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
                                    <img src="{{url('images/clint.png')}}">
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
                                    <img src="{{url('images/clint.png')}}">
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
                                    <img src="{{url('images/clint.png')}}">
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
