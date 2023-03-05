<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite('resources/css/app.css')

    <link rel="icon" type="image" href="{{ asset('img/watermefy (2).png') }}">

    <title>{{ ($title) }}</title>
</head>
<body>
    @yield('main')

    @yield('script-home')

    @yield('script-admin-dasboard')

    @yield('script-admin-dropdown')

    <script src="https://kit.fontawesome.com/209072fbdb.js" crossorigin="anonymous"></script>
</body>
</html>