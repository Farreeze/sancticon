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

    <div class="w-full py-5 px-10 flex flex-col md:flex-row lg:flex-row items-start">

        <div class="w-full md:w-[20%] lg:w-[20%] bg-white rounded-lg shadow-lg flex flex-col justify-center p-5">
            <div class="flex justify-center">
                <img class="h-24 w-24" src="/images/church-default-dp.png" alt="Church Logo">
            </div>
            <div class="flex justify-center mt-3">
                <span class="font-bold text-gray-700">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span>
            </div>
        </div>

        <div class="w-full md:w-[80%] lg:w-[80%] md:ml-5 lg:ml-5 mt-3 md:mt-0 lg:mt-0 bg-white rounded-lg p-5 shadow-lg">

            <div class="max-h-screen overflow-y-auto">

                <div class="flex items-center sticky top-0 bg-white z-10 mb-3">
                    <h1 class="font-bold text-2xl text-gray-700">Sacrament Requirements</h1>
                </div>

                @if ($sacrament_requirements->isEmpty())
                        <div class="w-full flex justify-center">
                            <img src="/images/no_data.png" alt="">
                        </div>
                    @endif

                @foreach ($sacrament_requirements as $sacrament_requirement)
                    <div class="w-full bg-gray-300 p-5 rounded-lg shadow-md mb-3 flex flex-col sm:flex-row items-start gap-5">
                        <div class="flex flex-col">
                            <p class="font-bold text-lg text-gray-700">{{$sacrament_requirement->sacrament_desc}}</p>
                            <p class="text-md text-gray-700" style="white-space: pre-line;">{{$sacrament_requirement->desc}}</p>
                        </div>
                        <a class="px-4 py-2 bg-gray-800 hover:bg-gray-700 text-white rounded-lg" href="{{route('sacrament-requiement.edit', $sacrament_requirement->id)}}">Edit</a>
                    </div>
                @endforeach

            </div>

        </div>

    </div>

    <script>
        function disableButton(form) {
            const button = form.querySelector('button[type="submit"]');
            button.disabled = true;
            button.innerHTML = 'Deleting...';
        }
    </script>

</x-app-layout>
