@extends('backend.master')

@section('content')
    <h4 class="ui horizontal divider">
        <h2>خصائص الموقع</h2>
    </h4>
    <hr />

{!! Form::open(['action' => 'SettingController@update', 'method' => 'post' ,'class' => 'ui form']) !!}
    @foreach ($settings as $setting)
        <div class="field">
            <label>{{ $setting->set_slug }} : </label>
        @if($setting->type == 1)
              {!! Form::text($setting->set_name, $setting->value , ['class' => 'form-control']) !!}
            @elseif($setting->type == 2)
              {!! Form::textarea($setting->set_name, $setting->value , ['class' => 'form-control']) !!}
            @elseif($setting->type == 3)
              {!! Form::text($setting->set_name, $setting->value , ['class' => 'form-control']) !!}
            @endif
        </div>
    @endforeach
    <div class="field">
        <input type="submit" name="submit" value="حفظ" class="ui teal button">
    </div>

{!! Form::close() !!}

@endsection
