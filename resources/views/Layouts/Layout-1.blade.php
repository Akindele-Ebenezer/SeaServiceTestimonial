<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/Styles.css') }}">
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image/png">
    <title>@yield('Title')</title>
</head>
<body>
    @yield('Content')
</body>
</html>