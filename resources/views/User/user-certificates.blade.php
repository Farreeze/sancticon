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
                <span class="font-bold text-gray-700">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span>
            </div>
        </div>
        <div class="w-full md:w-[80%] lg:w-[80%] md:ml-5 lg:ml-5 mt-3 md:mt-0 lg:mt-0 bg-white rounded-lg p-5 shadow-lg">
            <div class="max-h-screen overflow-y-auto">
                <div class="flex items-center sticky top-0 bg-white z-10">
                    <h1 class="font-bold text-2xl text-gray-700">Certificates</h1>
                </div>
                <p class="text-gray-500">ⓘ Only sacramental events added or requested by you will appear in this section.</p>
                <div class="w-full mt-5 flex flex-col">

                    @if ($sacramental_events->isEmpty())
                        <div class="w-full flex justify-center">
                            <img src="/images/no_data.png" alt="">
                        </div>
                    @endif

                    @foreach ($sacramental_events as $sacramental_event)
                        <div class="w-full bg-gray-300 rounded-lg flex flex-col p-3 mb-3">
                            <div class="flex flex-row justify-between flex-wrap items-center">
                                <h2 class="font-bold text-lg text-gray-700">{{$sacramental_event->sacrament->desc}}</h2>
                                <a class="px-4 py-2 rounded-lg bg-positive_btn hover:bg-positive_btn_hover text-white" href="{{ route('certificate.generate', $sacramental_event->id) }}">Download Certificate</a>
                            </div>
                            <div class="flex flex-row flex-wrap">
                                <p class="mr-1 font-bold">Date:</p>
                                <p>{{ $sacramental_event->date }}</p>
                            </div>
                            @if ($sacramental_event->sacrament_id == 1)
                                <div class="flex flex-row flex-wrap">
                                    <p class="mr-1 font-bold">Baptismal Candidate:</p>
                                    <p>{{ $sacramental_event->participant_name }}</p>
                                </div>
                            @endif
                            @if ($sacramental_event->sacrament_id == 7)
                                <div class="flex flex-row flex-wrap">
                                    <p class="mr-1 font-bold">Candidates:</p>
                                    <p>{{ $sacramental_event->first_name }} & {{ $sacramental_event->second_name }}</p>
                                </div>
                            @endif
                            <div class="flex flex-row flex-wrap">
                                <p class="mr-1 font-bold">Church:</p>
                                <p>{{ $sacramental_event->church->church_name }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
