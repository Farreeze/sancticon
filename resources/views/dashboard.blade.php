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
            @if (Auth::user()->sub_church == 1)

            @endif
            @if (Auth::user()->user == 1)
                <div class="w-full text-gray-700 font-bold text-2xl">
                    <h3>Your Requests</h3>
                </div>
                <div class="w-full">

                </div>
                <div class="w-full mt-5">
                    <h2 class="font-bold text-gray-700 text-2xl">Sacramental Reservation</h2>
                    @foreach ($sacramental_reservations as $sacramental_reservation)
                        <div class="bg-gray-300 mt-3 p-3 rounded-lg">
                            <div class="flex flex-row justify-between">
                                <div>
                                    <div>
                                        <span>Date:</span>
                                        <span class="ml-2">{{$sacramental_reservation->date}}</span>
                                    </div>
                                    <div>
                                        <span>Sacrament:</span>
                                        <span class="ml-2">{{$sacramental_reservation->sacrament->desc}}</span>
                                    </div>
                                    <div>
                                        <span>Church:</span>
                                        <span class="ml-2">{{$sacramental_reservation->church->church_name}}</span>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    @if ($sacramental_reservation->status === null)
                                        <div>
                                            <p class="px-9 py-2 bg-yellow-500 text-white rounded-lg shadow-md ml-2">Pending</p>
                                        </div>
                                        <form action="{{ route('cancel-reservation', $sacramental_reservation->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="px-4 py-2 bg-negative_btn hover:bg-negative_btn_hover text-white rounded-lg shadow-md ml-2">Cancel Reservation</button>
                                        </form>
                                    @endif
                                    @if ($sacramental_reservation->status === 0)
                                        <div>
                                            <p class="px-9 py-2 bg-red-500 text-white rounded-lg shadow-md ml-2">Rejected</p>
                                        </div>
                                    @endif
                                    @if ($sacramental_reservation->status === 1)
                                        <div>
                                            <p class="px-9 py-2 bg-green-500 text-white rounded-lg shadow-md ml-2">Approved</p>
                                        </div>
                                        <a class="px-4 py-2 bg-positive_btn hover:bg-positive_btn_hover text-white rounded-lg shadow-md ml-2" href="">Request Certificate</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
