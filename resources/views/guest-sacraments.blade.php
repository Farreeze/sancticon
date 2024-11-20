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
                <div class="w-full flex flex-col items-center justify-center">
                    <h2 class="text-center font-bold text-2xl text-black">Sacraments Offered</h2>
                    <p class="text-black mt-2">ⓘ Click a Sacrament for Guidelines and requirements.</p>
                </div>

                <div class="flex flex-wrap justify-center">
                    <div class="w-72 rounded-lg shadow-md bg-white bg-opacity-40 mt-5 pt-3 mx-3">
                        <a href="{{route('guest-baptism-req.show', 5)}}">
                            <h2 id="anointingofthesick" class="text-black font-bold text-xl w-full text-center">Anointing of the Sick</h2>
                        </a>
                        <p class="mt-3 text-center p-10 text-lg text-black">
                            Anointing of the Sick is a Catholic sacrament for those seriously ill or near death. It involves a priest anointing the person with blessed oil, offering prayers for healing, strength, and peace. It provides spiritual comfort and, if it is God’s will, can aid in physical recovery.
                        </p>
                    </div>

                    <div class="w-72 rounded-lg shadow-md bg-white bg-opacity-40 mt-5 pt-3 mx-3">
                        <a href="{{route('guest-baptism-req.show', 1)}}">
                            <h2 id="baptism" class="text-black font-bold text-xl w-full text-center">Baptism</h2>
                        </a>
                        <p class="mt-3 text-center p-10 text-lg text-black">
                            Baptism is a sacrament of the Catholic Church that uses water to wash away original sin and initiate a person into the Christian faith. It signifies spiritual rebirth and the beginning of a lifelong journey in communion with the Church and its teachings.
                        </p>
                    </div>

                    <div class="w-72 rounded-lg shadow-md bg-white bg-opacity-40 mt-5 pt-3 mx-3">
                        <a href="{{route('guest-baptism-req.show', 3)}}">
                            <h2 id="eucharist" class="text-black font-bold text-xl w-full text-center">Eucharist</h2>
                        </a>
                        <p class="mt-3 text-center p-10 text-lg text-black">
                            Eucharist is a Catholic sacrament where bread and wine are consecrated and received as the body and blood of Christ. It commemorates the Last Supper and provides spiritual nourishment, uniting believers with Christ and the Church community.
                        </p>
                    </div>

                    <div class="w-72 rounded-lg shadow-md bg-white bg-opacity-40 mt-5 pt-3 mx-3">
                        <a href="{{route('guest-baptism-req.show', 2)}}">
                            <h2 id="confirmation" class="text-black font-bold text-xl w-full text-center">Confirmation</h2>
                        </a>
                        <p class="mt-3 text-center p-10 text-lg text-black">
                            Confirmation is a Catholic sacrament that strengthens and deepens the grace received at Baptism. It involves the anointing with chrism oil and the laying on of hands by a bishop, affirming one's commitment to the Church and receiving the Holy Spirit’s gifts.
                        </p>
                    </div>

                    <div class="w-72 rounded-lg shadow-md bg-white bg-opacity-40 mt-5 pt-3 mx-3">
                        <a href="{{route('guest-baptism-req.show', 8)}}">
                            <h2 id="holyorders" class="text-black font-bold text-xl w-full text-center">Holy Orders</h2>
                        </a>
                        <p class="mt-3 text-center p-10 text-lg text-black">
                            Holy Orders is a Catholic sacrament through which men are ordained as deacons, priests, or bishops. It involves the laying on of hands and a consecratory prayer, conferring the authority and grace to perform sacred duties and serve the Church.
                        </p>
                    </div>

                    <div class="w-72 rounded-lg shadow-md bg-white bg-opacity-40 mt-5 pt-3 mx-3">
                        <a href="{{route('guest-baptism-req.show', 9)}}">
                            <h2 id="confession" class="text-black font-bold text-xl w-full text-center">Confession</h2>
                        </a>
                        <p class="mt-3 text-center p-10 text-lg text-black">
                            Confession, or the Sacrament of Reconciliation, is a Catholic sacrament where a person confesses their sins to a priest, receives absolution, and is forgiven. It restores the penitent's relationship with God and the Church, providing spiritual healing and grace.
                        </p>
                    </div>

                    <div class="w-72 rounded-lg shadow-md bg-white bg-opacity-40 mt-5 pt-3 mx-3">
                        <a href="{{route('guest-baptism-req.show', 6)}}">
                            <h2 id="matrimony" class="text-black font-bold text-xl w-full text-center">Matrimony</h2>
                        </a>
                        <p class="mt-3 text-center p-10 text-lg text-black">
                            Matrimony is a Catholic sacrament that unites a man and woman in a lifelong, faithful, and loving marriage. It involves mutual consent and commitment and is a sign of Christ's love for the Church, intended to strengthen the couple's bond and support them in raising a family.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
