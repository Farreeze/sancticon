<x-app-layout>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if (Session::has('update-message'))

    <script>
        swal("SUCCESS", "{{ Session::get('update-message') }}", 'success',
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
                    <h1 class="font-bold text-2xl mb-5">Edit {{$priest->first_name}} {{$priest->last_name}}</h1>
                    <div class="w-full">
                        <form action="{{ route('priest.update', $priest->id) }}" method="POST" onsubmit="disableButton()">
                            @csrf
                            @method('PATCH')
                            {{-- form input --}}
                            <div class="flex-col items-center mt-3">
                                <label class="font-bold" for="church_name">First Name:</label>
                                <input value="{{$priest->first_name}}" name="first_name" class="rounded-lg border-gray-300 w-full mt-2" type="text" placeholder="Enter first name" required>
                            </div>
                            <div class="flex-col items-center mt-3">
                                <label class="font-bold" for="church_name">Middle Name (Optional):</label>
                                <input value="{{$priest->middle_name}}" name="middle_name" class="rounded-lg border-gray-300 w-full mt-2" type="text" placeholder="Enter middle name">
                            </div>
                            <div class="flex-col items-center mt-3">
                                <label class="font-bold" for="church_name">Last Name:</label>
                                <input value="{{$priest->last_name}}" name="last_name" class="rounded-lg border-gray-300 w-full mt-2" type="text" placeholder="Enter last name" required>
                            </div>
                            <div class="flex-col items-center mt-3">
                                <label class="font-bold" for="church_name">Suffix Name (Optional):</label>
                                <Select class="mt-2 w-full rounded-lg border border-gray-300" name="suffix_name">
                                    @if ($priest->suffix_name != null)
                                        <option value="{{$priest->suffix_name}}" selected>{{$priest->suffix->desc}}</option>
                                    @else
                                        <option value="" selected disabled>Select suffix name</option>
                                    @endif
                                    @foreach ($suffix_names as $suffix_name)
                                    <option value="{{$suffix_name->id}}">{{$suffix_name->desc}}</option>
                                    @endforeach
                                </Select>
                            </div>
                            <div class="mt-3">
                                <span class="text-gray-700 ml-1 font-bold">Title:</span>
                                <select class="w-full rounded-lg border-gray-300 mt-2" name="priest_title" id="priest_title" required>
                                    <option value="{{$priest->title->id}}" selected>{{$priest->title->desc}}</option>
                                    @foreach ($priest_titles as $priest_title)
                                        <option value="{{ $priest_title->id }}">{{$priest_title->desc}}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="flex-col items-center mt-3">
                                <label class="font-bold" for="church_name">Title:</label>
                                <input value="{{$priest->title->desc}}" name="title" class="rounded-lg border-gray-300 w-full mt-2" type="text" placeholder="Enter title" required>
                            </div> --}}
                            <div class="w-full mt-5">
                                <button id="submit-btn" class="w-full bg-gray-500 text-white rounded-lg px-3 py-2 hover:bg-gray-700" type="submit">Save</button>
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
            submitBtn.innerHTML = "Saving...";
        }
    </script>

</x-app-layout>
