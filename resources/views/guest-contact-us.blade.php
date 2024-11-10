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

        <div class="w-full p-7">
            <div class="w-full p-5 bg-white bg-opacity-40 rounded-lg shadow-md">
                <div>
                    <h2 class="w-full text-center font-bold text-2xl text-black">Contact Us</h2>
                </div>

                <div class="w-full flex flex-col items-center">
                    @foreach ($churches as $church)
                        <div class="w-full bg-white bg-opacity-40 rounded-lg shadow-md p-5 mt-3 text-center">
                            <h2 class="text-black font-bold text-2xl">{{$church->church_name}}</h2>
                            <p class="font-bold text-lg text-black mt-5">Church Email</p>
                            <p class="text-black">{{$church->email}}</p>
                            <p class="font-bold text-lg text-black mt-3">Church Phone</p>
                            <p class="text-black">{{$church->mobile_number}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </body>
</html>
