<x-app-layout>

    <div class="w-full py-5 px-10 flex flex-col md:flex-row lg:flex-row items-start">
        <div class="w-full md:w-[20%] lg:w-[20%] bg-white rounded-lg shadow-lg">
            <div class="w-full flex flex-col justify-center p-5">
                <div class="flex justify-center">
                    <img class="h-24 w-24" src="/images/church-default-dp.png" alt="">
                </div>
                <div class="flex justify-center mt-3">
                    @if (Auth::user()->user == 1)
                    <span class="font-bold text-gray-700">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span>
                    @endif
                    @if (Auth::user()->user == 0)
                    <span class="font-bold text-gray-700">{{Auth::user()->church_name}}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="w-full md:ml-5 lg:ml-5 mt-3 md:mt-0 lg:mt-0 bg-white rounded-lg p-5 shadow-lg">
            <div class="w-full max-h-screen overflow-y-auto">
                <div class="flex items-center sticky top-0 bg-white">
                    <h1 class="font-bold text-2xl text-gray-700">Priests</h1>
                </div>
                <div class="w-full mt-5">
                    <div class="flex flex-col">

                        @if ($priests->isEmpty())
                            <div class="w-full flex justify-center">
                                <img src="/images/no_data.png" alt="">
                            </div>
                        @endif

                        @foreach ($priests as $priest)
                            <div class="w-full bg-gray-300 rounded-lg p-5">
                                <div class="flex flex-col items-center">

                                    @if (!$priest->photo_id)
                                        <img class="w-32 h-32 rounded-full mb-5" src="/images/default-dp.png" alt="">
                                    @else
                                        <img class="w-32 h-32 rounded-full mb-5" src="/{{$priest->photo_id}}" alt="">
                                    @endif

                                    <div class="flex">
                                        <p class="text-lg text-gray-700 font-bold mr-1">{{ $priest->first_name }}</p>
                                        <p class="text-lg text-gray-700 font-bold mr-1">{{ $priest->middle_name }}</p>
                                        <p class="text-lg text-gray-700 font-bold mr-1">{{ $priest->last_name }}</p>
                                        @if ($priest->suffix_name != 10 && $priest->suffix_name != null)
                                            <p class="text-lg text-gray-700 font-bold mr-1">{{ $priest->suffix->desc }}</p>
                                        @endif
                                    </div>

                                    <p class="mt-1 font-bold text-md text-gray-700">{{$priest->title}}</p>
                                    <p class="mt-1 font-bold text-md text-gray-700">{{$priest->church->church_name}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
