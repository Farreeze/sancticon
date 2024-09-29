<x-app-layout>

    <div class="w-full p-5 flex justify-center">
        <div class="w-full md:w-[60%] lg:w-[40%] bg-white rounded-lg shadow-lg p-5 flex flex-col">
            <div class="w-full flex mb-5">
                <img class="w-24 h-24 rounded-lg border-2 border-gray-200" src="/images/church-default-dp.png" alt="Church Default DP">
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-3">
                <div>
                    <span class="font-bold text-gray-700">Name:</span>
                    <span class="block text-gray-600">{{ $user->first_name }} {{ $user->middle_name ?? '' }} {{ $user->last_name }}</span>
                </div>
                @if ($user->address)
                    <div>
                        <span class="font-bold text-gray-700">Address:</span>
                        <span class="block text-gray-600">{{$user->address}}</span>
                    </div>
                @endif
                @if ($user->fixed_address)
                    <div>
                        <span class="font-bold text-gray-700">Address:</span>
                        <span class="block text-gray-600">{{$user->barangay->desc}}</span>
                    </div>
                @endif
                <div>
                    <span class="font-bold text-gray-700">Contact Number:</span>
                    <span class="block text-gray-600">{{$user->mobile_number}}</span>
                </div>
                <div>
                    <span class="font-bold text-gray-700">Email:</span>
                    <span class="block text-gray-600">{{$user->email}}</span>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
