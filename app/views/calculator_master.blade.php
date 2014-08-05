<!DOCTYPE html>
<html>
<head>

    <title>@yield('title_meta', 'Last Frost Date')</title>

    <meta charset='utf-8'>
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">


</head>
<body>
	<div class="container">
		@if(Session::get('flash_message'))
		<div class='alert-success'>{{ Session::get('flash_message') }}</div>
		@endif
		
		<h1>Last Frost Date Calculator</h1>
		@yield('last_frost')
		
			<!-- Latest compiled and minified JavaScript -->
			<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</div><!--.container-fluid-->
</body>

</html>

