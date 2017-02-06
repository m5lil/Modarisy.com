@extends('backend.master')

@section('content')


    {!! Form::model($user, array('route' => ['users.update',$user->id], 'method' => 'PATCH', 'class' => 'ui form')) !!}
    		<div class="field">
    			{!! Form::label('first_name', 'First_name:') !!}
    			{!! Form::text('first_name') !!}
    		</div>
    		<div class="field">
    			{!! Form::label('last_name', 'Last_name:') !!}
    			{!! Form::text('last_name') !!}
    		</div>
    		<div class="field">
    			{!! Form::label('email', 'Email:') !!}
    			{!! Form::text('email') !!}
    		</div>
    		<div class="field">
    			{!! Form::label('password', 'Password:') !!}
    			{!! Form::text('password') !!}
    		</div>
    		<div class="field">
    			{!! Form::label('role', 'Role:') !!}
    			{!! Form::text('role') !!}
    		</div>
    		<div class="field">
    			{!! Form::label('activated', 'Active:') !!}
    			{!! Form::text('activated') !!}
    		</div>
    		<div class="field">
    			{!! Form::submit() !!}
    		</div>
    {!! Form::close() !!}

@endsection
