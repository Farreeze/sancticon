<x-app-layout>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if (Session::has('message'))

    <script>
        swal("SUCCESS", "{{ Session::get('message') }}", 'success',
        {
            button:true,
            button:"OK",
        });
    </script>

    @endif

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-600">
                    <h1 class="font-bold text-2xl">Add Chapel</h1>
                    <div class="w-full">
                        <form action="{{route('add-church')}}" method="POST" onsubmit="disableButton()">
                            @csrf
                            {{-- form requirements --}}
                            <input type="hidden" name="main_church" id="" value="0">
                            <input type="hidden" name="sub_church" id="" value="1">
                            <input type="hidden" name="user" id="" value="0">
                            {{-- form input --}}
                            <div class="flex-col items-center mt-5">
                                <label class="font-bold" for="church_name">Church Name:</label>
                                <input name="church_name" class="rounded-lg border-gray-300 w-full mt-2" type="text" required>
                            </div>
                            <div class="flex-col items-center mt-3">
                                <label class="font-bold" for="church_name">Church Address:</label>
                                <input name="address" class="rounded-lg border-gray-300 w-full mt-2" type="text" required>
                            </div>
                            <div class="flex-col items-center mt-3">
                                <label class="font-bold" for="church_name">Contact Number:</label>
                                <input name="mobile_number" class="rounded-lg border-gray-300 w-full mt-2" type="text" required>
                            </div>
                            <div class="flex-col items-center mt-3">
                                <label class="font-bold" for="church_name">Church Email:</label>
                                <input name="email" class="rounded-lg border-gray-300 w-full mt-2" type="text" required>
                            </div>
                            <div class="flex-col items-center mt-3">
                                <label class="font-bold" for="church_name">Church Password:</label>
                                <input name="password" class="rounded-lg border-gray-300 w-full mt-2" type="password" required>
                            </div>
                            <div class="w-full mt-5">
                                <button id="add-church-btn" class="w-full bg-gray-500 text-white rounded-lg px-3 py-2 hover:bg-gray-700" type="submit">Add Church</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function disableButton() {
            var submitBtn = document.getElementById('add-church-btn');
            submitBtn.disabled = true;
            submitBtn.innerHTML = "Adding church...";
        }
    </script>

</x-app-layout>
