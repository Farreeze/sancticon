<x-app-layout>

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
            <div class="w-full max-h-screen overflow-y-auto">
                <div class="flex items-center sticky top-0 bg-white">
                    <h1 class="font-bold text-2xl text-gray-700">Activity Log</h1>
                </div>
                <div class="w-full mt-5">
                    @if ($activities->isEmpty())
                        <div class="w-full flex justify-center">
                            <img src="/images/no_data.png" alt="">
                        </div>
                    @endif
                    @foreach ($activities as $activity)
                        <div class="w-full bg-gray-300 rounded-lg flex justify-between p-5 mb-3">
                            <div class="flex flex-col">
                                <h2 class="text-gray-700 font-bold">{{$activity->user->first_name}} {{$activity->user->middle_name}} {{$activity->user->last_name}}</h2>
                                <p class="text-gray-700">{{$activity->desc}}</p>
                                @if ($activity->remarks)
                                    <div class="flex flex-col mt-3">
                                        <p class="text-gray-700 font-bold">Remarks:</p>
                                        <p class="text-gray-700">{{$activity->remarks}}</p>
                                    </div>
                                @endif
                            </div>
                            <div>
                                <h2 class="text-gray-700 font-bold">{{$activity->created_at}}</h2>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
