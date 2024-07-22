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
                <div class="w-full">
                    <div class="flex items-center">
                        <h1 class="font-bold text-2xl text-gray-700">Events</h1>
                        <a class="ml-3 px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-700" href="{{route('add-event-form.show')}}">+ Add Event</a>
                    </div>
                    <div class="w-full mt-5">
                        <div class="flex flex-col md:flex-row lg:flex-row flex-wrap">
                            @foreach ($events as $event)
                            <div class="bg-gray-200 rounded-lg p-5 w-full md:w-[30%] mt-5 lg:w-[30%] md:m-5 lg:m-5">
                                <div class="w-full flex justify-center">
                                    <img class="w-[70%] h-auto border border-gray-300 rounded-lg" src="/images/church-default-dp.png" alt="">
                                </div>
                                <div class="flex justify-center">
                                    <h1 class="font-bold text-xl text-gray-700">{{$event->title}}</h1>
                                </div>
                                <div class="border border-gray-300 rounded-lg p-3">
                                    <span>test</span>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
