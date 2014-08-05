@extends('calculator_master')

@section('last_frost')

@yield('admin_frost')

<p>If you live in the northern half of the United States, start by entering your postal code to 
	calculate your last frost date. If you don't live in the northern half of the U.S., this isn't for you.</p>
	
<h2>Calculate Your Last Frost Date</h2>
	
{{ Form::open(array('method' => 'POST', 'action' => 'PlantsController@postFrost')) }}
	<div class="form-group">
		{{ Form::label('postal_code', 'Enter Your Postal Code'); }}
		{{ Form::text('postal_code') }}<br><br>
		{{ Form::submit('Calculate') }}
	</div>
{{ Form::close() }}

@stop
