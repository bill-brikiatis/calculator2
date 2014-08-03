@extends('calculator_master')

@section('last_frost')
<h1>Take the work out of calculating when to start seedlings or plant seeds in your garden</h1>
<p>Designed for backyard gardeners who live in the northern half of the United States, this web site will help you
	estimate when you should:
	<ul>
		<li>Start vegitable garden seedlings indoors</li>
		<li>Transplant seedlings in the ground</li>
		<li>direct sow seed in your garden</li>  
	</ul>
</p>
<p>If you live in the Northern half of the United States, start by entering your zip code to 
	calculate your last frost date. If you know your last frost date, enter it directly.</p>
	
{{ Form::open(array('url' => 'FindFrostDate.php'))}}
	{{ Form::text('zip_code') }}
	{{ Form::text('last_frost_date') }}
	{{ Form::submit('Calculate') }}
{{ Form::close() }}

@stop