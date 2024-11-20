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

    <div class="w-full p-10">
        <div class="w-full">
            <div class="flex items-center">
                <div class="w-full flex justify-between items-center mb-3 flex-wrap">
                    <h1 class="font-bold text-2xl text-gray-700">Deleted Users</h1>
                    <div>
                        <form method="GET" action="{{route('user.search')}}">
                            @csrf
                            <input class="rounded-lg border-gray-300" type="text" name="text" id="" placeholder="Search keyword" required>
                            <button class="px-4 py-2 rounded-lg bg-gray-800 hover:bg-gray-700 text-white ml-1" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="w-full overflow-auto">
                <table class="w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-300">
                        <tr class="text-start">
                            <th class="text-start px-4 py-2 border border-gray-300">Name</th>
                            <th class="text-start px-4 py-2 border border-gray-300">Email</th>
                            <th class="text-start px-4 py-2 border border-gray-300">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="bg-gray-50 hover:bg-gray-100">
                                <td class="text-start px-4 py-2 border border-gray-300">
                                    {{ $user->first_name }} {{ $user->middle_name ?? '' }} {{ $user->last_name }}
                                </td>
                                <td class="text-start px-4 py-2 border border-gray-300">{{ $user->email }}</td>
                                <td class="text-start px-4 py-2 border border-gray-300">
                                    <div class="flex flex-wrap">
                                        <a class="bg-green-800 mx-1 px-2 py-1 text-white rounded-lg hover:bg-green-700" href="{{route('deleted-user.restore', $user->id)}}">Restore</a>
                                        {{-- <a class="bg-yellow-500 mx-1 px-2 py-1 text-white rounded-lg hover:bg-yellow-700" href="{{route('edit-user-profile.show', $user->id)}}">Update</a>
                                        <a class="bg-red-500 mx-1 px-2 py-1 text-white rounded-lg hover:bg-red-700" href="{{route('user-profile-delete.show', $user->id)}}">Delete</a> --}}
                                        <form method="POST" action="{{route('superadmin-user.perma.delete', $user->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="bg-red-800 mx-1 px-2 py-1 text-white rounded-lg hover:bg-red-700">Permanent Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="w-full mt-5">
                {{$users->links()}}
            </div>
        </div>
    </div>

</x-app-layout>
