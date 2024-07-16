<x-app-layout>

    <div class="w-full p-5 flex justify-center">
        <div class="w-full md:w-[60%] lg:w-[40%] bg-white rounded-lg shadow-lg p-5 flex flex-col">
            <div class="w-full flex mb-5">
                <img class="w-24 h-24 rounded-lg border-2 border-gray-200" src="/images/church-default-dp.png" alt="Church Default DP">
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-3">
                <div>
                    <span class="font-bold text-gray-700">Church Name:</span>
                    <span class="block text-gray-600">{{$church->church_name}}</span>
                </div>
                <div>
                    <span class="font-bold text-gray-700">Church Address:</span>
                    <span class="block text-gray-600">{{$church->address}}</span>
                </div>
                <div>
                    <span class="font-bold text-gray-700">Church Contact Number:</span>
                    <span class="block text-gray-600">{{$church->mobile_number}}</span>
                </div>
                <div>
                    <span class="font-bold text-gray-700">Church Email:</span>
                    <span class="block text-gray-600">{{$church->email}}</span>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
