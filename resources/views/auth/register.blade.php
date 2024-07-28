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
            <select class="w-full rounded-md border-gray-300 shadow-sm" name="gender" id="">
                <option value="" selected disabled>Select gender</option>
                @foreach ($genders as $gender)
                    <option value="{{ $gender->id }}">{{ $gender->desc }}</option>
                @endforeach
            </select>
        </div>

        {{-- Address --}}
        <div class="mt-4">
            <x-input-label for="Address" :value="__('Address')" />
            <textarea class="w-full rounded-md border-gray-300 shadow-sm" name="address" id="" cols="30" rows="5"></textarea>
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
</x-guest-layout>
