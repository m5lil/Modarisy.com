@extends('frontend.master')

@section('content')
    <!--slider***************************************-->
    <section class="modarsy-2">
        <section class="slider" style="height: 238px;">
            <div class="slid" style="height: 238px;">
                <div class="container">
                    <div class="row">
                        <div class="li-list">
                            <a href="#" class="conntact-my active">@lang('main.the_teachers') </a>
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
                            <a href="#">@lang('main.search_results')</a>
                        </h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="modarsyy-1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                                @foreach($enquiries as $value)
                                    <div class="col-md-12 col-sm-12 col-xs-12 mix category-3"
                                         style="margin: 10px;background-color: #fff;">
                                        <div class="caarss ">
                                            <h3>
                                                @if($value->user)
                                                <a href="{{url('profile/' . $value->user->id)}}"> {{$value->user->fullName()}}</a>
                                                @endif
                                            </h3>
                                            <p>
                                                @if($value->photo)
                                                    <img src="{{url('/uploads/' . $value->photo)}}" width="90" alt="..." class="img-thumbnail"> &nbsp;&nbsp;
                                                    {{$value->intro}}
                                                @else
                                                    <img src="{{url('/uploads/profile.png')}}" width="90" alt="..." class="img-thumbnail"> &nbsp;&nbsp;
                                                    {{$value->intro}}
                                                @endif
                                            </p>
                                            <hr>
                                            <ul class="list-inline">
                                                <li @if( null == $value->teach_hours) class="hidden" @endif>@lang('main.appropriate_time') <span class="t_hours">{{@PreferedTime($value->teach_hours)}}</span> </li>
                                                <li @if( null == $value->specialty) class="hidden" @endif>@lang('main.speci') <span class="t_hours">{{@spec($value->specialty)}}</span></li>
                                                <li @if( null == $value->dbirth) class="hidden" @endif>@lang('main.age') <span class="t_hours">{{Carbon\Carbon::parse($value->dbirth)->age}}</span> </li>
                                                <li @if( null == $value->hour_rate) class="hidden" @endif><span class="t_hours">{{$value->hour_rate}}</span> @lang('main.hour_rate') </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                                @if ($enquiries instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                    {{$enquiries->links('vendor.pagination.bootstrap-4')}}
                                @endif
                                <!--<div class="text-center">@lang('main.not_fond')</div>-->
                    </div>

                </div>
            </div>

        </section>
    </section>

@endsection
