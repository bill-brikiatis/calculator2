@extends('calculator_master')

@section('last_frost')

@yield('admin_frost')
<br />

<p>If you live in the northern half of the United States, start by entering your zip code to 
	calculate your last frost date. If you live northern half of the U.S., this isn't for you.</p>
	
<h2>Calculate Your Last Frost Date</h2>
	
{{ Form::open(array('method' => 'POST', 'action' => 'PlantsController@postFrost')) }}

	{{ Form::label('postal_code', 'Enter Your Postal Code'); }}
	{{ Form::text('postal_code') }}<br><br>
	{{ Form::submit('Calculate') }}
{{ Form::close() }}

@stop
