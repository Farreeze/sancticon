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
            <div class="w-full p-5 bg-white rounded-lg shadow-md">
                <div>
                    <h2 class="font-bold text-2xl text-gray-700">Priests</h2>
                </div>
                @foreach ($priests as $priest)
                    <div class="mt-3 w-full bg-gray-300 rounded-lg p-5">
                        <div class="flex flex-col items-center">

                            @if (!$priest->photo_id)
                                <img class="w-32 h-32 rounded-full mb-5" src="/images/default-dp.png" alt="">
                            @else
                                <img class="w-32 h-32 rounded-full mb-5" src="/{{$priest->photo_id}}" alt="">
                            @endif

                            <div class="flex">
                                <p class="text-lg text-gray-700 font-bold mr-1">{{ $priest->first_name }}</p>
                                <p class="text-lg text-gray-700 font-bold mr-1">{{ $priest->middle_name }}</p>
                                <p class="text-lg text-gray-700 font-bold mr-1">{{ $priest->last_name }}</p>
                                @if ($priest->suffix_name != 10 && $priest->suffix_name != null)
                                    <p class="text-lg text-gray-700 font-bold mr-1">{{ $priest->suffix->desc }}</p>
                                @endif
                            </div>

                            <p class="mt-1 font-bold text-md text-gray-700">{{$priest->title}}</p>
                            <p class="mt-1 font-bold text-md text-gray-700">{{$priest->church->church_name}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
