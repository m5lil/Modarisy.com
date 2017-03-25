@extends('frontend.master')

@section('content')
    <!--slider***************************************-->
    <section class="modarsy-2">
        <section class="with-us text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2>
                            <a href="#">الرسائل الخاصة بـ طلب {{ App\Enquiry::find($enquiry_id)->subject }}</a>
                        </h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="modarsyy-1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="form col-md-12 col-sm-12"
                             style="width: inherit; margin: 10px;background-color: #fff;">

                            {!! Form::open(array('action' => 'MessageController@store', 'method' => 'POST','files' => true)) !!}

                            <input type="hidden" name="enquiry_id" value="{{$enquiry_id}}">

                            <input type="hidden" name="applicant_id" value="{{$applicant_id}}">

                            <textarea name="body" id="" cols="30" rows="10" placeholder="نص الرسالة"></textarea>

                            <input type="file" style="padding: 10px;" name="attached" placeholder="">

                            {!! Form::submit('ارسل') !!}

                            {!! Form::close() !!}
                        </div>

                        @if(isset($messages))
                            @if(count($messages))
                                @foreach($messages as $message)
                                    <div class="col-md-12 col-sm-12 col-xs-12 mix category-3"
                                         style="margin: 10px;background-color:
                                         @if($message->read == 0)
                                                 #dbffd5;
                                                 {{ \App\Message::find($message->id)->update(['read' => 1])}}
                                         @else
                                                 #fff;
                                         @endif

                                                 ">
                                        <div class="caarss ">
                                            <h4>
                                                <a href="{{url('profile/' . $message->user->id)}}"> {{@$message->user->fullName()}}</a>
                                            </h4>
                                            <hr>
                                            <ul class="list-inline">
                                                <li>{{@$message->body}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h2 class="text-center" style="margin-bottom: 150px;">لا توجد رسائل بعد</h2>
                                <br/>
                            @endif

                        @else
                            <h2 class="text-center" style="margin-bottom: 150px;">لا توجد رسائل بعد</h2>
                            <br/>
                        @endif

                    </div>

                </div>
            </div>

        </section>
    </section>







@endsection
