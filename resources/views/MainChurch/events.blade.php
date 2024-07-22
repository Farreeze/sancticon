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
                                <div class="w-full bg-gray-300 rounded-lg flex flex-col p-5">
                                    <div class="w-full">
                                        <h1 class="text-gray-700 font-bold text-lg">{{ $event->title }}</h1>
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
