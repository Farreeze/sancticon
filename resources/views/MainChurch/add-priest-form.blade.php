<x-app-layout>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if (Session::has('store-message'))

    <script>
        swal("SUCCESS", "{{ Session::get('store-message') }}", 'success',
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
                    <h1 class="font-bold text-2xl mb-5">Add Priest</h1>
                    <div class="w-full">
                        <form action="{{route('add-priest.submit')}}" method="POST" onsubmit="disableButton()" enctype="multipart/form-data">
                            @csrf
                            {{-- form input --}}
                            <div class="flex-col items-center mt-3">
                                <label class="font-bold" for="church_name">First Name:*</label>
                                <input name="first_name" class="rounded-lg border-gray-300 w-full mt-2" type="text" placeholder="Enter first name" required>
                            </div>
                            <div class="flex-col items-center mt-3">
                                <label class="font-bold" for="church_name">Middle Name (Optional):</label>
                                <input name="middle_name" class="rounded-lg border-gray-300 w-full mt-2" type="text" placeholder="Enter middle name">
                            </div>
                            <div class="flex-col items-center mt-3">
                                <label class="font-bold" for="church_name">Last Name:*</label>
                                <input name="last_name" class="rounded-lg border-gray-300 w-full mt-2" type="text" placeholder="Enter last name" required>
                            </div>
                            <div class="flex-col items-center mt-3">
                                <label class="font-bold" for="church_name">Suffix Name (Optional):</label>
                                <Select class="mt-2 w-full rounded-lg border border-gray-300" name="suffix_name">
                                    <option value="" selected>Select Suffix Name</option>
                                    @foreach ($suffix_names as $suffix_name)
                                    <option value="{{$suffix_name->id}}">{{$suffix_name->desc}}</option>
                                    @endforeach
                                </Select>
                            </div>
                            {{-- <div class="mt-3">
                                <span class="text-gray-700 ml-1 font-bold">Church:</span>
                                <select class="w-full rounded-lg border-gray-300 mt-2" name="church_id" id="" required>
                                    <option value="" selected disabled>Select Church</option>
                                    @foreach ($churches as $church)
                                        <option value="{{ $church->id }}">{{$church->church_name}}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="flex-col items-center mt-3">
                                <label class="font-bold" for="church_name">Title:*</label>
                                <input name="title" class="rounded-lg border-gray-300 w-full mt-2" type="text" placeholder="Enter title" required>
                            </div>
                            <div class="flex-col items-center mt-3">
                                <label class="font-bold" for="church_name">Photo: (2MB max)</label>
                                @if ($errors->has('image'))
                                    <span class="text-red-600">{{ $errors->first('image') }}</span>
                                @endif
                                <input name="image" class="border-gray-300 w-full mt-2" type="file" accept="image/*">
                            </div>
                            <div class="w-full mt-5">
                                <button id="submit-btn" class="w-full bg-gray-500 text-white rounded-lg px-3 py-2 hover:bg-gray-700" type="submit">Submit</button>
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
            submitBtn.innerHTML = "Adding...";
        }
    </script>

</x-app-layout>
