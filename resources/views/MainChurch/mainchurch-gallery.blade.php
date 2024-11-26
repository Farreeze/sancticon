<x-app-layout>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if (Session::has('delete-message'))

    <script>
        swal("SUCCESS", "{{ Session::get('delete-message') }}", 'success',
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
                    <h1 class="font-bold text-2xl text-gray-700">Albums</h1>
                    <a class="ml-3 px-4 py-2 bg-secondary text-white rounded-lg hover:bg-secondary_hover" href="{{route('mainchurch-album.create')}}">+ Create Album</a>
                </div>

                @if ($albums->isEmpty())
                    <div class="w-full flex justify-center">
                        <img src="/images/no_data.png" alt="">
                    </div>
                @endif

                <div class="w-full flex flex-wrap flex-col md:flex-row lg:flex-row items-start">
                    @foreach ($albums as $album)
                        <div class="w-72 bg-gray-300 rounded-lg m-1 md:m-3 lg:m-3 p-5 flex flex-col shadow-md">
                            <div class="w-full flex justify-center items-center shadow-md">
                                <img class="w-full h-48 object-cover rounded-lg" src="{{ $album->photos->first() ? '/'.$album->photos->first()->photo_id : '/images/no-image.jpg' }}" alt="Album Thumbnail">
                            </div>
                            <div class="w-full flex justify-center items-center mt-3">
                                <h1 class="text-lg font-bold text-gray-700">{{$album->album_title}}</h1>
                            </div>
                            <div class="w-full flex justify-center items-center mt-3">
                                <a class="w-full text-center px-4 py-2 bg-secondary text-white rounded-lg hover:bg-secondary_hover" href="{{route('mainchurch-album.select', $album->id)}}">View Album</a>
                            </div>
                            <div class="w-full flex justify-center items-center mt-1">
                                <a href="{{route('mainchurch-album.confirm-del', $album->id)}}" class="bg-red-500 w-full text-center py-2 text-white rounded-lg hover:bg-red-700">Delete</a>
                            </div>
                        </div>
                    @endforeach
                </div>

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
