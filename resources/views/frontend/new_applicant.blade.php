@extends('frontend.master')

@section('content')
    <!--slider***************************************-->
    <section class="modarsy-2">
        <section class="slider" style="height: 238px;">
            <div class="slid" style="height: 238px;">
                <div class="container">
                    <div class="row">
                        <div class="li-list">

                            <a href="#" class="conntact-my active">@lang('main.ap_send_your_offer') </a>
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
                            <a href="#">@lang('main.ap_type_details')</a>
                            <p>@lang('main.ap_this_about') <strong>{{ App\Enquiry::findOrFail($id)->subject }}</strong> @lang('main.ap_student')  <strong>{{ App\Enquiry::findOrFail($id)->user->FullName() }}</strong></p>
                        </h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="modarsyy-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xs-12 col-md-offset-3">
                        <div class="form">
                            {!! Form::open(array('action' => 'ApplicantController@store', 'method' => 'POST')) !!}
                            
                            <input type="hidden" name="enquiry_id" value="{{$id}}">

                            <textarea name="brief" cols="30" rows="10" placeholder=""> </textarea>

                            <label class="label" for="hour_price">@lang('main.p_hour_rate')</label>
                            <input type="number" name="hour_price" value="{{old('hour_price')}}" placeholder="@lang('main.ap_hour_rate') ..">

                            {!! Form::submit(__('main.send')) !!}

                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>
            </div>

        </section>
    </section>







@endsection
