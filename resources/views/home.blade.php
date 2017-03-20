@extends('frontend.master')

@section('content')
    <!--slider***************************************-->
    <section class="slider" style="height: 238px;">
        <div class="slid"  style="height: 238px;     padding: 40px 0px;">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-xs-12">
                        <a class="send-mas" href="#">ارسال رساله</a>
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
                                <img class="slid-detils" src="{{url('/uploads/' . @Auth::user()->profile->photo)}}" alt="thumbnail">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="slid-detils-wright">
                                <h2> أ / {{ Auth::user()->fullName() }}</h2>
                                <p> المدينة <span class="detils-p-2">: {{ Auth::user()->city }} </span></p>
                                <p> التقييم <span class="detils-p-2">:تاجر</span></p>
                            </div>
                        </div>

                    </div>
                    <p> الخبرات <span class="detils-p-2">:10 سنوات </span></p>
                    <hr>
                    <p> اللغات <span class="detils-p-2">:عربي  , انجليزى </span></p>
                    <hr>
                    <p> الدرجه العلميه <span class="detils-p-2">: مدرس اول</span></p>
                    <hr>
                    <p> السن <span class="detils-p-2">: 40 عام</span></p>
                    <hr>
                    <h2 class="dede-h2">رسالة سريعة</h2>
                    <input type="text" placeholder="الاسم">
                    <textarea>

                    </textarea>
                    <input type="number"  >
                    <label>
                        <input type="checkbox"> تحديدالعنصر
                    </label>
                    <button>ارسال طلب</button>
                </div>
                <div class="col-md-8">
                    <div class="last-mod-arsy">
                        <div class="about-teatcher">
                            <h2>تعرف على</h2>

                            <p>هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر </p>
                        </div>

                        <div class="Request">
                            <div class="advertising1-car-1">
                                <div class="row">
                                    <div class="col-md-4 col-sm-2 col-xs-12 ">
                                        <button class="bot-1 filter active" data-filter=".category-1"> <i class="fa fa-bars" aria-hidden="true"></i>  اخر الطلبات  </button>
                                    </div>
                                    <div class="col-md-4 col-sm-2 col-xs-12 ">
                                        <button class="bot-2 filter " data-filter=".category-2"> <i class="fa fa-wpforms" aria-hidden="true"></i>
                                            جاري العمل علية</button>
                                    </div>
                                    <div class="col-md-4 col-sm-2 col-xs-12 ">
                                        <button class="bot-3 filter " data-filter=".category-3"><i class="fa fa-check-circle" aria-hidden="true"></i>

                                            تم تنفيذها </button>
                                    </div>

                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="advertising2-car-2">
                            <div class="row"  id="Container">
                                <div class="col-md-12 col-sm-12 col-xs-12 mix category-1" data-bound="" >
                                    <div class="caarss ">

                                        <h3><a href="#"> عنوان كبير</a></h3>
                                        <p>هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق ...</p>
                                        <hr>
                                        <ul class="list-inline">
                                            <li>5$ / hr</li>
                                            <li>التقييم : <span><i class="fa fa-star-o" aria-hidden="true"></i>
<i class="fa fa-star-o" aria-hidden="true"></i>
<i class="fa fa-star-o" aria-hidden="true"></i>
<i class="fa fa-star-o" aria-hidden="true"></i>

										<i class="fa fa-star-o" aria-hidden="true"></i>
</span></li>
                                            <li><a href="#">الطالب : <span>عمرو محمد</span></a></li>
                                            <li>عدد الساعات : <span>15 ساعة</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 mix category-1" data-bound="" >
                                    <div class="caarss ">

                                        <h3><a href="#"> عنوان كبير</a></h3>
                                        <p>هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق ...</p>
                                        <hr>
                                        <ul class="list-inline">
                                            <li>5$ / hr</li>
                                            <li>التقييم : <span><i class="fa fa-star-o" aria-hidden="true"></i>
<i class="fa fa-star-o" aria-hidden="true"></i>
<i class="fa fa-star-o" aria-hidden="true"></i>
<i class="fa fa-star-o" aria-hidden="true"></i>

										<i class="fa fa-star-o" aria-hidden="true"></i>
</span></li>
                                            <li><a href="#">الطالب : <span>عمرو محمد</span></a></li>
                                            <li>عدد الساعات : <span>15 ساعة</span></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 mix category-2" data-bound="" >
                                    <div class="caarss ">

                                        <h3><a href="#"> عنوان كبير</a></h3>
                                        <p>هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق ...</p>
                                        <hr>
                                        <ul class="list-inline">
                                            <li>5$ / hr</li>
                                            <li>التقييم : <span><i class="fa fa-star-o" aria-hidden="true"></i>
<i class="fa fa-star-o" aria-hidden="true"></i>
<i class="fa fa-star-o" aria-hidden="true"></i>
<i class="fa fa-star-o" aria-hidden="true"></i>

										<i class="fa fa-star-o" aria-hidden="true"></i>
</span></li>
                                            <li><a href="#">الطالب : <span>عمرو محمد</span></a></li>
                                            <li>عدد الساعات : <span>15 ساعة</span></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 mix category-2" data-bound="" >
                                    <div class="caarss ">

                                        <h3><a href="#"> عنوان كبير</a></h3>
                                        <p>هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق ...</p>
                                        <hr>
                                        <ul class="list-inline">
                                            <li>5$ / hr</li>
                                            <li>التقييم : <span><i class="fa fa-star-o" aria-hidden="true"></i>
<i class="fa fa-star-o" aria-hidden="true"></i>
<i class="fa fa-star-o" aria-hidden="true"></i>
<i class="fa fa-star-o" aria-hidden="true"></i>

										<i class="fa fa-star-o" aria-hidden="true"></i>
</span></li>
                                            <li><a href="#">الطالب : <span>عمرو محمد</span></a></li>
                                            <li>عدد الساعات : <span>15 ساعة</span></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 mix category-3" data-bound="" >
                                    <div class="caarss ">

                                        <h3><a href="#"> عنوان كبير</a></h3>
                                        <p>هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق ...</p>
                                        <hr>
                                        <ul class="list-inline">
                                            <li>5$ / hr</li>
                                            <li>التقييم : <span><i class="fa fa-star-o" aria-hidden="true"></i>
<i class="fa fa-star-o" aria-hidden="true"></i>
<i class="fa fa-star-o" aria-hidden="true"></i>
<i class="fa fa-star-o" aria-hidden="true"></i>

										<i class="fa fa-star-o" aria-hidden="true"></i>
</span></li>
                                            <li><a href="#">الطالب : <span>عمرو محمد</span></a></li>
                                            <li>عدد الساعات : <span>15 ساعة</span></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 mix category-3" data-bound="" >
                                    <div class="caarss ">

                                        <h3><a href="#"> عنوان كبير</a></h3>
                                        <p>هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق ...</p>
                                        <hr>
                                        <ul class="list-inline">
                                            <li>5$ / hr</li>
                                            <li>التقييم : <span><i class="fa fa-star-o" aria-hidden="true"></i>
<i class="fa fa-star-o" aria-hidden="true"></i>
<i class="fa fa-star-o" aria-hidden="true"></i>
<i class="fa fa-star-o" aria-hidden="true"></i>

										<i class="fa fa-star-o" aria-hidden="true"></i>
</span></li>
                                            <li><a href="#">الطالب : <span>عمرو محمد</span></a></li>
                                            <li>عدد الساعات : <span>15 ساعة</span></li>
                                        </ul>
                                    </div>
                                </div>




                            </div>
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
                            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم  أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم ....</p>
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
                            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم  أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم ....</p>
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
                            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم  أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم ....</p>
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
                            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم  أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم ....</p>
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
                            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم  أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم ....</p>
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
                            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم  أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم ....</p>
                            <i class="fa fa-comments" aria-hidden="true"></i>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!--**********************************owl-slider-->
@endsection
