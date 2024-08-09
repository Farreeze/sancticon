<x-app-layout>

    <div class="w-full py-5 px-10 flex flex-col md:flex-row lg:flex-row items-start">
        <div class="w-full md:w-[20%] lg:w-[20%] bg-white rounded-lg shadow-lg">
            <div class="w-full flex flex-col justify-center p-5">
                <div class="flex justify-center">
                    <img class="h-24 w-24" src="/images/church-default-dp.png" alt="">
                </div>
                <div class="flex justify-center mt-3">
                    <span class="font-bold text-gray-700">{{Auth::user()->church_name}}</span>
                </div>
            </div>
        </div>
        <div class="w-full md:ml-5 lg:ml-5 mt-3 md:mt-0 lg:mt-0 bg-white rounded-lg p-5 shadow-lg">
            @if (Auth::user()->main_church)
                <div class="w-full max-h-screen overflow-y-auto">
                    <div class="flex items-center sticky top-0 bg-white">
                        <h1 class="font-bold text-2xl text-gray-700">Sacramental Reservations Requests</h1>
                    </div>
                    <div class="w-full mt-3">
                        @foreach ($sr_requests as $sr_request)
                            <form class="w-full" action="#" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="w-full bg-gray-300 rounded-lg flex flex-col p-5 mb-3">
                                    <div class="flex flex-row flex-wrap justify-between">
                                        <div>
                                            <div class="flex flex-row items-center">
                                                <h2 class="font-bold text-lg text-gray-700">{{$sr_request->sacrament->desc}}</h2>
                                                <p class="ml-3 px-4 py-1 bg-yellow-500 text-white rounded-lg shadow-md">Pending</p>
                                            </div>
                                            <div class="flex mt-1 flex-wrap">
                                                <span class="font-bold mr-2">Church:</span>
                                                <p>{{$sr_request->church->church_name}}</p>
                                            </div>
                                            <div class="flex flex-wrap">
                                                <span class="font-bold mr-2">Requested by:</span>
                                                <p>{{$sr_request->user->first_name}} {{$sr_request->user->last_name}}</p>
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
                                        </div>
                                        <div>
                                            <button class="px-4 py-2 bg-positive_btn hover:bg-positive_btn_hover rounded-lg text-white" type="submit">Approve</button>
                                            <button class="px-4 py-2 bg-negative_btn hover:bg-negative_btn_btn_hover rounded-lg text-white" type="submit">Reject</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
                <hr class="border-t border-gray-300 my-4">
            @endif
        </div>
    </div>

</x-app-layout>
