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
                    <h2 class="font-bold text-2xl text-white">News and Announcements</h2>
                </div>
                {{-- foreach here --}}
                @foreach ($newsAndAnnouncements as $newsAndAnnouncement)
                    <div class="w-full bg-white bg-opacity-20 rounded-lg flex flex-col p-5 mt-3">
                        <div>
                            <div class="flex flex-row justify-between items-center">
                                <h2 class="text-white font-bold text-xl">{{ $newsAndAnnouncement->title }}</h2>
                            </div>
                            <p class="text-white max-w-full whitespace-normal break-words mt-3">{{ $newsAndAnnouncement->desc }}</p>
                            <div class="flex flex-row mt-3">
                                <p class="text-white max-w-full whitespace-normal break-words font-bold">Date:</p>
                                <p class="text-white max-w-full whitespace-normal break-words ml-3">{{ $newsAndAnnouncement->date }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
