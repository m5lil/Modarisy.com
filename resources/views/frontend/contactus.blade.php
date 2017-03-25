@extends('frontend.master')

@section('content')

    <section class="modarsyy-1">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="form">
                        {!! Form::open(array('route' => 'inbox.store', 'method' => 'POST')) !!}
                        @if(!Auth::check())
                        {!! Form::text('name',null,['placeholder' => 'إسمك الكريم']) !!}
                        {!! Form::text('email',null,['placeholder' => 'البريد الإلكترونى']) !!}
                        {!! Form::text('phone',null,['placeholder' => 'الجوال']) !!}
                        @endif
                        {!! Form::text('subject',null,['placeholder' => 'عنوان الرسالة']) !!}
                        {!! Form::textarea('body',null,['placeholder' => 'مضمون الرسالة']) !!}

                        {!! Form::submit('إرسل') !!}



                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>

    </section>

@endsection