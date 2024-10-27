<x-app-layout>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-600 flex flex-col justify-center">
                    <h1 class="font-bold text-2xl">
                        Delete User "{{ $user->first_name }}
                        {{ $user->middle_name ?? '' }}
                        {{ $user->last_name }}
                        {{ $user->suffix->desc ?? '' }}"?
                    </h1>

                    <div class="mt-5 w-full">
                        <form class="w-full" method="POST" action="{{route('superadmin-user.delete', $user->id)}}" onsubmit="disableButton()">
                            @csrf
                            @method('DELETE')

                            <div class="flex justify-between items-center flex-wrap">
                                <h1 class="font-bold text-red-700">WARNING! THIS WILL DELETE THE USER</h1>
                                <div class="flex flex-wrap">
                                    <a class="mr-1 px-4 py-2 rounded-lg hover:bg-gray-200 border border-black-300" href="/dashboard">Cancel</a>
                                    <button id="submit-btn" class="bg-red-500 mx-1 px-4 py-2 text-white rounded-lg hover:bg-red-700">Delete</button>
                                </div>
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
            submitBtn.innerHTML = "Deleting user...";
        }
    </script>

</x-app-layout>
