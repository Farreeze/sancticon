<x-app-layout>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if (Session::has('add-reservation'))

    <script>
        swal("SUCCESS", "{{ Session::get('add-reservation') }}", 'success',
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
                    <h1 class="font-bold text-2xl">Sacramental Reservation Form</h1>
                    <div class="w-full">
                        <p class="mt-3 text-gray-500">Fields with * are required</p>
                        <form class="mt-3" action="{{ route('sacramental-events-form.submit') }}" method="POST" onsubmit="disableButton()">
                            @csrf
                            {{-- form requirements --}}
                            <input name="user_id" type="text" value="{{Auth::user()->id}}" hidden>
                            <div class="w-full flex flex-col">
                                <div>
                                    <span class="text-gray-700 ml-1">Request for:*</span>
                                    <input class="w-full rounded-lg border-gray-300" type="text" placeholder="Name" name="custom_name" required>
                                </div>
                                <div class="mt-3">
                                    <span class="text-gray-700 ml-1">Contact:*</span>
                                    <input class="w-full rounded-lg border-gray-300" type="number" placeholder="Contact Number" name="custom_number" required>
                                </div>
                                <div class="mt-3">
                                    <span class="text-gray-700 ml-1">Church:*</span>
                                    <select class="w-full rounded-lg border-gray-300" name="church_id" id="" required>
                                        <option value="" selected disabled>Select Church</option>
                                        @foreach ($churches as $church)
                                            <option value="{{ $church->id }}">{{$church->church_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <span class="text-gray-700 ml-1">Sacrament:*</span>
                                    <select id="sacrament-select" class="w-full rounded-lg border-gray-300" name="sacrament_id" id="" required>
                                        <option value="" selected disabled>Select Sacrament</option>
                                        @foreach ($sacraments as $sacrament)
                                            <option value="{{ $sacrament->id }}">{{$sacrament->desc}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div id="participant-section"></div>
                            <div class="w-full mt-3">
                                <span class="text-gray-700 ml-1">Date:*</span>
                                <input min="<?= date('Y-m-d', strtotime('+1 day')) ?>" class="w-full rounded-lg border-gray-300" type="date" name="date" id="">
                            </div>
                            <div class="w-full mt-3">
                                <span class="text-gray-700 ml-1">Start Time:*</span>
                                <input class="w-full rounded-lg border-gray-300" type="time" name="start_time" id="" required>
                            </div>
                            <div class="w-full mt-3">
                                <span class="text-gray-700 ml-1">End Time:*</span>
                                <input class="w-full rounded-lg border-gray-300" type="time" name="end_time" id="" required>
                            </div>
                            <div class="w-full flex justify-end mt-5">
                                <button id="submit-btn" class="bg-secondary hover:bg-secondary_hover rounded-lg px-4 py-2 text-white w-full" type="submit">Submit Reservation</button>
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
            submitBtn.innerHTML = "Submitting...";
        }
    </script>

    <script>
        document.getElementById('sacrament-select').addEventListener('change', function() {
            var dynamicFields = document.getElementById('participant-section');
            dynamicFields.innerHTML = '';
            if (this.value == '7') {
                var participant1 = document.createElement('div');
                participant1.className = 'mt-3';
                participant1.innerHTML = '<span class="text-gray-700 ml-1">Participant 1 name:</span><input class="w-full rounded-lg border-gray-300" type="text" placeholder="Participant name" name="first_name" value="{{ Auth::user()->first_name }} {{ Auth::user()->middle_name ? Auth::user()->middle_name[0] . '.' : '' }} {{ Auth::user()->last_name }}" required>';

                var participant2 = document.createElement('div');
                participant2.className = 'mt-3';
                participant2.innerHTML = '<span class="text-gray-700 ml-1">Participant 2 name:</span><input class="w-full rounded-lg border-gray-300" type="text" placeholder="Participant name" name="second_name" required>';

                dynamicFields.appendChild(participant1);
                dynamicFields.appendChild(participant2);
            } else if (this.value == '1') {
                var participant = document.createElement('div');
                participant.className = 'mt-3';
                participant.innerHTML = '<span class="text-gray-700 ml-1">Participant name:</span><input class="w-full rounded-lg border-gray-300" type="text" placeholder="Participant name" name="participant_name" required>';

                dynamicFields.appendChild(participant);
            }
        });
    </script>

</x-app-layout>
