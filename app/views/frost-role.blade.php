@extends('calculator_master')

@section('last_frost')
	
<h2>Calculate Your Last Frost Date</h2>
	
{{ Form::open(array('url' => 'frost'))}}
	{{ Form::label('zip_code', 'Enter Your Postal Code'); }}
	{{ Form::text('zip_code') }}<br><br>
	{{ Form::submit('Calculate') }}
{{ Form::close() }}

<h2><a href="/frost-admin">Click Here for Admin</a></h2>


@stop