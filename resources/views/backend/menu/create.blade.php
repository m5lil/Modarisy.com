@extends('backend.master')

@section('content')

{{ Html::ul($errors->all(),['class' => 'ui error message']) }}

{!! Form::open(array('action' => 'MenuController@store', 'class' => 'ui form')) !!}
        <div class="field">
            <label>الاسم</label>
            {!! Form::text('title', old('title'), array('class'=>'form-control')) !!}
        </div>

        <div class="fields">
            <div class="twelve wide field">
                <label>رابط خارجى</label>
                {!! Form::text('url',  old('url'), array('id'=>'a', 'class'=>'form-control')) !!}
            </div>
            <div class="four wide field">
                <label>رابط من صفحة</label>
                {!! Form::select('url',  \App\Page::pluck('title','slug'), null, array('id'=>'b', 'class'=>'form-control')) !!}
            </div>
        </div>

        <div class="field">
            <label>الترتيب</label>
            {!! Form::text('order', old('order'), array('class'=>'form-control')) !!}
        </div>
        <div class="field">
            {!! Form::select('parent_id', $menus , 0, array('class'=>'form-control')) !!}
        </div>
</div>
<div class="actions">
    <button class="ui black deny button">
        إلغاء
    </button>
    <button type="submit" class="ui positive right labeled icon button">
        حفظ
        <i class="checkmark icon"></i>
    </button>
</div>
{{ Form::close() }}

@push('scripts')
    <script type="text/javascript">
    var dis1 = document.getElementById("a");
    dis1.onchange = function () {
        if (this.value != "" || this.value.length > 0) {
            document.getElementById("b").disabled = true;
        }else {
            document.getElementById("b").disabled = false;
        }
    }
    $(document).ready(function () {
        var dis1 = document.getElementById("a");
        if (dis1.value != "" || dis1.value.length > 0) {
            document.getElementById("b").disabled = true;
        }else {
            document.getElementById("b").disabled = false;
        }
    })
    </script>
@endpush

@endsection
