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
                            <a href="#" class="conntact-my active">تقدم بعرضك </a>
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
                            <a href="#">أكتب بيانات عرضك الذى تريد تقديمة</a>
                            <p>هذا العرض بخصوص طلب بعنوان <strong>{{ App\Lecture::findOrFail($id)->subject }}</strong> للطالب  <strong>{{ App\Lecture::findOrFail($id)->user->FullName() }}</strong></p>
                        </h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="modarsyy-1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="form">
                            {!! Form::open(array('action' => 'ApplicantController@store', 'method' => 'POST')) !!}
                            
                            <input type="hidden" name="lecture_id" value="{{$id}}">

                            <textarea name="brief" id="" cols="30" rows="10" placeholder="ملاحظات"></textarea>

                            <input type="text" name="hour_price" placeholder="سعر الساعة الذى تريده بالدولار ..">

                            {!! Form::submit('طلب') !!}

                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>
            </div>

        </section>
    </section>







@endsection
