@extends('calculator_master')

@section('last_frost')
<h2>Take the Work Out of Calculating <small>when to start seedlings or plant seeds in your garden</small></h2>
		<div class="col-md-8">
		<p>Designed for backyard gardeners who live in the northern half of the United States, this web site will
		tell you when you can put plants out in the spring with less chance of frost. If you already have a password,
		you can start by entering it. If not, you can create one.</p>
		</div><!--.col-md-8-->
<a href="/login"><button type="button" class="btn btn-success  btn-lg">Start Here</button></a>
<div class="col-md-8"><p>If you are already logged in, logout <a href="/logout">here</a>.</p></div>

@stop