<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="icon" type="image" href="{{ asset('img/watermefy (2).png') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            
            <div class="bg-slate-50 w-[500px] {{ (Request::is('admin') ? 'py-16' : '') }} {{ (Request::is('forgot-password') ? 'py-14' : '') }} {{ (Request::is('admin/register') ? 'py-10' : '') }} {{ (Request::is('reset-password*') ? 'py-14' : '') }} flex flex-col justify-center items-center rounded-md border border-slate-300">
                <a href="/"><img src="{{ asset('img/watermefy-2.png') }}" alt="Logo" class="w-64 mb-10"></a>

                {{ $slot }}
            </div>
        </div>
    </body>
</html>
