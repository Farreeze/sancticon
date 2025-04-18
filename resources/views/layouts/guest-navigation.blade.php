<nav x-data="{ open: false }" class="bg-white bg-opacity-0">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img class="h-14" src="/images/iconnotext.png" alt="">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link class="text-white hover:text-gray-300" :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link class="text-white hover:text-gray-300" :href="route('guest-events.show')" :active="request()->routeIs('guest-events.show')">
                        {{ __('Events') }}
                    </x-nav-link>
                    <x-nav-link class="text-white hover:text-gray-300" :href="route('guest-news-and-announcements.show')" :active="request()->routeIs('guest-news-and-announcements.show')">
                        {{ __('News and Announcements') }}
                    </x-nav-link>
                    <x-nav-link class="text-white hover:text-gray-300" :href="route('guest-gallery.show')" :active="request()->routeIs('guest-gallery.show')">
                        {{ __('Gallery') }}
                    </x-nav-link>
                    <x-nav-link class="text-white hover:text-gray-300" :href="route('guest-sacraments.show')" :active="request()->routeIs('guest-sacraments.show')">
                        {{ __('Sacraments Offered') }}
                    </x-nav-link>
                    <x-nav-link class="text-white hover:text-gray-300" :href="route('guest-priests.show')" :active="request()->routeIs('guest-priests.show')">
                        {{ __('About Us') }}
                    </x-nav-link>
                    <x-nav-link class="text-white hover:text-gray-300" :href="route('guest-contact-us.show')" :active="request()->routeIs('guest-contact-us.show')">
                        {{ __('Contact Us') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Login and Register Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link class="text-white hover:text-gray-300" :href="route('login')" :active="request()->routeIs('login')">
                    {{ __('Login') }}
                </x-nav-link>
                <x-nav-link class="text-white hover:text-gray-300" :href="route('register')" :active="request()->routeIs('register')">
                    {{ __('Register') }}
                </x-nav-link>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-700 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link class="text-white hover:text-gray-300" :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link class="text-white hover:text-gray-300" :href="route('guest-events.show')" :active="request()->routeIs('guest-events.show')">
                {{ __('Events') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link class="text-white hover:text-gray-300" :href="route('guest-news-and-announcements.show')" :active="request()->routeIs('guest-news-and-announcements.show')">
                {{ __('News and Announcements') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link class="text-white hover:text-gray-300" :href="route('guest-gallery.show')" :active="request()->routeIs('guest-gallery.show')">
                {{ __('Gallery') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link class="text-white hover:text-gray-300" :href="route('guest-sacraments.show')" :active="request()->routeIs('guest-sacraments.show')">
                {{ __('Sacraments Offered') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link class="text-white hover:text-gray-300" :href="route('guest-priests.show')" :active="request()->routeIs('guest-priests.show')">
                {{ __('About Us') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link class="text-white hover:text-gray-300" :href="route('guest-contact-us.show')" :active="request()->routeIs('guest-contact-us.show')">
                {{ __('Contact Us') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link class="text-white hover:text-gray-300" :href="route('login')" :active="request()->routeIs('login')">
                {{ __('Login') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link class="text-white hover:text-gray-300" :href="route('register')" :active="request()->routeIs('register')">
                {{ __('Register') }}
            </x-responsive-nav-link>
        </div>
    </div>
</nav>
