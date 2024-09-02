<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        {{-- form requirements --}}
        <input type="hidden" name="main_church" value="0">
        <input type="hidden" name="sub_church" value="0">
        <input type="hidden" name="user" value="1">
        <!-- Name -->
        <div>
            <x-input-label for="First Name" :value="__('First Name')" />
            <x-text-input id="First Name" class="block mt-1 w-full" type="text" name="first_name" :value="old('First Name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('First Name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="Last Name" :value="__('Last Name')" />
            <x-text-input id="Last Name" class="block mt-1 w-full" type="text" name="last_name" :value="old('Last Name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('Last Name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="Middle Name" :value="__('Middle Name')" />
            <x-text-input id="Middle Name" class="block mt-1 w-full" type="text" name="middle_name" :value="old('Middle Name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('Middle Name')" class="mt-2" />
        </div>

        <div class="mt-4 text-gray-700">
            <x-input-label for="Suffix Name" :value="__('Suffix Name')" />
            <select class="w-full rounded-md border-gray-300 shadow-sm" name="suffix_name" id="">
                <option value="" selected disabled>Select suffix name</option>
                @foreach ($suffix_names as $suffix_name)
                    <option value="{{ $suffix_name->id }}">{{ $suffix_name->desc }}</option>
                @endforeach
            </select>
        </div>

        {{-- Gender --}}
        <div class="mt-4 text-gray-700">
            <x-input-label for="Gender" :value="__('Gender')" />
            <select class="w-full rounded-md border-gray-300 shadow-sm" name="gender" id="" required>
                <option value="" selected disabled>Select gender</option>
                @foreach ($genders as $gender)
                    <option value="{{ $gender->id }}">{{ $gender->desc }}</option>
                @endforeach
            </select>
        </div>

        {{-- Address --}}
        <div class="mt-4 text-gray-700">
            <x-input-label for="Address" :value="__('Address')" />
            <select class="w-full rounded-md border-gray-300 shadow-sm" name="fixed_address" id="fixed_address_select" required>
                <option value="" selected disabled>Select Barangay</option>
                @foreach ($barangays as $barangay)
                    <option value="{{ $barangay->id }}">{{ $barangay->desc }}</option>
                @endforeach
                <option value="other">Other</option>
            </select>
        </div>

        <div id="additional_address_div" class="hidden flex-col mt-4 text-gray-700">
            <x-input-label for="Address" :value="__('Address')" />
            <select class="mt-2 w-full rounded-md border-gray-300 shadow-sm" id="region"></select>
            <input type="hidden" name="region_text" id="region-text">

            <select class="mt-2 w-full rounded-md border-gray-300 shadow-sm" id="province"></select>
            <input type="hidden" name="province_text" id="province-text">

            <select class="mt-2 w-full rounded-md border-gray-300 shadow-sm" id="city"></select>
            <input type="hidden" name="city_text" id="city-text">

            <select class="mt-2 w-full rounded-md border-gray-300 shadow-sm" id="barangay"></select>
            <input type="hidden" name="barangay_text" id="barangay-text">

            <input name="address" type="hidden" id="full-address">
        </div>


        {{-- Mobile Number --}}
        <div class="mt-4">
            <x-input-label for="Mobile Number" :value="__('Mobile Number')" />
            <x-text-input id="Mobile Number" class="block mt-1 w-full" type="tel" name="mobile_number" :value="old('Mobile Number')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('Mobile Number')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/ph-address-selector.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const regionSelect = document.getElementById('region');
            const provinceSelect = document.getElementById('province');
            const citySelect = document.getElementById('city');
            const barangaySelect = document.getElementById('barangay');

            const fullAddressInput = document.getElementById('full-address');

            function updateFullAddress() {
                const fullAddress = [
                    regionSelect.options[regionSelect.selectedIndex]?.text || '',
                    provinceSelect.options[provinceSelect.selectedIndex]?.text || '',
                    citySelect.options[citySelect.selectedIndex]?.text || '',
                    barangaySelect.options[barangaySelect.selectedIndex]?.text || ''
                ].filter(Boolean).join(', ');

                // Update the hidden input with the full address
                fullAddressInput.value = fullAddress;
                console.log(fullAddress);
            }

            regionSelect.addEventListener('change', updateFullAddress);
            provinceSelect.addEventListener('change', updateFullAddress);
            citySelect.addEventListener('change', updateFullAddress);
            barangaySelect.addEventListener('change', updateFullAddress);

            // Optionally, call updateFullAddress initially to set the full address based on default selections
            updateFullAddress();
        });

    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fixedAddressSelect = document.getElementById('fixed_address_select');
            const additionalAddressDiv = document.getElementById('additional_address_div');
            const addressFields = additionalAddressDiv.querySelectorAll('select, input[type="hidden"]');

            fixedAddressSelect.addEventListener('change', function () {
                if (this.value === 'other') {
                    additionalAddressDiv.classList.remove('hidden');
                    addressFields.forEach(field => {
                        field.setAttribute('required', 'required');
                        if (field.tagName === 'SELECT') {
                            field.value = ''; // Clear select values
                        } else if (field.type === 'hidden') {
                            field.value = ''; // Clear hidden input values
                        }
                    });
                } else {
                    additionalAddressDiv.classList.add('hidden');
                    addressFields.forEach(field => {
                        field.removeAttribute('required');
                        if (field.tagName === 'SELECT') {
                            field.value = ''; // Clear select values
                        } else if (field.type === 'hidden') {
                            field.value = ''; // Clear hidden input values
                        }
                    });
                }
            });
        });
    </script>



</x-guest-layout>
