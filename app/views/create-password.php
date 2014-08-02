@extends('calculator_master')

@section('last_frost')
<h1>Register a Password</h1>

{{ Form::open(array('url' => 'create-password.php',
	'action' = 'PlantsController@postCreatePassword')) }}
	{{ Form::label('email', 'Enter Your Email'); }}
	{{ Form::text('email') }}<br><br />
	{{ Form::label('Password', 'Enter Password'); }}
	{{ Form::text('Password') }}<br><br />
	{{ Form::submit('Submit') }}
{{ Form::close() }}

@stop
