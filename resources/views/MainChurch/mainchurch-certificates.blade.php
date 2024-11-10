<x-app-layout>

    <div class="w-full py-5 px-10 flex flex-col md:flex-row lg:flex-row items-start">
        <div class="w-full md:w-[20%] lg:w-[20%] bg-white rounded-lg shadow-lg">
            <div class="w-full flex flex-col justify-center p-5">
                <div class="flex justify-center">
                    <img class="h-24 w-24" src="/images/church-default-dp.png" alt="">
                </div>
                <div class="flex justify-center mt-3">
                    <span class="font-bold text-gray-700">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span>
                </div>
            </div>
        </div>
        <div class="w-full md:w-[80%] lg:w-[80%] md:ml-5 lg:ml-5 mt-3 md:mt-0 lg:mt-0 bg-white rounded-lg p-5 shadow-lg">
            <div class="max-h-screen overflow-y-auto">
                <div class="flex items-center sticky top-0 bg-white z-10">
                    <h1 class="font-bold text-2xl text-gray-700">Certificates</h1>
                </div>
                <p class="text-gray-500">ⓘ Only sacramental events added or requested by admin will appear here.</p>
                <div class="w-full mt-5 flex flex-col">

                    @if ($events->isEmpty())
                        <div class="w-full flex justify-center">
                            <img src="/images/no_data.png" alt="">
                        </div>
                    @endif

                    @foreach ($events as $event)
                        <div class="w-full bg-gray-300 rounded-lg flex flex-col p-3 mb-3">
                            <div class="flex flex-row justify-between flex-wrap items-center">
                                <h2 class="font-bold text-lg text-gray-700">{{$event->sacrament->desc}}</h2>
                                <a class="px-4 py-2 rounded-lg bg-positive_btn hover:bg-positive_btn_hover text-white" href="{{ route('main-church-certificate.generate', $event->id) }}">Download Certificate</a>
                            </div>
                            @if ($event->custom_name)
                                <div class="flex flex-row flex-wrap">
                                    <p class="mr-1 font-bold">For:</p>
                                    <p>{{ $event->custom_name }}</p>
                                </div>
                            @endif
                            <div class="flex flex-row flex-wrap">
                                <p class="mr-1 font-bold">Date:</p>
                                <p>{{ $event->date }}</p>
                            </div>
                            @if ($event->sacrament_id == 1)
                                <div class="flex flex-row flex-wrap">
                                    <p class="mr-1 font-bold">Baptismal Candidate:</p>
                                    <p>{{ $event->participant_name }}</p>
                                </div>
                            @endif
                            @if ($event->sacrament_id == 7)
                                <div class="flex flex-row flex-wrap">
                                    <p class="mr-1 font-bold">Candidates:</p>
                                    <p>{{ $event->first_name }} & {{ $event->second_name }}</p>
                                </div>
                            @endif
                            <div class="flex flex-row flex-wrap">
                                <p class="mr-1 font-bold">Church:</p>
                                <p>{{ $event->church->church_name }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
