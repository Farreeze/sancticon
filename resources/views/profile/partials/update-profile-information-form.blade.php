<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            @if (Auth::user()->main_church == 1 || Auth::user()->sub_church == 1)
                <x-input-label for="church name" :value="__('Church Name')" />
                <x-text-input id="name" name="church_name" type="text" class="mt-1 block w-full" :value="old('name', $user->church_name)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('church_name')" />
            @endif
            @if (Auth::user()->user == 1)
                <x-input-label for="first name" :value="__('First Name')" />
                <x-text-input id="name" name="first_name" type="text" class="mt-1 block w-full" :value="old('name', $user->first_name)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('first_name')" />

                <div class="mt-5">
                    <x-input-label for="middle name" :value="__('Middle Name')" />
                    <x-text-input id="name" name="middle_name" type="text" class="mt-1 block w-full" :value="old('name', $user->middle_name)" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('middle_name')" />
                </div>

                <div class="mt-5">
                    <x-input-label for="last name" :value="__('Last Name')" />
                    <x-text-input id="name" name="last_name" type="text" class="mt-1 block w-full" :value="old('name', $user->last_name)" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="phone number" :value="__('Phone Number')" />
            <x-text-input id="mobile_number" name="mobile_number" type="text" class="mt-1 block w-full" :value="old('name', $user->mobile_number)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('mobile_number')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
