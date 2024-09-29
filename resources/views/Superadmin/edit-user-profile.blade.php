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
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-600">
                    <h1 class="font-bold text-2xl">Edit {{ $user->first_name }} {{ $user->middle_name ?? '' }} {{ $user->last_name }}'s profile</h1>
                    <div class="w-full">
                        <form action="{{route('user-profile.update', $user->id)}}" method="POST" onsubmit="disableButton()">
                            @csrf
                            @method('PUT')
                            <div class="flex-col items-center mt-5">
                                <label class="font-bold" for="church_name">First Name:*</label>
                                <input value="{{$user->first_name}}" name="first_name" class="rounded-lg border-gray-300 w-full mt-2" type="text" required>
                            </div>
                            <div class="flex-col items-center mt-5">
                                <label class="font-bold" for="church_name">Middle Name:</label>
                                <input value="{{$user->middle_name}}" name="middle_name" class="rounded-lg border-gray-300 w-full mt-2" type="text">
                            </div>
                            <div class="flex-col items-center mt-5">
                                <label class="font-bold" for="church_name">Last Name:*</label>
                                <input value="{{$user->last_name}}" name="last_name" class="rounded-lg border-gray-300 w-full mt-2" type="text" required>
                            </div>
                            <div class="flex-col items-center mt-5">
                                <label class="font-bold" for="church_name">Address:*</label>
                                <input value="{{$user->address ?? $user->fixed_address}}" name="address" class="rounded-lg border-gray-300 w-full mt-2" type="text" required>
                            </div>
                            <div class="flex-col items-center mt-5">
                                <label class="font-bold" for="church_name">Email:*</label>
                                <input value="{{$user->email}}" name="email" class="rounded-lg border-gray-300 w-full mt-2" type="text" required>
                            </div>
                            <div class="w-full mt-5">
                                <button id="submit-btn" class="w-full bg-gray-500 text-white rounded-lg px-3 py-2 hover:bg-gray-700" type="submit">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function disableButton() {
            var submitBtn = document.getElementById('submit-btn');
            submitBtn.disabled = true;
            submitBtn.innerHTML = "Updating...";
        }
    </script>

</x-app-layout>
