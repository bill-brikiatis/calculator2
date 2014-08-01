<!DOCTYPE html>
<html>
<head>

    <title>@yield('title_meta', 'Planting Date Calculator')</title>

    <meta charset='utf-8'>
    <link rel='stylesheet' href='{{ asset('css/style.css') }}'>


</head>
<body>
@if(Session::get('flash_message'))
    <div class='flash-message'>{{ Session::get('flash_message') }}</div>
@endif

<h1>Planting Date Calculator</h1>
@yield('last_frost')

</body>

</html>