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
                    <span class="font-bold text-gray-700">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span>
                </div>
            </div>
        </div>
        <div class="w-full md:ml-5 lg:ml-5 mt-3 md:mt-0 lg:mt-0 bg-white rounded-lg p-5 shadow-lg">
            @if (Auth::user()->main_church)
                <div class="w-full max-h-screen overflow-y-auto">
                    <div class="flex items-center sticky top-0 bg-white">
                        <h1 class="font-bold text-2xl text-gray-700">Pending Sacramental Reservations</h1>
                    </div>
                    <div class="w-full mt-3">

                        @if ($sr_requests->isEmpty())
                            <div class="w-full flex justify-center">
                                <img src="/images/no_data.png" alt="">
                            </div>
                        @endif

                        @foreach ($sr_requests as $sr_request)
                            <form id="form" class="w-full" action="{{route('sr_request.action', $sr_request->id)}}" method="POST">
                                @csrf
                                @method('PATCH')
                                {{-- form requirements --}}
                                <input type="text" name="action" hidden>
                                <div class="w-full bg-gray-300 rounded-lg flex flex-col p-5 mb-3">
                                    <div class="flex flex-row flex-wrap justify-between">
                                        <div>
                                            <div class="flex flex-row items-center">
                                                <h2 class="font-bold text-lg text-gray-700">{{$sr_request->sacrament->desc}}</h2>
                                                <p class="ml-3 px-4 py-1 bg-yellow-500 text-white rounded-lg shadow-md">Pending</p>
                                            </div>
                                            @if ($sr_request->custom_name)
                                                <div class="flex mt-1 flex-wrap">
                                                    <span class="font-bold mr-2">For:</span>
                                                    <p>{{$sr_request->custom_name}}</p>
                                                </div>
                                            @endif
                                            <div class="flex flex-wrap">
                                                <span class="font-bold mr-2">Church:</span>
                                                <p>{{$sr_request->church->church_name}}</p>
                                            </div>
                                            <div class="flex flex-wrap">
                                                <span class="font-bold mr-2">Requested by:</span>
                                                @if ($sr_request->user->main_church == 1 || $sr_request->user->sub_church == 1)
                                                    <p>{{$sr_request->user->church_name}}</p>
                                                @else
                                                    <p>{{$sr_request->user->first_name}} {{$sr_request->user->last_name}}</p>
                                                @endif

                                            </div>
                                            @if ($sr_request->participant_name)
                                                <div class="flex flex-wrap">
                                                    <span class="font-bold mr-2">Baptismal candidate:</span>
                                                    <p>{{$sr_request->participant_name}}</p>
                                                </div>
                                            @endif
                                            @if ($sr_request->first_name)
                                                <div class="flex flex-wrap">
                                                    <span class="font-bold mr-2">Participant 1:</span>
                                                    <p>{{$sr_request->first_name}}</p>
                                                </div>
                                            @endif
                                            @if ($sr_request->second_name)
                                                <div class="flex flex-wrap">
                                                    <span class="font-bold mr-2">Participant 2:</span>
                                                    <p>{{$sr_request->second_name}}</p>
                                                </div>
                                            @endif
                                            <div class="flex flex-wrap">
                                                <span class="font-bold mr-2">Date:</span>
                                                <p>{{$sr_request->date}}</p>
                                            </div>
                                            <div class="flex flex-wrap">
                                                <span class="font-bold mr-2">Time:</span>
                                                <p>{{$sr_request->start_time}} to {{$sr_request->end_time}}</p>
                                            </div>
                                        </div>
                                        <div>
                                            <Button id="approve-{{$sr_request->id}}" onclick="confirmation(event, 'approve', 'approve-{{$sr_request->id}}', 'reject-{{$sr_request->id}}')" type="submit" class="px-4 py-2 bg-positive_btn hover:bg-positive_btn_hover rounded-lg shadow-md text-white">Approve</Button>
                                            <Button id="reject-{{$sr_request->id}}" onclick="confirmation(event, 'reject','approve-{{$sr_request->id}}', 'reject-{{$sr_request->id}}')" type="submit" class="ml-3 px-4 py-2 bg-negative_btn hover:bg-negative_btn_hover rounded-lg shadow-md text-white">Reject</Button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
                <hr class="border-t border-gray-300 my-4">
                <div class="w-full max-h-screen overflow-y-auto">
                    <div class="flex items-center sticky top-0 bg-white">
                        <h1 class="font-bold text-2xl text-gray-700">Approved Sacramental Events</h1>
                    </div>
                    <div class="w-full mt-3">

                        @if ($approved_sr_requests->isEmpty())
                            <div class="w-full flex justify-center">
                                <img src="/images/no_data.png" alt="">
                            </div>
                        @endif

                        @foreach ($approved_sr_requests as $approved_sr_request)
                            <form id="form" action="{{route('sr_request.action', $approved_sr_request->id)}}" method="POST">
                                @csrf
                                @method('PATCH')
                                {{-- form requirements --}}
                                <input type="text" name="action" hidden>
                                <div class="w-full bg-gray-300 rounded-lg flex flex-col p-5 mb-3">
                                    <div class="flex flex-row flex-wrap justify-between">
                                        <div>
                                            <div class="flex flex-row items-center">
                                                <h2 class="font-bold text-lg text-gray-700">{{$approved_sr_request->sacrament->desc}}</h2>
                                                <p class="ml-3 px-4 py-1 bg-green-500 text-white rounded-lg shadow-md">Approved</p>
                                            </div>
                                            @if ($approved_sr_request->custom_name)
                                                <div class="flex mt-1 flex-wrap">
                                                    <span class="font-bold mr-2">For:</span>
                                                    <p>{{$approved_sr_request->custom_name}}</p>
                                                </div>
                                            @endif
                                            <div class="flex flex-wrap">
                                                <span class="font-bold mr-2">Church:</span>
                                                <p>{{$approved_sr_request->church->church_name}}</p>
                                            </div>
                                            <div class="flex flex-wrap">
                                                <span class="font-bold mr-2">Requested by:</span>
                                                @if ($approved_sr_request->user->main_church == 1 || $approved_sr_request->user->sub_church == 1)
                                                    <p>{{$approved_sr_request->user->church_name}}</p>
                                                @else
                                                    <p>{{$approved_sr_request->user->first_name}} {{$approved_sr_request->user->last_name}}</p>
                                                @endif

                                            </div>
                                            @if ($approved_sr_request->participant_name)
                                                <div class="flex flex-wrap">
                                                    <span class="font-bold mr-2">Baptismal candidate:</span>
                                                    <p>{{$approved_sr_request->participant_name}}</p>
                                                </div>
                                            @endif
                                            @if ($approved_sr_request->first_name)
                                                <div class="flex flex-wrap">
                                                    <span class="font-bold mr-2">Participant 1:</span>
                                                    <p>{{$approved_sr_request->first_name}}</p>
                                                </div>
                                            @endif
                                            @if ($approved_sr_request->second_name)
                                                <div class="flex flex-wrap">
                                                    <span class="font-bold mr-2">Participant 2:</span>
                                                    <p>{{$approved_sr_request->second_name}}</p>
                                                </div>
                                            @endif
                                            <div class="flex flex-wrap">
                                                <span class="font-bold mr-2">Date:</span>
                                                <p>{{$approved_sr_request->date}}</p>
                                            </div>
                                            <div class="flex flex-wrap">
                                                <span class="font-bold mr-2">Time:</span>
                                                <p>{{$approved_sr_request->start_time}} to {{$approved_sr_request->end_time}}</p>
                                            </div>
                                        </div>
                                        <div>
                                            <Button id="finish-{{$approved_sr_request->id}}" onclick="approvedReqConfirm(event, 'finish', 'finish-{{$approved_sr_request->id}}', 'cancel-{{$approved_sr_request->id}}')" type="submit" class="px-4 py-2 bg-positive_btn hover:bg-positive_btn_hover rounded-lg shadow-md text-white">Finish</Button>
                                            <Button id="cancel-{{$approved_sr_request->id}}" onclick="approvedReqConfirm(event, 'cancel','finish-{{$approved_sr_request->id}}', 'cancel-{{$approved_sr_request->id}}')" type="submit" class="ml-3 px-4 py-2 bg-negative_btn hover:bg-negative_btn_hover rounded-lg shadow-md text-white">Cancel</Button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
                {{-- <hr class="border-t border-gray-300 my-4">
                <div class="w-full max-h-screen overflow-y-auto">
                    <div class="flex items-center sticky top-0 bg-white">
                        <h1 class="font-bold text-2xl text-gray-700">Completed Sacramental Events</h1>
                    </div>
                    <div class="w-full mt-3">

                        @if ($completed_sr_requests->isEmpty())
                            <div class="w-full flex justify-center">
                                <img src="/images/no_data.png" alt="">
                            </div>
                        @endif

                        @foreach ($completed_sr_requests as $completed_sr_request)
                            <div class="w-full bg-gray-300 rounded-lg flex flex-col p-5 mb-3">
                                <div class="flex flex-row flex-wrap justify-between">
                                    <div>
                                        <div class="flex flex-row items-center">
                                            <h2 class="font-bold text-lg text-gray-700">{{$completed_sr_request->sacrament->desc}}</h2>
                                            @if ($completed_sr_request->status === 2)
                                            <p class="ml-3 px-4 py-1 bg-green-500 text-white rounded-lg shadow-md">Finished</p>
                                            @endif
                                            @if ($completed_sr_request->status === 3)
                                            <p class="ml-3 px-4 py-1 bg-red-500 text-white rounded-lg shadow-md">Cancelled</p>
                                            @endif
                                        </div>
                                        @if ($completed_sr_request->custom_name)
                                            <div class="flex mt-1 flex-wrap">
                                                <span class="font-bold mr-2">For:</span>
                                                <p>{{$completed_sr_request->custom_name}}</p>
                                            </div>
                                        @endif
                                        <div class="flex flex-wrap">
                                            <span class="font-bold mr-2">Church:</span>
                                            <p>{{$completed_sr_request->church->church_name}}</p>
                                        </div>
                                        <div class="flex flex-wrap">
                                            <span class="font-bold mr-2">Requested by:</span>
                                            @if ($completed_sr_request->user->main_church == 1 || $completed_sr_request->user->sub_church == 1)
                                                <p>{{$completed_sr_request->user->church_name}}</p>
                                            @else
                                                <p>{{$completed_sr_request->user->first_name}} {{$completed_sr_request->user->last_name}}</p>
                                            @endif
                                        </div>
                                        @if ($completed_sr_request->participant_name)
                                            <div class="flex flex-wrap">
                                                <span class="font-bold mr-2">Baptismal candidate:</span>
                                                <p>{{$completed_sr_request->participant_name}}</p>
                                            </div>
                                        @endif
                                        @if ($completed_sr_request->first_name)
                                            <div class="flex flex-wrap">
                                                <span class="font-bold mr-2">Participant 1:</span>
                                                <p>{{$completed_sr_request->first_name}}</p>
                                            </div>
                                        @endif
                                        @if ($completed_sr_request->second_name)
                                            <div class="flex flex-wrap">
                                                <span class="font-bold mr-2">Participant 2:</span>
                                                <p>{{$completed_sr_request->second_name}}</p>
                                            </div>
                                        @endif
                                        <div class="flex flex-wrap">
                                            <span class="font-bold mr-2">Date:</span>
                                            <p>{{$completed_sr_request->date}}</p>
                                        </div>
                                        <div class="flex flex-wrap">
                                            <span class="font-bold mr-2">Time:</span>
                                            <p>{{$completed_sr_request->start_time}} to {{$completed_sr_request->end_time}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div> --}}
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

                    if(action === "approve"){
                        approveBtn.textContent = "Processing...";
                    }else if(action === "reject"){
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

    function approvedReqConfirm(ev, action, approveBtnId, rejectBtnId) {
        ev.preventDefault(); // Prevent the default form submission

        var form = ev.target.closest('form'); // Get the closest form element
        var urlToRedirect = form.getAttribute('action'); // Get the action URL
        var approveBtn = document.getElementById(approveBtnId);
        var rejectBtn = document.getElementById(rejectBtnId);

        var message = action === 'finish' ?
            "Are you sure you want to complete this event?" :
            "Are you sure you want to cancel this event?";

        swal({
            title: message,
            text: "This action cannot be undone!",
            icon: action === 'finish' ? 'success' : 'error',
            buttons: true,
            dangerMode: action === 'cancel',

            content: action === 'cancel' ? {
                    element: "input",
                    attributes: {
                        placeholder: "Cancellation feedback",
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
                if(action == "finish"){
                    approveBtn.textContent = "Processing...";
                }else if(action == "cancel"){
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
