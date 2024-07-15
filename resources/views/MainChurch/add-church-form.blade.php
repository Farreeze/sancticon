<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-600">
                    <h1 class="font-bold text-2xl">Add Church</h1>
                    <div class="w-full">
                        <form action="{{route('add-church')}}" method="POST">
                            @csrf
                            {{-- form requirements --}}
                            <input type="hidden" name="main_church" id="" value="0">
                            <input type="hidden" name="sub_church" id="" value="1">
                            <input type="hidden" name="user" id="" value="0">
                            {{-- form input --}}
                            <div class="flex-col items-center mt-5">
                                <label class="font-bold" for="church_name">Church Name:</label>
                                <input name="church_name" class="rounded-lg border-gray-300 w-full mt-2" type="text">
                            </div>
                            <div class="flex-col items-center mt-3">
                                <label class="font-bold" for="church_name">Church Address:</label>
                                <input name="address" class="rounded-lg border-gray-300 w-full mt-2" type="text">
                            </div>
                            <div class="flex-col items-center mt-3">
                                <label class="font-bold" for="church_name">Contact Number:</label>
                                <input name="mobile_number" class="rounded-lg border-gray-300 w-full mt-2" type="text">
                            </div>
                            <div class="flex-col items-center mt-3">
                                <label class="font-bold" for="church_name">Church Email:</label>
                                <input name="email" class="rounded-lg border-gray-300 w-full mt-2" type="text">
                            </div>
                            <div class="flex-col items-center mt-3">
                                <label class="font-bold" for="church_name">Church Password:</label>
                                <input name="password" class="rounded-lg border-gray-300 w-full mt-2" type="password">
                            </div>
                            <div class="w-full mt-5">
                                <button class="w-full bg-gray-400 text-white rounded-lg px-3 py-2 hover:bg-gray-500" type="submit">Add Church</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
