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

    <div class="w-full py-5 px-10 flex flex-col md:flex-row lg:flex-row items-start">

        <div class="w-full md:w-[20%] lg:w-[20%] bg-white rounded-lg shadow-lg flex flex-col justify-center p-5">
            <div class="flex justify-center">
                <img class="h-24 w-24" src="/images/church-default-dp.png" alt="Church Logo">
            </div>
            <div class="flex justify-center mt-3">
                <span class="font-bold text-gray-700">{{ Auth::user()->church_name }}</span>
            </div>
        </div>
        <div class="w-full md:w-[80%] lg:w-[80%] md:ml-5 lg:ml-5 mt-3 md:mt-0 lg:mt-0 bg-white rounded-lg p-5 shadow-lg">
            <div class="max-h-screen overflow-y-auto">
                <div class="flex items-center sticky top-0 bg-white z-10">
                    <h1 class="font-bold text-2xl text-gray-700">News and Announcements</h1>
                </div>
                <div class="w-full mt-5 flex flex-col">
                    @foreach ($newsAndAnnouncements as $newsAndAnnouncement)
                        <div class="w-full bg-gray-300 rounded-lg flex flex-col p-5 mb-3">
                            <div>
                                <div class="flex flex-row justify-between items-center">
                                    <h2 class="text-gray-700 font-bold text-xl">{{ $newsAndAnnouncement->title }}</h2>
                                </div>
                                <p class="text-gray-600 max-w-full whitespace-normal break-words mt-3">{{ $newsAndAnnouncement->desc }}</p>
                                <div class="flex flex-row mt-3">
                                    <p class="text-gray-700 max-w-full whitespace-normal break-words font-bold">Date:</p>
                                    <p class="text-gray-700 max-w-full whitespace-normal break-words ml-3">{{ $newsAndAnnouncement->date }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>