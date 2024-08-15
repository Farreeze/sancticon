<x-app-layout>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if (Session::has('update_message'))

    <script>
        swal("SUCCESS", "{{ Session::get('update_message') }}", 'success',
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
            @if (Auth::user()->sub_church == 1)
                <div class="w-full max-h-screen overflow-y-auto">
                    <div class="flex items-center sticky top-0 bg-white">
                        <h1 class="font-bold text-2xl text-gray-700">Sacramental Reservation Requests</h1>
                    </div>
                    <div class="w-full mt-5">
                        <div class="flex flex-col">
                            @foreach ($reservation_requests as $reservation_request)
                                <div class="w-full bg-gray-300 rounded-lg flex flex-col p-5 mb-3">
                                    <form id="form" action="{{route('subchurch-sr-request.action', $reservation_request->id)}}" method="POST">
                                        @method('PATCH')
                                        @csrf
                                        {{-- form requirements --}}
                                        <input type="text" name="action" hidden>

                                        <div class="flex flex-row justify-between flex-wrap">
                                            <div>
                                                <div class="flex flex-row items-center mb-2">
                                                    <h2 class="font-bold text-lg text-gray-700">{{$reservation_request->sacrament->desc}}</h2>
                                                    <p class="ml-3 px-4 py-1 bg-yellow-500 text-white rounded-lg shadow-md">Pending</p>
                                                </div>
                                                @if ($reservation_request->custom_name)
                                                    <div class="flex">
                                                        <span class="font-bold">For:</span>
                                                        <p class="ml-2">{{$reservation_request->custom_name}}</p>
                                                    </div>
                                                @endif
                                                <div class="flex flex-wrap">
                                                    <span class="font-bold mr-2">Church:</span>
                                                    <p>{{$reservation_request->church->church_name}}</p>
                                                </div>
                                                <div class="flex flex-wrap">
                                                    <span class="font-bold mr-2">Requested by:</span>
                                                    @if ($reservation_request->custom_name)
                                                        <p>{{$reservation_request->user->church_name}}</p>
                                                    @endif
                                                    <p>{{$reservation_request->user->first_name}} {{$reservation_request->user->last_name}}</p>
                                                </div>
                                                @if ($reservation_request->participant_name)
                                                    <div class="flex flex-wrap">
                                                        <span class="font-bold mr-2">Baptismal candidate:</span>
                                                        <p>{{$reservation_request->participant_name}}</p>
                                                    </div>
                                                @endif
                                                @if ($reservation_request->first_name)
                                                    <div class="flex flex-wrap">
                                                        <span class="font-bold mr-2">Participant 1:</span>
                                                        <p>{{$reservation_request->first_name}}</p>
                                                    </div>
                                                @endif
                                                @if ($reservation_request->second_name)
                                                    <div class="flex flex-wrap">
                                                        <span class="font-bold mr-2">Participant 2:</span>
                                                        <p>{{$reservation_request->second_name}}</p>
                                                    </div>
                                                @endif
                                                <div class="flex flex-wrap">
                                                    <span class="font-bold mr-2">Date:</span>
                                                    <p>{{$reservation_request->date}}</p>
                                                </div>
                                            </div>
                                            {{-- add buttons --}}
                                            <div class="flex flex-row items-start">
                                                <Button id="approve-{{$reservation_request->id}}" onclick="confirmation(event, 'approve', 'approve-{{$reservation_request->id}}', 'reject-{{$reservation_request->id}}')" type="submit" class="px-4 py-2 bg-positive_btn hover:bg-positive_btn_hover rounded-lg shadow-md text-white">Approve</Button>
                                                <Button id="reject-{{$reservation_request->id}}" onclick="confirmation(event, 'reject','approve-{{$reservation_request->id}}', 'reject-{{$reservation_request->id}}')" type="submit" class="ml-3 px-4 py-2 bg-negative_btn hover:bg-negative_btn_hover rounded-lg shadow-md text-white">Reject</Button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <hr class="border-t border-gray-300 my-4">
                <div class="w-full max-h-screen overflow-y-auto mt-3">
                    <div class="flex items-center sticky top-0 bg-white">
                        <h1 class="font-bold text-2xl text-gray-700">Approved Sacramental Reservation Requests</h1>
                    </div>
                    <div class="w-full mt-5">
                        <div class="flex flex-col">
                            @foreach ($finished_reservation_requests as $finished_reservation_request)
                                <div class="w-full bg-gray-300 rounded-lg flex flex-col p-5 mb-3">
                                    <div>
                                        <div class="flex flex-row justify-between">
                                            <div>
                                                <h2 class="font-bold text-lg text-gray-700 mb-2">{{$finished_reservation_request->sacrament->desc}}</h2>
                                                @if ($finished_reservation_request->custom_name)
                                                    <div class="flex">
                                                        <span class="font-bold">For:</span>
                                                        <p class="ml-2">{{$finished_reservation_request->custom_name}}</p>
                                                    </div>
                                                @endif
                                                <div class="flex">
                                                    <span class="font-bold">Church:</span>
                                                    <p class="ml-2">{{$finished_reservation_request->church->church_name}}</p>
                                                </div>
                                                <div class="flex">
                                                    <span class="font-bold">Requested by:</span>
                                                    @if ($finished_reservation_request->custom_name)
                                                    <p class="ml-2">{{$finished_reservation_request->user->church_name}}</p>
                                                    @endif
                                                    <p class="ml-2">{{$finished_reservation_request->user->first_name}} {{$finished_reservation_request->user->last_name}}</p>
                                                </div>
                                                <div class="flex">
                                                    <span class="font-bold">Baptismal candidate:</span>
                                                    <p class="ml-2">{{$finished_reservation_request->participant_name}}</p>
                                                </div>
                                                <div class="flex">
                                                    <span class="font-bold">Date:</span>
                                                    <p class="ml-2">{{$finished_reservation_request->date}}</p>
                                                </div>
                                            </div>
                                            <div>
                                                @if ($finished_reservation_request->subchurch_approve === 0)
                                                    <p class="px-4 py-2 bg-red-500 text-white rounded-lg shadow-md">Rejected</p>
                                                @endif
                                                @if ($finished_reservation_request->subchurch_approve === 1 && $finished_reservation_request->status !== 2)
                                                    <p class="px-4 py-2 bg-green-500 text-white rounded-lg shadow-md">Approved</p>
                                                @endif
                                                @if ($finished_reservation_request->status === 2)
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
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        function confirmation(ev, action, approveBtnId, rejectBtnId) {
        ev.preventDefault(); // Prevent the default form submission

        var form = ev.target.closest('form'); // Get the closest form element
        var urlToRedirect = form.getAttribute('action'); // Get the action URL
        var approveBtn = document.getElementById(approveBtnId);
        var rejectBtn = document.getElementById(rejectBtnId);

        var message = action === 'approve' ?
            "Are you sure you want to approve this reservation?" :
            "Are you sure you want to reject this reservation?";

        swal({
            title: message,
            text: "This action cannot be undone!",
            icon: action === 'approve' ? 'success' : 'error',
            buttons: true,
            dangerMode: action === 'reject',
        })
        .then((willConfirm) => {
            if (willConfirm) {
                approveBtn.disabled = true;
                rejectBtn.disabled = true;
                if(action == "approve"){
                    approveBtn.textContent = "Processing...";
                }else if(action == "reject"){
                    rejectBtn.textContent = "Processing...";
                }
                form.querySelector('input[name="action"]').value = action;
                form.submit(); // Submit the form if confirmed
            }
        });
    }
    </script>

</x-app-layout>
