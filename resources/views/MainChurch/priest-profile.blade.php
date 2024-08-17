<x-app-layout>

    <div class="w-full p-5 flex justify-center">
        <div class="w-full md:w-[60%] lg:w-[40%] bg-white rounded-lg shadow-lg p-5 flex flex-col">
            <div class="w-full flex flex-col">
                <div class="w-full flex justify-center">
                    <img class="w-32 h-32 rounded-full" src="/images/default-dp.png" alt="Priest Default DP">
                </div>
                <div class="flex justify-center">
                    <div class="flex">
                        <p class="text-lg text-gray-700 font-bold mr-1">{{ $priest->first_name }}</p>
                        <p class="text-lg text-gray-700 font-bold mr-1">{{ $priest->middle_name }}</p>
                        <p class="text-lg text-gray-700 font-bold">{{ $priest->last_name }}</p>
                    </div>
                </div>
                <div class="flex justify-center">
                    <p class="text-lg text-gray-700">{{ $priest->title }}</p>
                </div>
                <div class="flex justify-center">
                    <p class="text-lg text-gray-700">{{ $priest->church->church_name }}</p>
                </div>
                <div class="flex justify-center mt-10">
                    <a class="bg-white hover:bg-gray-300 border border-gray-300 w-full py-2 text-center rounded-lg" href="{{route('edit-priest.show', $priest->id)}}">Edit</a>
                </div>
                <div class="flex justify-center mt-2">
                    <form class="w-full" action="#" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="py-2 w-full rounded-lg bg-negative_btn hover:bg-negative_btn_hover text-white shadow-md" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
