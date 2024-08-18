<x-app-layout>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if (Session::has('delete-reservation'))

    <script>
        swal("SUCCESS", "{{ Session::get('delete-reservation') }}", 'success',
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

            {{-- main church dashboard --}}
            @if (Auth::user()->main_church == 1)
                <div class="w-full">
                    <div class="flex items-center">
                        <h1 class="font-bold text-2xl text-gray-700">Churches</h1>
                        <a class="ml-3 px-4 py-2 bg-secondary text-white rounded-lg hover:bg-secondary_hover" href="{{route('add-church-form.show')}}">+ Add Church</a>
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
                                        <a class="bg-secondary hover:bg-secondary_hover px-2 py-1 rounded-lg text-white" href="{{route('church-profile.show', $church->id)}}">View</a>
                                        <a class="bg-blue-500 hover:bg-blue-700 px-2 py-1 rounded-lg text-white" href="">Edit</a>
                                        <a class="bg-red-500 hover:bg-red-700 px-2 py-1 rounded-lg text-white" href="">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            {{-- sub church dashboard --}}
            @if (Auth::user()->sub_church == 1)

                <div class="w-full max-h-screen overflow-auto">
                    <div class="w-full sticky top-0 bg-white">
                        <h2 class="font-bold text-gray-700 text-2xl">Sacramental Reservations</h2>
                    </div>
                </div>
                @foreach ($sacramental_reservations as $sacramental_reservation)
                    <form action="">
                        <div class="w-full p-5 bg-gray-300 mt-3 rounded-lg">
                            <h2 class="font-bold text-lg text-gray-700">{{$sacramental_reservation->sacrament->desc}}</h2>
                        </div>
                    </form>
                @endforeach

            @endif

            {{-- user dashboard --}}
            @if (Auth::user()->user == 1)
                {{-- <div class="w-full text-gray-700 font-bold text-2xl">
                    <h3>Your Requests</h3>
                </div>
                <div class="w-full">

                </div> --}}
                <div class="w-full max-h-screen overflow-auto">
                    <div class="w-full sticky top-0 bg-white">
                        <h2 class="font-bold text-gray-700 text-2xl">Sacramental Reservations</h2>
                    </div>
                    @foreach ($sacramental_reservations as $sacramental_reservation)
                        <form action="{{ route('cancel-reservation', $sacramental_reservation->id) }}" method="POST" onsubmit="disableButton({{$sacramental_reservation->id}})">
                            @csrf
                            @method('DELETE')
                            <div class="bg-gray-300 mt-3 p-3 rounded-lg">
                                <div class="flex flex-row justify-between flex-wrap-reverse">
                                    <div>
                                        <h2 class="font-bold text-lg text-gray-700">{{$sacramental_reservation->sacrament->desc}}</h2>
                                        <div>
                                            <span>Date:</span>
                                            <span class="ml-1">{{$sacramental_reservation->date}}</span>
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
                                        <div>
                                            <span>Church:</span>
                                            <span class="ml-1">{{$sacramental_reservation->church->church_name}}</span>
                                        </div>
                                    </div>
                                    <div class="flex items-start">
                                        @if ($sacramental_reservation->status === null && $sacramental_reservation->subchurch_approve !== 0)
                                            <div class="mb-2 flex flex-row">
                                                <div>
                                                    <p class="px-9 py-2 bg-yellow-500 text-white rounded-lg shadow-md">Pending</p>
                                                </div>
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
                                                <a class="px-4 py-2 bg-positive_btn hover:bg-positive_btn_hover text-white rounded-lg shadow-md ml-2" href="">Request Certificate</a>
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
