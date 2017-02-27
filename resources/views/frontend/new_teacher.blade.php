{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('gen_exp', 'Gen_exp:') !!}
			{!! Form::text('gen_exp') !!}
		</li>
		<li>
			{!! Form::label('sch_exp', 'Sch_exp:') !!}
			{!! Form::text('sch_exp') !!}
		</li>
		<li>
			{!! Form::label('teach_time', 'Teach_time:') !!}
			{!! Form::text('teach_time') !!}
		</li>
		<li>
			{!! Form::label('teach_hours', 'Teach_hours:') !!}
			{!! Form::text('teach_hours') !!}
		</li>
		<li>
			{!! Form::label('hour_rate', 'Hour_rate:') !!}
			{!! Form::text('hour_rate') !!}
		</li>
		<li>
			{!! Form::label('intro', 'Intro:') !!}
			{!! Form::textarea('intro') !!}
		</li>
		<li>
			{!! Form::label('gender', 'Gender:') !!}
			{!! Form::text('gender') !!}
		</li>
		<li>
			{!! Form::label('school', 'School:') !!}
			{!! Form::text('school') !!}
		</li>
		<li>
			{!! Form::label('user_id', 'User_id:') !!}
			{!! Form::text('user_id') !!}
		</li>
		<li>
			{!! Form::label('dbirth', 'Dbirth:') !!}
			{!! Form::text('dbirth') !!}
		</li>
		<li>
			{!! Form::label('age', 'Age:') !!}
			{!! Form::text('age') !!}
		</li>
		<li>
			{!! Form::label('hear', 'Hear:') !!}
			{!! Form::textarea('hear') !!}
		</li>
		<li>
			{!! Form::label('lang', 'Lang:') !!}
			{!! Form::text('lang') !!}
		</li>
		<li>
			{!! Form::label('level', 'Level:') !!}
			{!! Form::text('level') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}
