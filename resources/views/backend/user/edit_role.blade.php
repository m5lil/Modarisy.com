@extends('backend.master')

@section('content')

    {{-- @if (\Auth::user()->isAn('admin'))
        {!! \Bouncer::allow('admin')->to([
            'add-post',
            'edit-post',
            'delete-post',
            ]) !!}
    @endif --}}

    {!! Form::model($role, array('route' => ['abilities.update',$role->id], 'method' => 'PATCH', 'class' => 'ui form')) !!}
    		<div class="field">
    			{!! Form::label('name', 'الإسم (Eng & W/out spaces):') !!}
    			{!! Form::text('name') !!}
    		</div>
    		<div class="field">
    			{!! Form::label('title', 'الإسم:') !!}
    			{!! Form::text('title') !!}
    		</div>
    		<div class="field">
                {{-- {{$role->abilities()->pluck('name','name')}} --}}
    			{!! Form::label('abilities', 'التصاريح:') !!}
                {!! Form::select('abilities[]', $abilities, $a, array('id'=>'a', 'class'=>'form-control', 'multiple' => true)) !!}
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

    {!! Form::close() !!}


    @push('scripts')
        <script type="text/javascript">
          $('#a').select2({
            placeholder: "أكتب ياللى بدك إياه",
            // tags : true,
            language: "ar",
            dir: "rtl",
            minimumResultsForSearch: Infinity
          });
        </script>
    @endpush

@endsection
