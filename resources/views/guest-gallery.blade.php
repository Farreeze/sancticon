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
            <div class="w-full p-5 bg-white bg-opacity-40 rounded-lg shadow-md flex justify-center flex-wrap">
                <div class="w-full text-center">
                    <h2 class="font-bold text-2xl text-black">SACRAMENTS</h2>
                </div>

                {{-- Item Template --}}
                <div class="rounded-lg shadow-md w-64 m-5 p-5 bg-white bg-opacity-40 flex flex-col items-center">
                    <div class="w-full p-3 flex justify-center">
                        <a href="{{route('guest-sacraments.show')}}#anointingofthesick">
                            <img class="h-44 rounded-lg shadow-sm" src="/images/anointing.jpg" alt="Profile Picture" class="w-full h-auto" />
                        </a>
                    </div>
                    <div class="w-full break-words">
                        <h2 class="w-full text-center font-bold text-black">ANOINTING OF THE SICK</h2>
                    </div>
                </div>

                <div class="rounded-lg shadow-md w-64 m-5 p-5 bg-white bg-opacity-40 flex flex-col items-center">
                    <div class="w-full p-3 flex justify-center">
                        <a href="{{route('guest-sacraments.show')}}#baptism">
                            <img class="h-44 rounded-lg shadow-sm" src="/images/baptism.jpg" alt="Profile Picture" class="w-full h-auto" />
                        </a>
                    </div>
                    <div class="w-full break-words">
                        <h2 class="w-full text-center font-bold text-black">BAPTISM</h2>
                    </div>
                </div>

                <div class="rounded-lg shadow-md w-64 m-5 p-5 bg-white bg-opacity-40 flex flex-col items-center">
                    <div class="w-full p-3 flex justify-center">
                        <a href="{{route('guest-sacraments.show')}}#eucharist">
                            <img class="h-44 rounded-lg shadow-sm" src="/images/eucharist.jpg" alt="Profile Picture" class="w-full h-auto" />
                        </a>
                    </div>
                    <div class="w-full break-words">
                        <h2 class="w-full text-center font-bold text-black">EUCHARIST</h2>
                    </div>
                </div>

                <div class="rounded-lg shadow-md w-64 m-5 p-5 bg-white bg-opacity-40 flex flex-col items-center">
                    <div class="w-full p-3 flex justify-center">
                        <a href="{{route('guest-sacraments.show')}}#confirmation">
                            <img class="h-44 rounded-lg shadow-sm" src="/images/confirmation.jpg" alt="Profile Picture" class="w-full h-auto" />
                        </a>
                    </div>
                    <div class="w-full break-words">
                        <h2 class="w-full text-center font-bold text-black">CONFIRMATION</h2>
                    </div>
                </div>

                <div class="rounded-lg shadow-md w-64 m-5 p-5 bg-white bg-opacity-40 flex flex-col items-center">
                    <div class="w-full p-3 flex justify-center">
                        <a href="{{route('guest-sacraments.show')}}#holyorders">
                            <img class="h-44 rounded-lg shadow-sm" src="/images/holyorders.jpg" alt="Profile Picture" class="w-full h-auto" />
                        </a>
                    </div>
                    <div class="w-full break-words">
                        <h2 class="w-full text-center font-bold text-black">HOLY ORDERS</h2>
                    </div>
                </div>

                <div class="rounded-lg shadow-md w-64 m-5 p-5 bg-white bg-opacity-40 flex flex-col items-center">
                    <div class="w-full p-3 flex justify-center">
                        <a href="{{route('guest-sacraments.show')}}#confession">
                            <img class="h-44 rounded-lg shadow-sm" src="/images/confession.jpg" alt="Profile Picture" class="w-full h-auto" />
                        </a>
                    </div>
                    <div class="w-full break-words">
                        <h2 class="w-full text-center font-bold text-black">CONFESSION</h2>
                    </div>
                </div>

                <div class="rounded-lg shadow-md w-64 m-5 p-5 bg-white bg-opacity-40 flex flex-col items-center">
                    <div class="w-full p-3 flex justify-center">
                        <a href="{{route('guest-sacraments.show')}}#matrimony">
                            <img class="h-44 rounded-lg shadow-sm" src="/images/matrimony.jpg" alt="Profile Picture" class="w-full h-auto" />
                        </a>
                    </div>
                    <div class="w-full break-words">
                        <h2 class="w-full text-center font-bold text-black">MATRIMONY</h2>
                    </div>
                </div>
                {{-- Template ends here --}}

            </div>

            <div class="w-full bg-white bg-opacity-40 p-5 rounded-lg shadow-md flex justify-center flex-wrap mt-3">
                <div class="w-full text-center">
                    <h2 class="font-bold text-2xl text-black mb-3">ALBUMS</h2>
                </div>
                @foreach ($albums as $album)
                    <div class="w-72 bg-white bg-opacity-40 rounded-lg m-1 md:m-3 lg:m-3 p-5 flex flex-col shadow-md">
                        <div class="w-full flex justify-center items-center shadow-md">
                            <img class="w-full h-48 object-cover rounded-lg" src="{{ $album->photos->first() ? '/'.$album->photos->first()->photo_id : '/images/no-image.jpg' }}" alt="Album Thumbnail">
                        </div>
                        <div class="w-full flex justify-center items-center mt-3">
                            <h1 class="text-lg font-bold">{{$album->album_title}}</h1>
                        </div>
                        <div class="w-full flex justify-center items-center mt-3">
                            <a class="w-full text-center px-4 py-2 bg-secondary text-white rounded-lg hover:bg-secondary_hover" href="{{route('guest-album.show', $album->id)}}">View Album</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </body>
</html>
