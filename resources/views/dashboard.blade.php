<x-app-layout>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if (Session::has('superadmindelete'))

    <script>
        swal("SUCCESS", "{{ Session::get('superadmindelete') }}", 'success',
        {
            button:true,
            button:"OK",
        });
    </script>

    @endif

    @if (Session::has('delete-reservation'))

    <script>
        swal("SUCCESS", "{{ Session::get('delete-reservation') }}", 'success',
        {
            button:true,
            button:"OK",
        });
    </script>

    @endif

    @if (Session::has('sub-church-cancel-reservation'))

    <script>
        swal("SUCCESS", "{{ Session::get('sub-church-cancel-reservation') }}", 'success',
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
                    @if (Auth::user()->superadmin == 1)
                        <span class="font-bold text-gray-700">{{Auth::user()->first_name}}</span>
                    @endif
                    @if (Auth::user()->user == 1)
                        <span class="font-bold text-gray-700">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span>
                    @endif
                    @if (Auth::user()->sub_church == 1)
                        <span class="font-bold text-gray-700">{{Auth::user()->church_name}}</span>
                    @endif
                    @if (Auth::user()->main_church == 1)
                        <div class="flex flex-col w-full items-center">
                            <span class="font-bold text-gray-700">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span>
                            <a class="text-center mt-10 px-4 py-2 w-full bg-secondary hover:bg-secondary_hover rounded-lg text-white" href="{{route('add-admin-form.show')}}">+ Admin</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="w-full md:ml-5 lg:ml-5 mt-3 md:mt-0 lg:mt-0 bg-white rounded-lg p-5 shadow-lg">

            @if (Auth::user()->superadmin == 1)
                <div class="w-full">
                    <div class="flex items-center">
                        <div class="w-full flex justify-between items-center mb-5 flex-wrap">
                            <h1 class="font-bold text-2xl text-gray-700">Users</h1>
                            <div>
                                <form method="GET" action="{{route('user.search')}}">
                                    @csrf
                                    <input class="rounded-lg border-gray-300" type="text" name="text" id="" placeholder="Search keyword" required>
                                    <button class="px-4 py-2 rounded-lg bg-gray-800 hover:bg-gray-700 text-white ml-1" type="submit">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="w-full overflow-auto">
                        <table class="w-full border-collapse border border-gray-300">
                            <thead class="bg-gray-300">
                                <tr class="text-start">
                                    <th class="text-start px-4 py-2 border border-gray-300">Name</th>
                                    <th class="text-start px-4 py-2 border border-gray-300">Email</th>
                                    <th class="text-start px-4 py-2 border border-gray-300">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="bg-gray-50 hover:bg-gray-100">
                                        <td class="text-start px-4 py-2 border border-gray-300">
                                            {{ $user->first_name }} {{ $user->middle_name ?? '' }} {{ $user->last_name }}
                                        </td>
                                        <td class="text-start px-4 py-2 border border-gray-300">{{ $user->email }}</td>
                                        <td class="text-start px-4 py-2 border border-gray-300">
                                            <div class="flex flex-wrap">
                                                <a class="bg-gray-800 mx-1 px-2 py-1 text-white rounded-lg hover:bg-gray-700" href="{{route('user-profile.show', $user->id)}}">View</a>
                                                <a class="bg-yellow-500 mx-1 px-2 py-1 text-white rounded-lg hover:bg-yellow-700" href="{{route('edit-user-profile.show', $user->id)}}">Update</a>
                                                <a class="bg-red-500 mx-1 px-2 py-1 text-white rounded-lg hover:bg-red-700" href="{{route('user-profile-delete.show', $user->id)}}">Delete</a>
                                                {{-- <form method="POST" action="{{route('superadmin-user.delete', $user->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="bg-red-500 mx-1 px-2 py-1 text-white rounded-lg hover:bg-red-700">Delete</button>
                                                </form> --}}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="w-full mt-5">
                        {{$users->links()}}
                    </div>
                </div>
            @endif

            {{-- main church dashboard --}}
            @if (Auth::user()->main_church == 1)
                <div class="w-full">
                    <div class="flex items-center">
                        <h1 class="font-bold text-2xl text-gray-700">Chapels</h1>
                        <a class="ml-3 px-4 py-2 bg-secondary text-white rounded-lg hover:bg-secondary_hover" href="{{route('add-church-form.show')}}">+ Chapel</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full border border-gray-300 rounded-lg overflow-hidden mt-5">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="text-start p-3 border-b border-gray-300">Church Name</th>
                                    <th class="text-start p-3 border-b border-gray-300">Church Email</th>
                                    <th class="text-start p-3 border-b border-gray-300">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($churches as $church)
                                <tr class="hover:bg-gray-50">
                                    <td class="text-start p-3 border-b border-gray-300">{{$church->church_name}}</td>
                                    <td class="text-start p-3 border-b border-gray-300">{{$church->email}}</td>
                                    <td class="text-start p-3 border-b border-gray-300">
                                        <div class="flex">
                                            <a class="bg-secondary hover:bg-secondary_hover px-2 py-1 rounded-lg text-white" href="{{route('church-profile.show', $church->id)}}">View</a>
                                            {{-- <form action="{{route('delete-church', $church->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 px-2 py-1 rounded-lg text-white">Delete</button>
                                            </form> --}}
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if ($churches->isEmpty())
                            <div class="w-full flex justify-center">
                                <img src="/images/no_data.png" alt="">
                            </div>
                        @endif

                    </div>
                </div>
            @endif

            {{-- sub church dashboard --}}
            @if (Auth::user()->sub_church == 1)

                <div class="w-full max-h-screen overflow-auto">
                    <div class="flex items-center w-full sticky top-0 bg-white">
                        <h2 class="font-bold text-gray-700 text-2xl">{{Auth::user()->church_name}} Sacramental Reservations</h2>
                        <a class="px-4 py-2 rounded-lg bg-secondary hover:bg-secondary_hover text-white ml-3" href="{{ route('sub-church-sacramental-event-form.show') }}">+ Request</a>
                    </div>
                    <p class="text-gray-500">ⓘ Walk-In requests are stored here.</p>

                    @if ($sacramental_reservations->isEmpty())
                        <div class="w-full flex justify-center">
                            <img src="/images/no_data.png" alt="">
                        </div>
                    @endif

                    @foreach ($sacramental_reservations as $sacramental_reservation)
                        <form action="{{ route('sub-church-sacramental-reservation.delete', $sacramental_reservation->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="w-full p-3 bg-gray-300 mt-3 rounded-lg">
                                <div class="flex flex-row justify-between flex-wrap items-center">
                                    <h2 class="font-bold text-lg text-gray-700">{{$sacramental_reservation->sacrament->desc}}</h2>
                                    <button class="px-4 py-2 rounded-lg bg-negative_btn hover:bg-negative_btn_hover text-white" type="submit">Cancel</button>
                                </div>
                                @if ($sacramental_reservation->custom_name)
                                    <div class="flex flex-row flex-wrap">
                                        <p class="mr-1 font-bold">For:</p>
                                        <p>{{ $sacramental_reservation->custom_name }}</p>
                                    </div>
                                @endif
                                <div class="flex flex-row flex-wrap">
                                    <p class="mr-1 font-bold">Date:</p>
                                    <p>{{ $sacramental_reservation->date }}</p>
                                </div>
                                <div class="flex flex-row flex-wrap">
                                    <p class="mr-1 font-bold">Time:</p>
                                    <p>{{ $sacramental_reservation->start_time }}  to {{ $sacramental_reservation->end_time }}</p>
                                </div>
                                @if ($sacramental_reservation->sacrament_id == 1)
                                    <div class="flex flex-row flex-wrap">
                                        <p class="mr-1 font-bold">Baptismal Candidate:</p>
                                        <p>{{ $sacramental_reservation->participant_name }}</p>
                                    </div>
                                @endif
                                @if ($sacramental_reservation->sacrament_id == 7)
                                    <div class="flex flex-row flex-wrap">
                                        <p class="mr-1 font-bold">Candidates:</p>
                                        <p>{{ $sacramental_reservation->first_name }} & {{ $sacramental_reservation->second_name }}</p>
                                    </div>
                                @endif
                                <div class="flex flex-row flex-wrap">
                                    <p class="mr-1 font-bold">Church:</p>
                                    <p>{{ $sacramental_reservation->church->church_name }}</p>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
                <hr class="border-t border-gray-300 my-4">
                <div class="w-full max-h-screen overflow-auto">
                    <div class="w-full sticky top-0 bg-white">
                        <h2 class="font-bold text-gray-700 text-2xl">Approved Sacramental Events</h2>
                    </div>

                    @if ($approved_sacramental_events->isEmpty())
                        <div class="w-full flex justify-center">
                            <img src="/images/no_data.png" alt="">
                        </div>
                    @endif

                    @foreach ($approved_sacramental_events as $approved_sacramental_event)
                        <div class="w-full p-3 bg-gray-300 mt-3 rounded-lg">
                            <div class="flex flex-row justify-between flex-wrap items-center">
                                <h2 class="font-bold text-lg text-gray-700">{{$approved_sacramental_event->sacrament->desc}}</h2>
                                <p class="px-4 py-2 rounded-lg bg-positive_btn hover:bg-positive_btn_hover text-white">Approved</p>
                            </div>
                            @if ($approved_sacramental_event->custom_name)
                                <div class="flex flex-row flex-wrap">
                                    <p class="mr-1 font-bold">For:</p>
                                    <p>{{ $approved_sacramental_event->custom_name }}</p>
                                </div>
                            @endif
                            <div class="flex flex-row flex-wrap">
                                <p class="mr-1 font-bold">Date:</p>
                                <p>{{ $approved_sacramental_event->date }}</p>
                            </div>
                            <div class="flex flex-row flex-wrap">
                                <p class="mr-1 font-bold">Time:</p>
                                <p>{{ $approved_sacramental_event->start_time }} to {{ $approved_sacramental_event->end_time }}</p>
                            </div>
                            @if ($approved_sacramental_event->sacrament_id == 1)
                                <div class="flex flex-row flex-wrap">
                                    <p class="mr-1 font-bold">Baptismal Candidate:</p>
                                    <p>{{ $approved_sacramental_event->participant_name }}</p>
                                </div>
                            @endif
                            @if ($approved_sacramental_event->sacrament_id == 7)
                                <div class="flex flex-row flex-wrap">
                                    <p class="mr-1 font-bold">Candidates:</p>
                                    <p>{{ $approved_sacramental_event->first_name }} & {{ $approved_sacramental_event->second_name }}</p>
                                </div>
                            @endif
                            <div class="flex flex-row flex-wrap">
                                <p class="mr-1 font-bold">Church:</p>
                                <p>{{ $approved_sacramental_event->church->church_name }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr class="border-t border-gray-300 my-4">
                <div class="w-full max-h-screen overflow-auto">
                    <div class="w-full sticky top-0 bg-white">
                        <h2 class="font-bold text-gray-700 text-2xl">Completed Sacramental Events</h2>
                    </div>

                    @if ($completed_sacramental_reservations->isEmpty())
                        <div class="w-full flex justify-center">
                            <img src="/images/no_data.png" alt="">
                        </div>
                    @endif

                    @foreach ($completed_sacramental_reservations as $completed_sacramental_reservation)
                        <div class="w-full p-3 bg-gray-300 mt-3 rounded-lg">
                            <div class="flex flex-row justify-between flex-wrap items-center">
                                <h2 class="font-bold text-lg text-gray-700">{{$completed_sacramental_reservation->sacrament->desc}}</h2>
                                @if ($completed_sacramental_reservation->status == 2)
                                    <p class="px-4 py-2 rounded-lg bg-positive_btn text-white">Finished</p>
                                @endif
                                @if ($completed_sacramental_reservation->status == 3)
                                    <p class="px-4 py-2 rounded-lg bg-negative_btn text-white">Cancelled</p>
                                @endif
                            </div>
                            @if ($completed_sacramental_reservation->custom_name)
                                <div class="flex flex-row flex-wrap">
                                    <p class="mr-1 font-bold">For:</p>
                                    <p>{{ $completed_sacramental_reservation->custom_name }}</p>
                                </div>
                            @endif
                            <div class="flex flex-row flex-wrap">
                                <p class="mr-1 font-bold">Date:</p>
                                <p>{{ $completed_sacramental_reservation->date }}</p>
                            </div>
                            <div class="flex flex-row flex-wrap">
                                <p class="mr-1 font-bold">Time:</p>
                                <p>{{ $completed_sacramental_reservation->start_time }}  to {{ $completed_sacramental_reservation->end_time }}</p>
                            </div>
                            @if ($completed_sacramental_reservation->sacrament_id == 1)
                                <div class="flex flex-row flex-wrap">
                                    <p class="mr-1 font-bold">Baptismal Candidate:</p>
                                    <p>{{ $completed_sacramental_reservation->participant_name }}</p>
                                </div>
                            @endif
                            @if ($completed_sacramental_reservation->sacrament_id == 7)
                                <div class="flex flex-row flex-wrap">
                                    <p class="mr-1 font-bold">Candidates:</p>
                                    <p>{{ $completed_sacramental_reservation->first_name }} & {{ $completed_sacramental_reservation->second_name }}</p>
                                </div>
                            @endif
                            <div class="flex flex-row flex-wrap">
                                <p class="mr-1 font-bold">Church:</p>
                                <p>{{ $completed_sacramental_reservation->church->church_name }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

            @endif

            {{-- user dashboard --}}
            @if (Auth::user()->user == 1)
                {{-- <div class="w-full text-gray-700 font-bold text-2xl">
                    <h3>Your Requests</h3>
                </div>
                <div class="w-full">

                </div> --}}
                <div class="w-full max-h-screen overflow-auto">
                    <div class="w-full flex items-center sticky top-0 bg-white mb-3">
                        <h2 class="font-bold text-gray-700 text-2xl">Sacramental Reservations</h2>
                        <a class="bg-secondary hover:bg-secondary_hover px-4 py-2 rounded-lg text-white ml-3" href="{{route('sacramental-reservation-form.show')}}">+ Request</a>
                    </div>

                    @if ($sacramental_reservations->isEmpty())
                        <div class="w-full flex justify-center">
                            <img src="/images/no_data.png" alt="">
                        </div>
                    @endif

                    @foreach ($sacramental_reservations as $sacramental_reservation)
                        <form action="{{ route('cancel-reservation', $sacramental_reservation->id) }}" method="POST" onsubmit="disableButton({{$sacramental_reservation->id}})">
                            @csrf
                            @method('DELETE')
                            <div class="bg-gray-300 mt-3 p-3 rounded-lg">
                                <div class="flex flex-row justify-between flex-wrap-reverse">
                                    <div>
                                        <div class="flex items-center mb-3">
                                            <h2 class="font-bold text-lg text-gray-700">{{$sacramental_reservation->sacrament->desc}}</h2>
                                            @if ($sacramental_reservation->status === null && $sacramental_reservation->subchurch_approve !== 0)
                                                <div class="ml-3">
                                                    <p class="px-4 py-1 bg-yellow-500 text-white rounded-lg shadow-md">Pending</p>
                                                </div>
                                            @endif
                                        </div>
                                        <div>
                                            <span>Church:</span>
                                            <span class="ml-1">{{$sacramental_reservation->church->church_name}}</span>
                                        </div>
                                        <div>
                                            <span>Date:</span>
                                            <span class="ml-1">{{$sacramental_reservation->date}}</span>
                                        </div>
                                        <div>
                                            <span>Time:</span>
                                            <span class="ml-1">{{$sacramental_reservation->start_time}} to {{$sacramental_reservation->end_time}}</span>
                                        </div>
                                        @if ($sacramental_reservation->sacrament->id == 1)
                                            <div>
                                                <span>Baptismal Candidate:</span>
                                                <span class="ml-1">{{$sacramental_reservation->participant_name}}</span>
                                            </div>
                                        @endif
                                        @if ($sacramental_reservation->sacrament->id == 7)
                                            <div>
                                                <span>Participant 1:</span>
                                                <span class="ml-1">{{$sacramental_reservation->first_name}}</span>
                                            </div>
                                            <div>
                                                <span>Participant 2:</span>
                                                <span class="ml-1">{{$sacramental_reservation->second_name}}</span>
                                            </div>
                                        @endif
                                        @if ($sacramental_reservation->feedback)
                                            <div class="mt-5">
                                                <span class="font-bold">Feedback:</span>
                                                <span class="ml-1">{{$sacramental_reservation->feedback}}</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex items-start">
                                        @if ($sacramental_reservation->status === null && $sacramental_reservation->subchurch_approve !== 0)
                                            <div class="mb-2 flex flex-row">
                                                <button id="delete-btn-{{$sacramental_reservation->id}}" class="px-4 py-2 bg-negative_btn hover:bg-negative_btn_hover text-white rounded-lg shadow-md ml-2">Cancel</button>
                                            </div>
                                        @endif
                                        @if ($sacramental_reservation->status === 0 || $sacramental_reservation->subchurch_approve === 0)
                                            <div>
                                                <p class="px-9 py-2 bg-red-500 text-white rounded-lg shadow-md">Rejected</p>
                                            </div>
                                        @endif
                                        @if ($sacramental_reservation->status === 1)
                                            <div>
                                                <p class="px-9 py-2 bg-green-500 text-white rounded-lg shadow-md">Approved</p>
                                            </div>
                                        @endif
                                        @if ($sacramental_reservation->status === 2)
                                            <div class="mb-2 flex flex-row">
                                                <div>
                                                    <p class="px-9 py-2 bg-green-500 text-white rounded-lg shadow-md">Finished</p>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($sacramental_reservation->status === 3)
                                            <div class="mb-2 flex flex-row">
                                                <div>
                                                    <p class="px-9 py-2 bg-red-500 text-white rounded-lg shadow-md">Cancelled</p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
            @endif

        </div>
    </div>

    {{-- main church --}}

    {{-- subchurch --}}

    {{-- user scripts --}}
    <script>
        function disableButton(id) {
            var submitBtn = document.getElementById('delete-btn-'+id);
            submitBtn.disabled = true;
            submitBtn.innerHTML = "Cancelling...";
        }
    </script>

</x-app-layout>
