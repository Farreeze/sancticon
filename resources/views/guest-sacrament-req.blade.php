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
    <body class="font-sans text-gray-800 bg-cover bg-center min-h-screen" style="background-image: url('/images/bg/bg1.jpg');">
        @include('layouts.guest-navigation')

        <div class="flex justify-center items-center min-h-screen p-4">
            <div class="w-full max-w-lg p-6 bg-white bg-opacity-70 rounded-lg shadow-lg">
                <h2 class="text-center font-semibold text-2xl text-gray-800 mb-4">{{$sacrament_req->sacrament_desc}} Requirements</h2>
                <div class="space-y-4 text-gray-700">
                    <div>
                        <h3 class="font-medium text-lg">Requirements:</h3>
                        <p class="mt-2">{{$sacrament_req->desc}}</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
