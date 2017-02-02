@extends('backend.master')

@section('content')

{!! Form::model($menu, ['method' => 'PATCH','route' => ['menu.update', $menu->id], 'class' => 'ui form']) !!}
        <div class="field">
            <label>الاسم</label>
            {!! Form::text('title', old('title'), array('class'=>'form-control')) !!}
        </div>

        <div class="field">
            <label>الرابط</label>
            {!! Form::select('url',  \App\Page::pluck('title','slug'), null, array('id'=>'a', 'class'=>'form-control')) !!}
        </div>

        <div class="field">
            <label>الترتيب</label>
            {!! Form::text('order', old('order'), array('class'=>'form-control')) !!}
        </div>
        <div class="field">
            {!! Form::select('parent_id', $menus , null, array('class'=>'form-control')) !!}
        </div>
</div>
<div class="actions">
    <a onClick="window.history.back()" class="ui black deny button">
        إلغاء
    </a>
    <button type="submit" class="ui positive right labeled icon button">
        حفظ
        <i class="checkmark icon"></i>
    </button>
</div>
{{ Form::close() }}

@endsection
