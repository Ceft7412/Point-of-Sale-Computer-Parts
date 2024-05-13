<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('assets/images/icon.png') }}">
    @yield('css')
    <link href="{{ asset('dest/css/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet">
</head>
<body>
    @yield('o-content')
    @yield('js')
</body>
</html>
