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

    @if (Session::has('delete'))

    <script>
        swal("SUCCESS", "{{ Session::get('delete') }}", 'success',
        {
            button:true,
            button:"OK",
        });
    </script>

    @endif

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
        <div class="w-full md:ml-5 lg:ml-5 mt-3 md:mt-0 lg:mt-0 bg-white rounded-lg p-5 shadow-lg">
            @if (Auth::user()->main_church)
                <div class="w-full max-h-screen overflow-y-auto">
                    <div class="flex items-center sticky top-0 bg-white">
                        <h1 class="font-bold text-2xl text-gray-700">Events</h1>
                        <a class="ml-3 px-4 py-2 bg-secondary text-white rounded-lg hover:bg-secondary_hover" href="{{route('add-event-form.show')}}">+ Add Event</a>
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
                                            <h1 class="text-gray-700 font-bold text-xl">{{ $event->title }}</h1>
                                            <div class="flex">
                                                <form class="mr-3" id="delete_form" action="{{ route('delete-event', $event->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="px-4 py-2 bg-negative_btn hover:bg-negative_btn_hover text-white rounded-lg" type="submit" onclick="confirmation(event)">Cancel Event</button>
                                                </form>
                                                <form action="{{ route('finish-event', $event->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button class="px-4 py-2 bg-positive_btn hover:bg-positive_btn_hover text-white rounded-lg" type="submit">Finish Event</button>
                                                </form>
                                            </div>
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
                <hr class="border-t border-gray-300 my-4">
                <div class="w-full max-h-screen overflow-y-auto">
                    <div class="flex items-center sticky top-0 bg-white">
                        <h1 class="font-bold text-2xl text-gray-700">Finished Events</h1>
                    </div>
                    <div class="w-full mt-5">
                        <div class="flex flex-col">

                            @if ($finished_events->isEmpty())
                                <div class="w-full flex justify-center">
                                    <img src="/images/no_data.png" alt="">
                                </div>
                            @endif

                            @foreach ($finished_events as $finished_event)
                                <div class="w-full bg-gray-300 rounded-lg flex flex-col p-5 mb-3">
                                    <div class="w-full">
                                        <div class="mb-1 flex justify-between">
                                            <h1 class="text-gray-700 font-bold text-2xl">{{ $finished_event->title }}</h1>
                                        </div>
                                        <div class="flex flex-col">
                                            @if ($finished_event->sacrament_id)
                                                <div class="flex flex-wrap">
                                                    <span class="text-gray-700 font-bold">Sacrament:</span>
                                                    <span class="text-gray-700 ml-1">{{$finished_event->sacrament->desc}}</span>
                                                </div>
                                            @endif
                                            <div class="flex flex-wrap">
                                                <span class="text-gray-700 font-bold">Date:</span>
                                                <span class="text-gray-700 ml-1">{{$finished_event->date}}</span>
                                            </div>
                                            <div class="flex flex-wrap">
                                                <span class="text-gray-700 font-bold">Time:</span>
                                                <span class="text-gray-700 ml-1">{{$finished_event->start_time}} - {{$finished_event->end_time}}</span>
                                            </div>
                                            <div class="flex flex-wrap">
                                                <span class="text-gray-700 font-bold">Location:</span>
                                                <span class="text-gray-700 ml-1">{{$finished_event->location}}</span>
                                            </div>
                                            <div class="flex flex-wrap">
                                                <span class="text-gray-700 font-bold">Description:</span>
                                                <span class="text-gray-700 ml-1">{{$finished_event->desc}}</span>
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

    <script>
        function confirmation(ev) {
            var delete_form = document.getElementById("delete_form");
            ev.preventDefault();
            var urlToRedirect = delete_form.getAttribute('action');
            console.log(urlToRedirect);
            swal({
                title: "Are you sure to cancel this event?",
                text: "You will not be able to revert this!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willCancel) => {
                if (willCancel) {
                    delete_form.submit();
                }
            });
        }
  </script>

</x-app-layout>
