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

        <div class="w-full p-7">
            <div class="w-full p-5 bg-white rounded-lg shadow-md flex justify-center flex-wrap">

                <div class="w-full text-start">
                    <h2 class="font-bold text-2xl text-gray-700">Gallery</h2>
                </div>
                {{-- item template --}}
                <div class="rounded-lg shadow-md w-64 m-5 p-5 bg-gray-300 flex flex-col items-center">
                    <div class="w-full p-3">
                        <img src="/images/default-dp.png" alt="Profile Picture" class="w-full h-auto" />
                    </div>
                    <div class="w-full break-words">
                        <p>
                            testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest
                        </p>
                    </div>
                </div>
                {{-- template ends here --}}
            </div>
        </div>
    </body>
</html>
