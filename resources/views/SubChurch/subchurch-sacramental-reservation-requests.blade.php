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
                    <p class="text-gray-500">ⓘ Requests from User Accounts are stored here.</p>
                    <div class="w-full mt-5">
                        <div class="flex flex-col">

                            @if ($reservation_requests->isEmpty())
                                <div class="w-full flex justify-center">
                                    <img src="/images/no_data.png" alt="">
                                </div>
                            @endif

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
                                                <div class="flex flex-wrap">
                                                    <span class="font-bold mr-2">Contact:</span>
                                                    @if ($reservation_request->custom_number)
                                                        <p>{{$reservation_request->custom_number}}</p>
                                                    @endif
                                                        <p>{{$reservation_request->user->mobile_number}}</p>
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
                                                <div class="flex flex-wrap">
                                                    <span class="font-bold mr-2">Time:</span>
                                                    <p>{{$reservation_request->start_time}} to {{$reservation_request->end_time}}</p>
                                                </div>
                                                @if ($reservation_request->sacrament->id == 7)
                                                    <div class="mt-3 flex flex-col md:flex-row lg:flex-row">
                                                        @if ($reservation_request->file_one)
                                                        <a href="{{ asset('storage/' . $reservation_request->file_one) }}" class="bg-secondary hover:bg-secondary_hover px-4 py-2 rounded-lg text-white m-1" target="_blank">View Cenomar</a>
                                                        @endif

                                                        @if ($reservation_request->file_two)
                                                            <a href="{{ asset('storage/' . $reservation_request->file_two) }}" class="bg-secondary hover:bg-secondary_hover px-4 py-2 rounded-lg text-white m-1" target="_blank">View Birth Certificate</a>
                                                        @endif

                                                        @if ($reservation_request->file_three)
                                                            <a href="{{ asset('storage/' . $reservation_request->file_three) }}" class="bg-secondary hover:bg-secondary_hover px-4 py-2 rounded-lg text-white m-1" target="_blank">View Baptismal Certificate</a>
                                                        @endif

                                                        @if ($reservation_request->file_four)
                                                            <a href="{{ asset('storage/' . $reservation_request->file_four) }}" class="bg-secondary hover:bg-secondary_hover px-4 py-2 rounded-lg text-white m-1" target="_blank">View Confirmation Certificate</a>
                                                        @endif
                                                    </div>
                                                @endif
                                                @if ($reservation_request->sacrament->id == 1)
                                                    <div class="mt-3 flex flex-col md:flex-row lg:flex-row">
                                                        @if ($reservation_request->file_one)
                                                        <a href="{{ asset('storage/' . $reservation_request->file_one) }}" class="bg-secondary hover:bg-secondary_hover px-4 py-2 rounded-lg text-white m-1" target="_blank">View Birth Certificate</a>
                                                        @endif

                                                        @if ($reservation_request->file_two)
                                                            <a href="{{ asset('storage/' . $reservation_request->file_two) }}" class="bg-secondary hover:bg-secondary_hover px-4 py-2 rounded-lg text-white m-1" target="_blank">View Confirmation Certificate</a>
                                                        @endif
                                                    </div>
                                                @endif
                                                @if ($reservation_request->sacrament->id == 6)
                                                    <div class="mt-3 flex flex-col md:flex-row lg:flex-row">
                                                        @if ($reservation_request->file_one)
                                                        <a href="{{ asset('storage/' . $reservation_request->file_one) }}" class="bg-secondary hover:bg-secondary_hover px-4 py-2 rounded-lg text-white m-1" target="_blank">View Death Certificate</a>
                                                        @endif
                                                    </div>
                                                @endif
                                                @if ($reservation_request->sacrament->id == 3)
                                                    <div class="mt-3 flex flex-col md:flex-row lg:flex-row">
                                                        @if ($reservation_request->file_one)
                                                        <a href="{{ asset('storage/' . $reservation_request->file_one) }}" class="bg-secondary hover:bg-secondary_hover px-4 py-2 rounded-lg text-white m-1" target="_blank">View Bapstismal Certificate</a>
                                                        @endif
                                                    </div>
                                                @endif
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

                            @if ($finished_reservation_requests->isEmpty())
                                <div class="w-full flex justify-center">
                                    <img src="/images/no_data.png" alt="">
                                </div>
                            @endif

                            @foreach ($finished_reservation_requests as $finished_reservation_request)
                                <div class="w-full bg-gray-300 rounded-lg flex flex-col p-5 mb-3">
                                    <div>
                                        <div class="flex flex-row justify-between">
                                            <div>
                                                <h2 class="font-bold text-xl text-gray-700 mb-2">{{$finished_reservation_request->sacrament->desc}}</h2>
                                                @if ($finished_reservation_request->custom_name)
                                                    <div class="flex text-lg">
                                                        <span class="font-bold">For:</span>
                                                        <p class="ml-2">{{$finished_reservation_request->custom_name}}</p>
                                                    </div>
                                                @endif
                                                <div class="flex text-lg">
                                                    <span class="font-bold">Church:</span>
                                                    <p class="ml-2">{{$finished_reservation_request->church->church_name}}</p>
                                                </div>
                                                <div class="flex text-lg">
                                                    <span class="font-bold">Requested by:</span>
                                                    @if ($finished_reservation_request->custom_name)
                                                    <p class="ml-2">{{$finished_reservation_request->user->church_name}}</p>
                                                    @endif
                                                    <p class="ml-2">{{$finished_reservation_request->user->first_name}} {{$finished_reservation_request->user->last_name}}</p>
                                                </div>
                                                <div class="flex text-lg">
                                                    <span class="font-bold">Contact:</span>
                                                    @if ($finished_reservation_request->custom_number)
                                                    <p class="ml-2">{{$finished_reservation_request->custom_number}}</p>
                                                    @endif
                                                    <p class="ml-2">{{$finished_reservation_request->user->mobile_number}}</p>
                                                </div>
                                                <div class="flex text-lg">
                                                    <span class="font-bold">Baptismal candidate:</span>
                                                    <p class="ml-2">{{$finished_reservation_request->participant_name}}</p>
                                                </div>
                                                <div class="flex text-lg">
                                                    <span class="font-bold">Date:</span>
                                                    <p class="ml-2">{{$finished_reservation_request->date}}</p>
                                                </div>
                                                <div class="flex text-lg">
                                                    <span class="font-bold">Time:</span>
                                                    <p class="ml-2">{{$finished_reservation_request->start_time}} to {{$finished_reservation_request->end_time}}</p>
                                                </div>
                                                @if ($finished_reservation_request->feedback)
                                                    <div class="mt-5 text-lg">
                                                        <span class="font-bold">Feedback:</span>
                                                        <span class="ml-1">{{$finished_reservation_request->feedback}}</span>
                                                    </div>
                                                @endif
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

            content: action === 'reject' ? {
                element: "input",
                attributes: {
                    placeholder: "Rejection feedback",
                    type: "text",
                    name: "rejection_reason",
                    required: "true",
                },
            } : null

        })
        .then((willConfirm) => {
            if (willConfirm) {
                approveBtn.disabled = true;
                rejectBtn.disabled = true;
                if(action == "approve"){
                    approveBtn.textContent = "Processing...";
                }else if(action == "reject"){
                    rejectBtn.textContent = "Processing...";

                    const rejectionReason = document.querySelector('input[name="rejection_reason"]').value;

                    const rejectionInput = document.createElement('input');
                    rejectionInput.type = 'hidden';
                    rejectionInput.name = 'feedback';
                    rejectionInput.value = rejectionReason;

                    form.appendChild(rejectionInput);

                }
                form.querySelector('input[name="action"]').value = action;
                form.submit(); // Submit the form if confirmed
            }
        });
    }
    </script>

</x-app-layout>
