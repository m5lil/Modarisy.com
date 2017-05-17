@extends('frontend.master')

@section('content')

    <section class="modarsyy-1">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12 col-xs-offset-3">
                    <div class="form">
                        {!! Form::open(array('action' => 'InboxController@contact', 'method' => 'POST')) !!}
                        @if(!Auth::check())
                            <label class="label">@lang('main.y_name')</label>
                            {!! Form::text('name',null,['placeholder' => __('main.y_name')]) !!}
                            <label class="label">@lang('main.y_email')</label>
                            {!! Form::email('email',null,['placeholder' => __('main.y_email')]) !!}

                            <label class="label">@lang('main.y_phone')</label>
                            {!! Form::text('phone',null,['placeholder' => __('main.y_phone')]) !!}
                        @endif
                        <label class="label">@lang('main.y_subject')</label>
                        {!! Form::text('subject',null,['placeholder' => __('main.y_subject')]) !!}
                        {!! Form::textarea('body',null,['placeholder' => __('main.y_body')]) !!}

                        {!! Form::submit(__('main.y_send')) !!}

                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>

    </section>

@endsection