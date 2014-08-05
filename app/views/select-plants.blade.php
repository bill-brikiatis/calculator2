@extends('calculator_master')

@section('last_frost')

@if ($last_frost !=NULL)
<h2>Your Last Frost Date is {{ $last_frost }}</h2>
@else
<h2>{{ "Unfortunately we did not have your postal_code in the system." }}</h2>
@endif

<p>Please select the plants you would like to grow in order to calculate your planting dates.</p>

@stop
