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
                    <h1 class="font-bold text-2xl">Add to Gallery</h1>
                    <div class="w-full">
                        <p class="mt-3 text-gray-500">Fields with * are required</p>
                        <form action="{{route('mainchurch-gallery.store')}}" method="POST" onsubmit="disableButton()" enctype="multipart/form-data">
                            @csrf
                            {{-- form requirements --}}
                            <input type="hidden" name="album_id" id="" value="{{$album_id}}">
                            {{-- form input --}}
                            <div class="flex-col items-center mt-3">
                                <label class="font-bold" for="church_name">Photo:*</label>
                                <input name="image" class="border-gray-300 w-full mt-2" type="file" accept="image/*" required>
                            </div>
                            <div class="flex-col items-center mt-3">
                                <label class="font-bold" for="church_name">Caption:*</label>
                                <input name="caption" class="rounded-lg border-gray-300 w-full mt-2" type="text" placeholder="Enter Caption" required>
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
