@extends('calculator_master')

@section('last_frost')

<h2>Get Started, Enter Your Password Here</h2>

{{ Form::open(array('url' => '/login')) }}
	{{ Form::label('email', 'Enter Your Email'); }}
	{{ Form::text('email') }}<br><br />
	{{ Form::label('Password', 'Enter Password'); }}
	{{ Form::text('Password') }}<br><br />
	{{ Form::submit('Submit') }}
{{ Form::close() }}<br><br>

Need a Password? <a href="create-password">New Users Register Here</a><br><br />

@stop

