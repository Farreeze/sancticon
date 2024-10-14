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
                    <h2 class="w-full text-center font-bold text-2xl text-gray-700">Sacraments</h2>
                </div>

                <div class="w-full rounded-lg shadow-md bg-gray-300 p-5 mt-5">
                    <h2 id="anointingofthesick" class="text-gray-700 font-bold text-xl w-full text-center">ANOINTING OF THE SICK</h2>
                    <p class="mt-3 text-center p-10 text-lg">
                        Anointing of the Sick is a Catholic sacrament for those seriously ill or
                         near death. It involves a priest anointing the person with blessed oil,
                          offering prayers for healing, strength, and peace. It provides spiritual
                           comfort and, if it is God’s will, can aid in physical recovery.
                    </p>
                </div>

                <div class="w-full rounded-lg shadow-md bg-gray-300 p-5 mt-5">
                    <h2 id="baptism" class="text-gray-700 font-bold text-xl w-full text-center">BAPTISM</h2>
                    <p class="mt-3 text-center p-10 text-lg">
                        Baptism is a sacrament of the Catholic Church that uses water
                         to wash away original sin and initiate a person into the Christian
                          faith. It signifies spiritual rebirth and the beginning of a lifelong
                           journey in communion with the Church and its teachings.
                    </p>
                </div>

                <div class="w-full rounded-lg shadow-md bg-gray-300 p-5 mt-5">
                    <h2 id="eucharist" class="text-gray-700 font-bold text-xl w-full text-center">EUCHARIST</h2>
                    <p class="mt-3 text-center p-10 text-lg">
                        Eucharist is a Catholic sacrament where bread and wine are consecrated
                         and received as the body and blood of Christ. It commemorates the Last
                          Supper and provides spiritual nourishment, uniting believers with Christ
                           and the Church community.
                    </p>
                </div>

                <div class="w-full rounded-lg shadow-md bg-gray-300 p-5 mt-5">
                    <h2 id="confirmation" class="text-gray-700 font-bold text-xl w-full text-center">CONFIRMATION</h2>
                    <p class="mt-3 text-center p-10 text-lg">
                        Confirmation is a Catholic sacrament that strengthens
                         and deepens the grace received at Baptism. It involves
                          the anointing with chrism oil and the laying on of hands
                           by a bishop, affirming one's commitment to the Church and
                            receiving the Holy Spirit’s gifts.
                    </p>
                </div>

                <div class="w-full rounded-lg shadow-md bg-gray-300 p-5 mt-5">
                    <h2 id="holyorders" class="text-gray-700 font-bold text-xl w-full text-center">HOLY ORDERS</h2>
                    <p class="mt-3 text-center p-10 text-lg">
                        Holy Orders is a Catholic sacrament through which men are ordained
                         as deacons, priests, or bishops. It involves the laying on of
                          hands and a consecratory prayer, conferring the authority and
                           grace to perform sacred duties and serve the Church.
                    </p>
                </div>

                <div class="w-full rounded-lg shadow-md bg-gray-300 p-5 mt-5">
                    <h2 id="confession" class="text-gray-700 font-bold text-xl w-full text-center">CONFESSION</h2>
                    <p class="mt-3 text-center p-10 text-lg">
                        Confession, or the Sacrament of Reconciliation, is a Catholic
                         sacrament where a person confesses their sins to a priest,
                          receives absolution, and is forgiven. It restores the penitent's
                           relationship with God and the Church, providing spiritual healing
                            and grace.
                    </p>
                </div>

                <div class="w-full rounded-lg shadow-md bg-gray-300 p-5 mt-5">
                    <h2 id="matrimony" class="text-gray-700 font-bold text-xl w-full text-center">MATRIMONY</h2>
                    <p class="mt-3 text-center p-10 text-lg">
                        Matrimony is a Catholic sacrament that unites a man and
                         woman in a lifelong, faithful, and loving marriage. It involves
                          mutual consent and commitment, and is a sign of Christ's love
                           for the Church, intended to strengthen the couple's bond and
                            support them in raising a family.
                    </p>
                </div>
        </div>

        </div>
    </body>
</html>
