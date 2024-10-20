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
    <body class="font-sans text-gray-900 antialiased bg-no-repeat bg-cover bg-center" style="background-image: url('/images/bg/bg1.jpg');">
        @include('layouts.guest-navigation')

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">

            <div>
                <a href="/">
                    <img class="h-62" src="/images/icon.png" alt="">
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white opacity-80 shadow-md overflow-hidden sm:rounded-lg mb-3">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
