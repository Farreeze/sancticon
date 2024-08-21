<x-app-layout>

    <div class="w-full py-5 px-10 flex flex-col md:flex-row lg:flex-row items-start">
        <div class="w-full md:w-[20%] lg:w-[20%] bg-white rounded-lg shadow-lg">
            <div class="w-full flex flex-col justify-center p-5">
                <div class="flex justify-center">
                    <img class="h-24 w-24" src="/images/church-default-dp.png" alt="">
                </div>
                <div class="flex justify-center mt-3">
                    @if (Auth::user()->user == 1)
                    <span class="font-bold text-gray-700">{{Auth::user()->first_name}}</span>
                    @endif
                    @if (Auth::user()->user == 0)
                    <span class="font-bold text-gray-700">{{Auth::user()->church_name}}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="w-full md:ml-5 lg:ml-5 mt-3 md:mt-0 lg:mt-0 bg-white rounded-lg p-5 shadow-lg">
            @if (Auth::user()->sub_church == 1)
                <div class="w-full max-h-screen overflow-y-auto">
                    <div class="flex items-center sticky top-0 bg-white">
                        <h1 class="font-bold text-2xl text-gray-700">Current Events</h1>
                    </div>
                    <div class="w-full mt-5">
                        <div class="flex flex-col">

                            @if ($events->isEmpty())
                                <div class="w-full flex justify-center">
                                    <img src="/images/no_data.png" alt="">
                                </div>
                            @endif

                            @foreach ($events as $event)
                                <div class="w-full bg-gray-300 rounded-lg flex flex-col p-5 mb-3">
                                    <div class="w-full">
                                        <div class="mb-1 flex justify-between flex-wrap">
                                            <h1 class="text-gray-700 font-bold text-2xl">{{ $event->title }}</h1>
                                        </div>
                                        <div class="flex flex-col">
                                            @if ($event->sacrament_id)
                                                <div class="flex flex-wrap">
                                                    <span class="text-gray-700 font-bold">Sacrament:</span>
                                                    <span class="text-gray-700 ml-1">{{$event->sacrament->desc}}</span>
                                                </div>
                                            @endif
                                            <div class="flex flex-wrap">
                                                <span class="text-gray-700 font-bold">Date:</span>
                                                <span class="text-gray-700 ml-1">{{$event->date}}</span>
                                            </div>
                                            <div class="flex flex-wrap">
                                                <span class="text-gray-700 font-bold">Time:</span>
                                                <span class="text-gray-700 ml-1">{{$event->start_time}} - {{$event->end_time}}</span>
                                            </div>
                                            <div class="flex flex-wrap">
                                                <span class="text-gray-700 font-bold">Location:</span>
                                                <span class="text-gray-700 ml-1">{{$event->location}}</span>
                                            </div>
                                            <div class="flex flex-wrap">
                                                <span class="text-gray-700 font-bold">Description:</span>
                                                <span class="text-gray-700 ml-1">{{$event->desc}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

</x-app-layout>
