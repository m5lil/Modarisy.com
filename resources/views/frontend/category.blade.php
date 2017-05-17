@extends('frontend.master')

@section('content')
    @if($posts)
    <!--slider***************************************-->
    <section class="slider" style="height: 238px;">
        <div class="slid" style="height: 238px;">
            <div class="container">
                <div class="row">
                    <div class="li-list">

                        <a href="#" class="conntact-my active">{{ $category_name }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="questions">
        <div class="container">
            <div class="col-md-12 pull-left">
                @foreach($posts as $value)

                <div class="inner">

                    <div class="col-md-3">
                        @if($value->photo)
                            <img src="{{url('/uploads/') . '/' .$value->photo }}">
                        @else
                            <img src="{{url('images/default.jpg')}}">
                        @endif

                    </div><!-- md-3 -->

                    <div class="col-md-9">
                        <h3> <a href="{{url('post/' . $value->id)}}"> {{$value->title}}</a></h3>
                        <div class="text">{{ str_limit(strip_tags($value->body), 150, '...') }}</div><!-- text -->


                        <div class="time">
                            <i class="fa fa-clock-o"></i> {{ \Date::parse($value->created_at)->diffForHumans() }}
                        </div><!-- time -->

                    </div><!-- md-9 -->
                </div><!-- inner -->
                @endforeach

            </div><!-- md-12 -->
        </div><!-- container -->
    </div>
    @else
        <section class="slider" style="height: 238px;">
            <div class="slid" style="height: 238px;">
                <div class="container">
                    <div class="row">
                        <div class="li-list">

                            <a href="#" class="conntact-my active">Ooooops, Nothing Here</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endif



@endsection
