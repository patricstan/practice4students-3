<nav class="bg-white dark:bg-gray-900 fixed w-full z-[9] top-0 left-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

        <x-app.logo />



        <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <x-guest.nav-link :href="route('home')" :active="request()->routeIs('home')">
                    Home
                </x-guest.nav-link>

                <x-guest.nav-link :href="route('companies')" :active="request()->routeIs('companies')">
                    Companies
                </x-guest.nav-link>

                <x-guest.nav-link :href="route('offers')" :active="request()->routeIs('offers')">
                    Offers
                </x-guest.nav-link>

                @unless(Auth::check())
                @if (Route::has('login'))
                <x-guest.nav-link :href="route('login')" :active="request()->routeIs('login')">
                    Login
                </x-guest.nav-link>

                @if (Route::has('register'))
                <x-guest.nav-link :href="route('register')" :active="request()->routeIs('register')">
                    Regsiter
                </x-guest.nav-link>
                @endif
                @endif
                @endunless

                @auth
                <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                        {{auth()->name}}
                        <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg></button>
                    <!-- Dropdown menu -->
                    <x-guest.nav-dropdown>
                        <x-guest.nav-dropdown-link :href="route('home')">
                            Home
                        </x-guest.nav-dropdown-link>
                    </x-guest.nav-dropdown>
                </li>

                @endauth
            </ul>
        </div>




</nav>