<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gray-100">
        @include('layouts.guest-navigation')

        <div class="w-full h-screen flex flex-col justify-center items-center flex-wrap">

            <div class="flex flex-wrap">
                <div class="text-7xl text-gray-700 text-center md:text-end lg:text-end">
                    <p>WELCOME</p>
                    <p>To</p>
                    <p>SacntIcon</p>
                </div>
                <div class="flex items-center">
                    <div class="border-l-2 border-gray-300 h-52 mx-2"></div>
                    <img class="w-3/4" src="/images/icon.png" alt="">
                </div>
            </div>

            <div class="mt-10 text-gray-700">
                <p class="p-5 text-xl">Welcome to SanctIcon, your portal for exploring the beauty of faith and sacraments.
                     Our mission is to provide a sacred space for spiritual growth and community connection
                </p>
            </div>

        </div>

    </body>
</html>
