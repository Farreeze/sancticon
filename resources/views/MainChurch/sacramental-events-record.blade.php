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
        <div class="w-full md:ml-5 lg:ml-5 mt-3 md:mt-0 lg:mt-0 bg-white rounded-lg p-5 shadow-lg">
            @if (Auth::user()->main_church)
            <div class="w-full">
                <div class="flex items-center">
                    <div class="w-full flex justify-between items-center mb-5 flex-wrap">
                        <h1 class="font-bold text-2xl text-gray-700">Sacramental Event Records</h1>
                        <div>
                            <form method="GET" action="{{route('mainchurch-user.search')}}">
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
                                <th class="text-start px-4 py-2 border border-gray-300">Participant</th>
                                <th class="text-start px-4 py-2 border border-gray-300">Sacrament</th>
                                <th class="text-start px-4 py-2 border border-gray-300">Date Created</th>
                                <th class="text-start px-4 py-2 border border-gray-300">Date Completed</th>
                                <th class="text-center px-4 py-2 border border-gray-300">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sr_requests as $sr_request)
                                <tr class="bg-gray-50 hover:bg-gray-100">
                                    @if ($sr_request->custom_name)
                                    <td class="text-start px-4 py-2 border border-gray-300">{{$sr_request->custom_name}}</td>
                                    @else
                                        <td class="text-start px-4 py-2 border border-gray-300">
                                            {{$sr_request->user->first_name}}
                                            {{$sr_request->user->middle_name ?? ''}}
                                            {{$sr_request->user->last_name}}
                                            {{$sr_request->suffix->desc ?? '' }}
                                        </td>
                                    @endif
                                    @if ($sr_request->participant_name)
                                    <td class="text-start px-4 py-2 border border-gray-300">{{$sr_request->participant_name}}</td>
                                    @endif
                                    @if ($sr_request->first_name && $sr_request->second_name)
                                    <td class="text-start px-4 py-2 border border-gray-300">{{$sr_request->first_name}} and {{$sr_request->second_name}}</td>
                                    @endif
                                    @if (!$sr_request->participant_name && !$sr_request->first_name && !$sr_request->second_name)
                                    <td class="text-start px-4 py-2 border border-gray-300">NA</td>
                                    @endif
                                    <td class="text-start px-4 py-2 border border-gray-300">{{$sr_request->sacrament->desc}}</td>
                                    <td class="text-start px-4 py-2 border border-gray-300">{{$sr_request->created_at}}</td>
                                    <td class="text-start px-4 py-2 border border-gray-300">{{$sr_request->updated_at}}</td>
                                    <td class="text-center px-4 py-2 border border-gray-300">
                                        <a class="px-4 py-2 bg-gray-800 hover:bg-gray-700 text-white rounded-lg text-center" href="{{route('sacramental-event-documents.show', $sr_request->id)}}">View Documents</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($sr_requests->isEmpty())
                        <div class="w-full flex justify-center flex-col items-center">
                            <img src="/images/no_data.png" alt="">
                            <h2 class="text-lg font-bold text-gray-700">NO RECORDS</h2>
                        </div>
                    @endif
                </div>
                <div class="w-full mt-5">
                    {{-- {{$users->links()}} --}}
                </div>
            </div>
            @endif
        </div>
    </div>

</x-app-layout>
