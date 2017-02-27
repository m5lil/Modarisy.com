@extends('backend.master')

@section('content')
    <h4 class="ui horizontal divider">
        خصائص الموقع
    </h4>

{!! Form::open(['action' => 'SettingController@update', 'method' => 'post' ,'class' => 'ui form']) !!}
    @foreach ($settings as $setting)
        <div class="field">
            <label style="color: teal;">{{ $setting->set_slug }} : </label>
        @if($setting->type == 1)
              {!! Form::text($setting->set_name, $setting->value , ['class' => 'form-control']) !!}
            @elseif($setting->type == 2)
              {!! Form::textarea($setting->set_name, $setting->value , ['class' => 'form-control']) !!}
            @elseif($setting->type == 3)
              {!! Form::text($setting->set_name, $setting->value , ['class' => 'form-control']) !!}
            @endif
        </div>
        <br />
    @endforeach
    <div class="field">
        <input type="submit" name="submit" value="حفظ" class="ui teal button">
    </div>

{!! Form::close() !!}

@endsection
