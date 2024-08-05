<x-app-layout>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-600">
                    <h1 class="font-bold text-2xl">Sacramental Reservation Form</h1>
                    <div class="w-full">
                        <form class="mt-3" action="{{ route('add-sacramental-reservation') }}" method="POST">
                            @csrf
                            {{-- form requirements --}}
                            <input name="user_id" type="text" value="{{Auth::user()->id}}" hidden>
                            <div class="w-full">
                                <span class="text-gray-700 ml-1">Sacrament:</span>
                                <select id="sacrament-select" class="w-full rounded-lg border-gray-300" name="sacrament_id" id="" required>
                                    <option value="" selected disabled>Select Sacrament</option>
                                    @foreach ($sacraments as $sacrament)
                                        <option value="{{ $sacrament->id }}">{{$sacrament->desc}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="participant-section"></div>
                            <div class="w-full mt-3">
                                <span class="text-gray-700 ml-1">Date:</span>
                                <input class="w-full rounded-lg border-gray-300" type="date" name="date" id="">
                            </div>
                            <div class="w-full flex justify-end mt-5">
                                <button class="bg-secondary hover:bg-secondary_hover rounded-lg px-4 py-2 text-white w-full" type="submit">Submit Reservation</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- script --}}
    <script>
        document.getElementById('sacrament-select').addEventListener('change', function() {
            var dynamicFields = document.getElementById('participant-section');
            dynamicFields.innerHTML = '';
            if (this.value == '7') {
                var participant1 = document.createElement('div');
                participant1.className = 'mt-3';
                participant1.innerHTML = '<span class="text-gray-700 ml-1">Participant 1 name:</span><input class="w-full rounded-lg border-gray-300" type="text" placeholder="Participant name" name="first_name" value="{{ Auth::user()->first_name }} {{ Auth::user()->middle_name ? Auth::user()->middle_name[0] . '.' : '' }} {{ Auth::user()->last_name }}" required readonly>';

                var participant2 = document.createElement('div');
                participant2.className = 'mt-3';
                participant2.innerHTML = '<span class="text-gray-700 ml-1">Participant 2 name:</span><input class="w-full rounded-lg border-gray-300" type="text" placeholder="Participant name" name="second_name" required>';

                dynamicFields.appendChild(participant1);
                dynamicFields.appendChild(participant2);
            }
        });
    </script>

</x-app-layout>
