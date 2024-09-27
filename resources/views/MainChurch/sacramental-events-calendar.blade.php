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
                    <div class="flex w-full justify-between flex-wrap">
                        <div class="flex items-center flex-wrap">
                            <h1 class="font-bold text-2xl text-gray-700 mr-3">Sacramental Calendar</h1>
                            <a class="px-4 py-2 bg-secondary hover:bg-secondary_hover text-white rounded-lg shadow-sm" href="{{ route('sacramental-events-form.show') }}">+ Sacramental Event</a>
                        </div>
                        <div class="flex items-center">
                            <a href="{{route('sacramental-events.show')}}" class="px-4 py-2 bg-secondary hover:bg-secondary_hover text-white rounded-lg shadow-sm">List View</a>
                        </div>
                    </div>
                </div>
                <div class="w-full mt-5 flex flex-col">

                    <div class="w-full" id="calendar"></div>

                </div>
            </div>
        </div>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: @json($events) // Passing events from the controller
            });

            calendar.render();
        });
    </script>

</x-app-layout>
