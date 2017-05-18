@extends('frontend.master')

@section('content')
    <!--slider***************************************-->
    <section class="modarsy-2">
        <section class="slider" style="height: 238px;">
            <div class="slid" style="height: 238px;">
                <div class="container">
                    <div class="row">
                        <div class="li-list">
                            <a href="#"
                               class="conntact-my active">@lang('main.messages_of')  {{ App\Enquiry::find($enquiry_id)->subject }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <br>

        <div class="owl-slid-hite text-center">
            <p>@lang('main.messages_of') {{ App\Enquiry::find($enquiry_id)->subject }}</p>
            <img src="{{url('/images/after.png')}}">
        </div>


        <div class="special_messages">

            <div class="container">

                <div class="col-md-8 col-md-offset-2">
                    {!! Form::open(array('action' => 'MessageController@store', 'method' => 'POST','files' => true)) !!}
                    <input type="hidden" name="enquiry_id" value="{{$enquiry_id}}">

                    <input type="hidden" name="applicant_id" value="{{$applicant_id}}">

                    <textarea name="body" placeholder="@lang('main.m_message_text')"></textarea>

                    <div class="file-upload">
                        <label for="upload" class="file-upload__label"><i class="fa fa-image"></i> <span id="file_name">Upload</span> </label>
                        <input id="upload" class="file-upload__input" type="file" name="attached" onchange ="getFileData(this);">
                    </div><!-- file -->

                    <input type="submit" value="@lang('main.send')">
                    </form>


                    @if(isset($messages))
                        @if(count($messages))
                            @foreach($messages as $message)

                                <div class="inner_message"
                                     style="margin: 10px;border:1px solid
                                     @if($message->read == 0)
                                             #eaaa15 !important;
                                             @if(Auth::user()->id == $message->to)
                                     {{ \App\Message::find($message->id)->update(['read' => 1])}}
                                             @endif
                                     @endif

                                             ">

                                <div class="col-md-2">
                                        <i class="fa fa-envelope"></i>
                                    </div><!-- md-3 -->

                                    <div class="col-md-10">
                                        <p>{{@$message->body}}</p>
                                        <div class="bottom_message">
                                            <div class="col-md-8">
                                                <ul>
                                                    <li><i class="fa fa-clock-o"></i> {{ \Date::parse($message->created_at)->diffForHumans() }}</li>
                                                    <li><a href="{{url('profile/' . $message->user->id)}}"><i class="fa fa-user"></i>  {{@$message->user->fullName()}}</a></li>
                                                </ul>
                                            </div><!-- md-8 -->

                                            <div class="col-md-4 red_special">
                                                @if($message->attached)<a class="red_special" href="{{url('uploads/' . $message->attached)}} " download><i class="fa fa-file-zip-o"></i> Download</a>@endif

                                            </div><!-- md-4 -->
                                        </div><!-- bottom_message -->
                                    </div><!-- md-9 -->
                                </div><!-- inner_message -->
                            @endforeach
                        @else
                            <h2 class="text-center" style="margin-bottom: 150px;">@lang('main.m_nothing')</h2>
                            <br/>
                        @endif

                    @else
                        <h2 class="text-center" style="margin-bottom: 150px;">@lang('main.m_nothing')</h2>
                        <br/>
                    @endif


                </div><!-- offset -->

            </div><!-- container -->
        </div>

    </section>




    <script !src="">
        function getFileData(myFile){
            var file = myFile.files[0];
            var filename = file.name;
            document.getElementById('file_name').innerHTML = filename;
        }
    </script>


@endsection
