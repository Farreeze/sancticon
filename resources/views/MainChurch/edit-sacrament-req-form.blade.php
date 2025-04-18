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
                    <h1 class="font-bold text-2xl">Edit Sacrament Requirements " {{$sacrament_req->sacrament_desc}} "</h1>
                    <div class="w-full">
                        <form action="{{route('sacrament-requiement.update', $sacrament_req->id)}}" method="POST" onsubmit="disableButton()">
                            @method('PATCH')
                            @csrf
                            <div class="flex-col items-center mt-3">
                                <label class="font-bold" for="church_name">Sacrament Requirements:</label>
                                <textarea class="rounded-lg border-gray-300 w-full mt-2" name="desc" id="" cols="30" rows="8" required>{{$sacrament_req->desc}}</textarea>
                            </div>
                            <div class="w-full mt-5">
                                <button id="submit-btn" class="w-full bg-gray-500 text-white rounded-lg px-3 py-2 hover:bg-gray-700" type="submit">Update Requirements</button>
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
            submitBtn.innerHTML = "Updating requirements...";
        }
    </script>

</x-app-layout>
