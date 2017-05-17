@extends('frontend.master')

@section('content')
    <!--slider***************************************-->
    <section class="modarsy-2">
        <section class="slider" style="height: 238px;">
            <div class="slid" style="height: 238px;">
                <div class="container">
                    <div class="row">
                        <div class="li-list">

                            <a href="#" class="conntact-my active">@lang('main.offers') </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <br>
        <br>

        <div class="owl-slid-hite text-center">
            <p>@lang('main.offers')</p>
            <img src="{{url('/images/after.png')}}">
        </div>



        <div class="comming_offers">
            <div class="container">
                <div class="col-md-10 col-md-offset-1">
                    @if(count($applicants))
                        @foreach($applicants as $value)
                            <div class="inner_offers">
                                <a href="{{url('profile/' . $value->user->id)}}"><h3>{{$value->user->fullName()}}</h3></a>
                                <div class="text">{{@$value->brief}}</div><!-- text -->
                                <div class="bottom">
                                    <div class="col-md-2">
                                        <a data-toggle="tooltip" data-placement="top" title="@lang('main.y_c_msg')" href="{{ url('/messages/' . $enquiry_id . '/' . $value->id) }}"><i
                                                    class="fa fa-envelope"></i>
                                            <span>{{ count(\App\Message::where('enquiry_id',$enquiry_id)->where('read', 0)->where('applicant_id', $value->id)->get()) }}</span></a>
                                    </div><!-- md-2 -->

                                    <div class="col-md-8">
                                        ( ${{@$value->hour_price}} ) @lang('main.hour_rate')
                                    </div><!-- md-9 -->

                                    <div class="col-md-2">
                                        @if(\App\Enquiry::find($enquiry_id)->statue != 2)
                                            <a href="{{ url('/applicant/accept/' . $enquiry_id . '/' . $value->id) }}"><i class="fa fa-check-circle"></i> @lang('main.accept')</a>
                                        @endif
                                    </div><!-- md-3 -->
                                </div><!-- bottom -->
                            </div><!-- inner_offers -->
                        @endforeach
                    @else
                    <div class="text-center">@lang('main.not_fond')</div>
                    @endif

                </div><!-- offset -->
            </div><!-- container -->
        </div>


    </section>


@endsection
