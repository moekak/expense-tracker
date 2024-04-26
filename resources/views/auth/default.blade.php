<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'expense tracker')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('styles')

</head>

<body>
    <div class="loginForm_area">
        <div class="loginForm_container">
            @yield('form')
        </div>
    </div>
</body>

</html>
