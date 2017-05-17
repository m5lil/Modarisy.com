@extends('frontend.master')

@section('content')
    @if($post)
    <!--slider***************************************-->
    <section class="slider" style="height: 238px;">
        <div class="slid" style="height: 238px;">
            <div class="container">
                <div class="row">
                    <div class="li-list">

                        <a href="#" class="conntact-my active"> {{ $post->title }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="with-us">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2>
                        <a href="#"></a>
                    </h2>
                    <br>
                    @if($post->photo)

                    @endif
                    {!! $post->body !!}
                </div>
            </div>
        </div>
    </section>

    <div class="questions">
        <div class="container">
            <div class="col-md-12 pull-left">
                <div class="inner">
                    <div class="col-md-3">
                        <img class="img-responsive" src="{{url('/uploads/') . '/' .$post->photo }}" alt="">
                    </div><!-- md-3 -->

                    <div class="col-md-9">
                        <h3>ما هو تطبيق مدرسى</h3>
                        <div class="text">
                            هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي  ...
                        </div><!-- text -->


                        <div class="time">
                            <i class="fa fa-clock-o"></i> منذ 3 دقائق
                        </div><!-- time -->

                    </div><!-- md-9 -->
                </div><!-- inner -->
            </div><!-- md-12 -->
        </div><!-- container -->
    </div>

    @else
        <section class="slider" style="height: 238px;">
            <div class="slid" style="height: 238px;">
                <div class="container">
                    <div class="row">
                        <div class="li-list">

                            <a href="#" class="conntact-my active">صفحة غير موجوده</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endif



@endsection
