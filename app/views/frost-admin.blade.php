@extends('calculator_master')

@section('last_frost')
<h1>Admin Interface</h1>
	
{{ Form::open(array('action' => 'PlantsController@postEnterFrost')) }}
	{{ Form::label('postal_code', 'Enter Postal Code'); }}
	{{ Form::text('postal_code') }}<br /><br />
	{{ Form::label('last_frost_date', 'Enter Frost Date'); }}
	{{ Form::text('last_frost_date') }}<br /><br />
	{{ Form::submit('Enter') }}
{{ Form::close() }}

@stop