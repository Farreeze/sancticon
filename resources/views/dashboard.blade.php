<x-app-layout>
    <div class="w-full py-5 px-10 flex flex-col md:flex-row lg:flex-row items-start">
        <div class="w-full md:w-[20%] lg:w-[20%] bg-white rounded-lg">
            <div class="w-full flex flex-col justify-center p-5">
                <div class="flex justify-center">
                    <img class="h-24 w-24" src="/images/church-default-dp.png" alt="">
                </div>
                <div class="flex justify-center mt-3">
                    <span class="font-bold text-gray-700">{{Auth::user()->church_name}}</span>
                </div>
            </div>
        </div>
        <div class="w-full md:ml-5 lg:ml-5 mt-3 md:mt-0 lg:mt-0 bg-white rounded-lg p-5">
            @if (Auth::user()->main_church)
                <div class="w-full">
                    <div class="flex items-center">
                        <h1 class="font-bold text-2xl text-gray-700">Churches</h1>
                        <a class="ml-3 px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-700" href="{{route('add-church-form.show')}}">+ Add Church</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full border border-gray-300 rounded-lg overflow-hidden mt-5">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="text-start p-3 border-b border-gray-300">Church Name</th>
                                    <th class="text-start p-3 border-b border-gray-300">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($churches as $church)
                                <tr class="hover:bg-gray-50">
                                    <td class="text-start p-3 border-b border-gray-300">{{$church->church_name}}</td>
                                    <td class="text-start p-3 border-b border-gray-300">
                                        <a class="bg-blue-500 hover:bg-blue-700 px-2 py-1 rounded-lg text-white" href="">Edit</a>
                                        <a class="bg-red-500 hover:bg-red-700 px-2 py-1 rounded-lg text-white" href="">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
