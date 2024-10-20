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
                    <h2 class="font-bold text-2xl text-white">Events</h2>
                </div>
                @foreach ($events as $event)
                    <div class="mt-3 w-full bg-gray-300 rounded-lg flex flex-col p-5">
                        <div class="w-full">
                            <div class="mb-1 flex justify-between flex-wrap">
                                <h1 class="text-white font-bold text-2xl">{{ $event->title }}</h1>
                            </div>
                            <div class="flex flex-col">
                                @if ($event->sacrament_id)
                                    <div class="flex flex-wrap">
                                        <span class="text-white font-bold">Sacrament:</span>
                                        <span class="text-white ml-1">{{$event->sacrament->desc}}</span>
                                    </div>
                                @endif
                                <div class="flex flex-wrap">
                                    <span class="text-white font-bold">Date:</span>
                                    <span class="text-white ml-1">{{$event->date}}</span>
                                </div>
                                <div class="flex flex-wrap">
                                    <span class="text-white font-bold">Time:</span>
                                    <span class="text-white ml-1">{{$event->start_time}} - {{$event->end_time}}</span>
                                </div>
                                <div class="flex flex-wrap">
                                    <span class="text-white font-bold">Location:</span>
                                    <span class="text-white ml-1">{{$event->location}}</span>
                                </div>
                                <div class="flex flex-wrap">
                                    <span class="text-white font-bold">Description:</span>
                                    <span class="text-white ml-1">{{$event->desc}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
