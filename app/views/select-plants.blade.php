@extends('calculator_master')

@section('last_frost')

<h2>The Last Frost Date for Your Postal Code is
<span class="bg-info">{{ $last_frost }}</span></h2>
<br />
<a href="/"><button type="button" class="btn btn-success  btn-lg">Start Again</button></a>
@stop
