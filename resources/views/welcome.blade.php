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
    <body class="font-sans text-gray-900 antialiased bg-no-repeat bg-cover bg-center min-h-screen" style="background-image: url('/images/bg/bg1.jpg');">
        @include('layouts.guest-navigation')

        <div class="w-full flex flex-col justify-center items-center p-5 md:pt-20 lg:pt-20">

            <div class="flex flex-wrap mt-20">
                <div class="text-7xl text-center md:text-end lg:text-end text-white">
                    <p>WELCOME</p>
                    <p>To</p>
                    <p>SanctiCon</p>
                </div>
                <div class="flex items-center">
                    <div class="border-l-2 border-gray-300 h-52 mx-4"></div>
                    <img class="w-3/4" src="/images/icon.png" alt="">
                </div>
            </div>

            <div class="mt-10 text-white text-center">
                <p class="p-5 text-xl">Welcome to SanctiCon, your portal for exploring the beauty of faith and sacraments.
                     Our mission is to provide a sacred space for spiritual growth and community connection.
                </p>
                <p class="p-5 text-lg text-white">Explore our sacraments, join us for events, request certificates, and stay updated with the latest news and announcements.</p>
            </div>

        </div>

    </body>
</html>
