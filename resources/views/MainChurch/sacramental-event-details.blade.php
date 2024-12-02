<x-app-layout>

    <div class="w-full p-5 flex justify-center">
        <div class="w-full md:w-[60%] lg:w-[40%] bg-white rounded-lg shadow-lg p-5 flex flex-col">
            <div class="w-full flex flex-col">

                @if ($event->custom_name)
                    <h1 class="text-lg">{{ $event->custom_name }}'s Documents</h1>
                @else
                    <h1 class="text-lg">
                        {{ $event->user->first_name }}
                        {{ $event->user->middle_name ?? '' }}
                        {{ $event->user->last_name }}
                        {{ $event->suffix->desc ?? '' }}'s Documents
                    </h1>
                @endif

                @if ($event->sacrament->id == 7)
                    <div class="mt-3 flex flex-col md:flex-row lg:flex-row">
                        @if ($event->file_one)
                            <a href="{{ asset('storage/' . $event->file_one) }}"
                                class="bg-secondary hover:bg-secondary_hover px-4 py-2 rounded-lg text-white m-1"
                                target="_blank">View Cenomar</a>
                        @endif

                        @if ($event->file_two)
                            <a href="{{ asset('storage/' . $event->file_two) }}"
                                class="bg-secondary hover:bg-secondary_hover px-4 py-2 rounded-lg text-white m-1"
                                target="_blank">View Birth Certificate</a>
                        @endif

                        @if ($event->file_three)
                            <a href="{{ asset('storage/' . $event->file_three) }}"
                                class="bg-secondary hover:bg-secondary_hover px-4 py-2 rounded-lg text-white m-1"
                                target="_blank">View Baptismal Certificate</a>
                        @endif

                        @if ($event->file_four)
                            <a href="{{ asset('storage/' . $event->file_four) }}"
                                class="bg-secondary hover:bg-secondary_hover px-4 py-2 rounded-lg text-white m-1"
                                target="_blank">View Confirmation Certificate</a>
                        @endif
                    </div>
                @endif
                @if ($event->sacrament->id == 1)
                    <div class="mt-3 flex flex-col md:flex-row lg:flex-row">
                        @if ($event->file_one)
                            <a href="{{ asset('storage/' . $event->file_one) }}"
                                class="bg-secondary hover:bg-secondary_hover px-4 py-2 rounded-lg text-white m-1"
                                target="_blank">View Birth Certificate</a>
                        @endif

                        @if ($event->file_two)
                            <a href="{{ asset('storage/' . $event->file_two) }}"
                                class="bg-secondary hover:bg-secondary_hover px-4 py-2 rounded-lg text-white m-1"
                                target="_blank">View Confirmation Certificate</a>
                        @endif
                    </div>
                @endif
                @if ($event->sacrament->id == 6)
                    <div class="mt-3 flex flex-col md:flex-row lg:flex-row">
                        @if ($event->file_one)
                            <a href="{{ asset('storage/' . $event->file_one) }}"
                                class="bg-secondary hover:bg-secondary_hover px-4 py-2 rounded-lg text-white m-1"
                                target="_blank">View Death Certificate</a>
                        @endif
                    </div>
                @endif
                @if ($event->sacrament->id == 3)
                    <div class="mt-3 flex flex-col md:flex-row lg:flex-row">
                        @if ($event->file_one)
                            <a href="{{ asset('storage/' . $event->file_one) }}"
                                class="bg-secondary hover:bg-secondary_hover px-4 py-2 rounded-lg text-white m-1"
                                target="_blank">View Bapstismal Certificate</a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
