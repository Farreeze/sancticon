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

                <div class="w-full text-center">
                    <h2 class="font-bold text-2xl text-gray-700">Gallery</h2>
                </div>
                {{-- item template --}}
                <div class="rounded-lg shadow-md w-64 m-5 p-5 bg-gray-300 flex flex-col items-center">
                    <div class="w-full p-3 flex justify-center">
                        <img class="h-44 rounded-lg shadow-sm" src="/images/anointing.jpg" alt="Profile Picture" class="w-full h-auto" />
                    </div>
                    <div class="w-full break-words">
                        <h2 class="w-full text-center font-bold text-gray-700">ANOINTING OF THE SICK</h2>
                    </div>
                </div>

                <div class="rounded-lg shadow-md w-64 m-5 p-5 bg-gray-300 flex flex-col items-center">
                    <div class="w-full p-3 flex justify-center">
                        <img class="h-44 rounded-lg shadow-sm" src="/images/baptism.jpg" alt="Profile Picture" class="w-full h-auto" />
                    </div>
                    <div class="w-full break-words">
                        <h2 class="w-full text-center font-bold text-gray-700">BAPTISIM</h2>
                    </div>
                </div>

                <div class="rounded-lg shadow-md w-64 m-5 p-5 bg-gray-300 flex flex-col items-center">
                    <div class="w-full p-3 flex justify-center">
                        <img class="h-44 rounded-lg shadow-sm" src="/images/eucharist.jpg" alt="Profile Picture" class="w-full h-auto" />
                    </div>
                    <div class="w-full break-words">
                        <h2 class="w-full text-center font-bold text-gray-700">EUCHARIST</h2>
                    </div>
                </div>

                <div class="rounded-lg shadow-md w-64 m-5 p-5 bg-gray-300 flex flex-col items-center">
                    <div class="w-full p-3 flex justify-center">
                        <img class="h-44 rounded-lg shadow-sm" src="/images/confirmation.jpg" alt="Profile Picture" class="w-full h-auto" />
                    </div>
                    <div class="w-full break-words">
                        <h2 class="w-full text-center font-bold text-gray-700">CONFIRMATION</h2>
                    </div>
                </div>

                <div class="rounded-lg shadow-md w-64 m-5 p-5 bg-gray-300 flex flex-col items-center">
                    <div class="w-full p-3 flex justify-center">
                        <img class="h-44 rounded-lg shadow-sm" src="/images/holyorders.jpg" alt="Profile Picture" class="w-full h-auto" />
                    </div>
                    <div class="w-full break-words">
                        <h2 class="w-full text-center font-bold text-gray-700">HOLY ORDERS</h2>
                    </div>
                </div>

                <div class="rounded-lg shadow-md w-64 m-5 p-5 bg-gray-300 flex flex-col items-center">
                    <div class="w-full p-3 flex justify-center">
                        <img class="h-44 rounded-lg shadow-sm" src="/images/confession.jpg" alt="Profile Picture" class="w-full h-auto" />
                    </div>
                    <div class="w-full break-words">
                        <h2 class="w-full text-center font-bold text-gray-700">CONFESSION</h2>
                    </div>
                </div>

                <div class="rounded-lg shadow-md w-64 m-5 p-5 bg-gray-300 flex flex-col items-center">
                    <div class="w-full p-3 flex justify-center">
                        <img class="h-44 rounded-lg shadow-sm" src="/images/matrimony.jpg" alt="Profile Picture" class="w-full h-auto" />
                    </div>
                    <div class="w-full break-words">
                        <h2 class="w-full text-center font-bold text-gray-700">MATRIMONY</h2>
                    </div>
                </div>
                {{-- template ends here --}}
            </div>
            <div class="w-full p-5 bg-white rounded-lg shadow-md flex justify-center flex-wrap mt-3">
                @foreach ($photos as $photo)
                    <div class="w-full max-w-xs m-5 bg-gray-300 p-5 rounded-lg shadow-md flex flex-col items-center">
                        <img class="h-48 rounded-lg mb-4" src="/{{$photo->photo_id}}" alt="">
                        <p class="text-start text-gray-700">{{$photo->caption}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
