<x-app-layout>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if (Session::has('message'))

    <script>
        swal("SUCCESS", "{{ Session::get('message') }}", 'success',
        {
            button:true,
            button:"OK",
        });
    </script>

    @endif

    <div class="w-full py-5 px-10 flex flex-col md:flex-row lg:flex-row items-start">

        <div class="w-full md:w-[20%] lg:w-[20%] bg-white rounded-lg shadow-lg flex flex-col justify-center p-5">
            <div class="flex justify-center">
                <img class="h-24 w-24" src="/images/church-default-dp.png" alt="Church Logo">
            </div>
            <div class="flex justify-center mt-3">
                <span class="font-bold text-gray-700">{{ Auth::user()->church_name }}</span>
            </div>
        </div>
        <div class="w-full md:w-[80%] lg:w-[80%] md:ml-5 lg:ml-5 mt-3 md:mt-0 lg:mt-0 bg-white rounded-lg p-5 shadow-lg">
            <div class="max-h-screen overflow-y-auto">
                <div class="flex items-center sticky top-0 bg-white z-10">
                    <h1 class="font-bold text-2xl text-gray-700">Sacramental Calendar</h1>
                </div>
                <div class="w-full mt-5 flex flex-col">

                    @if ($sacramental_events->isEmpty())
                        <div class="w-full flex justify-center">
                            <img src="/images/no_data.png" alt="">
                        </div>
                    @endif

                    @foreach ($sacramental_events as $sacramental_event)
                        <div class="w-full bg-gray-300 rounded-lg flex flex-col p-5 mb-3">
                            <div>
                                <div class="flex justify-between w-full flex-wrap mb-2">
                                    <h2 class="text-gray-700 font-bold text-xl">{{ $sacramental_event->sacrament->desc }}</h2>
                                    <div class="flex flex-wrap text-xl text-gray-700">
                                        <span class="font-bold mr-2">Date:</span>
                                        <p>{{$sacramental_event->date}}</p>
                                    </div>
                                </div>
                                @if ($sacramental_event->custom_name)
                                    <div class="flex flex-wrap">
                                        <span class="font-bold mr-2">For:</span>
                                        <p>{{$sacramental_event->custom_name}}</p>
                                    </div>
                                @endif
                                <div class="flex flex-wrap">
                                    <span class="font-bold mr-2">Church:</span>
                                    <p>{{$sacramental_event->church->church_name}}</p>
                                </div>
                                <div class="flex flex-wrap">
                                    <span class="font-bold mr-2">Time:</span>
                                    <p>{{$sacramental_event->start_time}} to {{$sacramental_event->end_time}}</p>
                                </div>
                                <div class="flex flex-wrap">
                                    <span class="font-bold mr-2">Requested by:</span>
                                    @if ($sacramental_event->custom_name)
                                        <p>{{$sacramental_event->user->church_name}}</p>
                                    @else
                                        <p>{{$sacramental_event->user->first_name}} {{$sacramental_event->user->last_name}}</p>
                                    @endif
                                </div>
                                @if ($sacramental_event->participant_name)
                                    <div class="flex flex-wrap">
                                        <span class="font-bold mr-2">Baptismal candidate:</span>
                                        <p>{{$sacramental_event->participant_name}}</p>
                                    </div>
                                @endif
                                @if ($sacramental_event->first_name)
                                    <div class="flex flex-wrap">
                                        <span class="font-bold mr-2">Participant 1:</span>
                                        <p>{{$sacramental_event->first_name}}</p>
                                    </div>
                                @endif
                                @if ($sacramental_event->second_name)
                                    <div class="flex flex-wrap">
                                        <span class="font-bold mr-2">Participant 2:</span>
                                        <p>{{$sacramental_event->second_name}}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
