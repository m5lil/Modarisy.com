@extends('backend.master')

@section('content')

@if ($user->id == 1 && !$user->isAn('admin'))
    {!!$user->assign('admin')!!}
@endif

@if ($user->can('edit-user'))

{{ Html::ul($errors->all(),['class' => 'ui error message']) }}

    {!! Form::model($user, array('route' => ['users.update',$user->id], 'method' => 'PATCH', 'class' => 'ui form')) !!}
    		<div class="field">
    			{!! Form::label('first_name', 'الإسم الأول:') !!}
    			{!! Form::text('first_name') !!}
    		</div>
    		<div class="field">
    			{!! Form::label('last_name', 'الإسم الأخير:') !!}
    			{!! Form::text('last_name') !!}
    		</div>
    		<div class="field">
    			{!! Form::label('email', 'البريد الإلكترونى:') !!}
    			{!! Form::text('email') !!}
    		</div>
    		<div class="field">
    			{!! Form::label('password', 'الرقم السري:') !!}
    			{!! Form::text('password', '') !!}
    		</div>

            @if ($user->isAn('admin'))
        		<div class="field">
        			{!! Form::label('role', 'الصلاحية:') !!}
                    {!! Form::select('role', Bouncer::role()->pluck('name', 'name'), $user->roles()->pluck('name','name')->toArray(), array('class'=>'form-control')) !!}
        		</div>
        		<div class="field">
        			{!! Form::label('activated', 'Active:') !!}
        			{!! Form::select('activated', [1 => 'مفعل', 0 => 'غير مفعل'], $user->activated, array('class'=>'form-control')) !!}
        		</div>
            @endif

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


@else



    <div class="ui center aligned basic segment">
        <i class="circular massive lock icon"></i>
        <h4>لا تملك التصريح للدخول لهذه الصفحة</h4>
      <div class="ui horizontal divider">
          Access Denied
      </div>
        <p>سيتم تحويلك فى غضون ثوانى</p>
        @push('scripts')
            <script type="text/javascript">
                setTimeout("window.history.go(-1)",4000);
            </script>
        @endpush
    </div>


@endif
@endsection
