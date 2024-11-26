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
            <div class="w-full p-5  rounded-lg shadow-md flex justify-center flex-wrap">


                <div class="w-full flex flex-wrap bg-white bg-opacity-40 p-5 rounded-lg">
                    <div class="w-full text-center">
                        <h2 class="font-bold text-2xl text-white mb-5">{{$album->album_title}} Album</h2>
                    </div>
                    @foreach ($photos as $photo)
                        <form method="POST" action="{{route('mainchurch-gallery.destroy', $photo->id)}}" class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-1">
                            @csrf
                            @method('DELETE')
                            <div class="w-full bg-white bg-opacity-40 rounded-lg m-1 p-5 flex flex-col shadow-md">
                                <div class="w-full flex justify-center items-center shadow-md">
                                    <img class="w-full rounded-lg" src="/{{$photo->photo_id}}" alt="">
                                </div>
                                <div class="w-full flex justify-center items-center mt-3">
                                    <h1 class="font-bold">{{$photo->caption}}</h1>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>

            </div>
        </div>

    </body>
</html>
