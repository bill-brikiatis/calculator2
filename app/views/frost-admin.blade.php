@extends('frost')

@section('admin_frost')

<h1>Admin Interface</h1>

<h2>Enter a Postal Code / Last Frost Date</h2>

{{ Form::open(array('action' => 'PlantsController@postEnterFrost')) }}
	{{ Form::label('postal_code', 'Enter Postal Code'); }}
	{{ Form::text('postal_code') }}<br /><br />
	{{ Form::label('last_frost_date', 'Enter Frost Date'); }}
	{{ Form::text('last_frost_date') }}<br /><br />
	{{ Form::submit('Enter') }}
{{ Form::close() }}<br /><br />


<h2>Register an Admin Password with Role</h2>

{{ Form::open(array('url' => 'create-password')) }}
	{{ Form::label('email', 'Enter Your Email'); }}
	{{ Form::text('email') }}<br><br />
	{{ Form::label('Password', 'Enter Password'); }}
	{{ Form::text('Password') }}<br><br />
	{{ Form::label('gardener_Role', 'Enter Role'); }}
	{{ Form::text('gardener_Role') }}<br><br />
	{{ Form::submit('Submit') }}
{{ Form::close() }}<br />

@stop

