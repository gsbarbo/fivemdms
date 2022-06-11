<div class="w-full text-gray-400 bg-secondary">
    <div x-data="{ open: false }"
        class="flex flex-col px-4 mx-auto max-w-screen-2xl md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
        <div class="flex flex-row items-center justify-between p-4">
            {{-- <img src="{{ asset('images/logo.png') }}" width="60" height="60" alt=""> --}}
            <a href="{{ route('portal.dashboard') }}}"
                class="text-lg font-semibold tracking-widest text-white uppercase rounded-lg xl:ml-3 focus:outline-none focus:shadow-outline">
                {{ config('app.name') }} - Portal
            </a>
            <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline text-action"
                @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path x-show="!open" fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <nav :class="{ 'flex': open, 'hidden': !open }"
            class="flex-col flex-grow hidden pb-4 md:pb-0 md:flex md:justify-end md:flex-row">

            <a class="md:mt-0 hover:text-white px-3 py-2 mt-3 font-semibold rounded-lg {{ Request::is('portal') ? 'text-white' : '' }}"
                href="{{ route('portal.dashboard') }}">Home</a>
            <a class="md:mt-0 hover:text-white px-3 py-2 mt-3 font-semibold rounded-lg {{ Request::is('portal/reports/*') || Request::is('portal/reports') ? 'text-white' : '' }}"
                href="{{ route('portal.reports.index') }}">Reports</a>
            <a class="md:mt-0 hover:text-white px-3 py-2 mt-3 font-semibold rounded-lg {{ Request::is('portal/patrols/*') || Request::is('portal/patrols') ? 'text-white' : '' }}"
                href="{{ route('portal.patrols.index') }}">Patrols</a>
            {{-- <a class="md:mt-0 hover:text-white px-3 py-2 mt-3 font-semibold rounded-lg {{ Request::is('portal/roster') ? 'text-white' : '' }}"
                href="{{ route('portal.roster.index') }}">Roster</a> --}}

            @can('staff_access')
                <a class="md:mt-0 hover:text-white px-3 py-2 mt-3 font-semibold rounded-lg {{ Request::is('/portal/staff/*') ? 'text-white' : '' }}"
                    href="{{ route('portal.staff.dashboard') }}">Staff</a>
            @endcan

            @can('admin_access')
                <a class="md:mt-0 hover:text-white px-3 py-2 mt-3 font-semibold rounded-lg {{ Request::is('/portal/admin/*') ? 'text-white' : '' }}"
                    href="{{ route('portal.admin.dashboard') }}">Admin</a>
            @endcan

            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex flex-row items-center w-full px-2 py-2 mt-2 font-semibold text-left bg-transparent rounded-lg md:w-auto md:inline md:mt-0 md:ml-4">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->display_name) }}"
                        class="inline rounded-full" width="30" height="30" alt="">
                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{ 'rotate-180': open, 'rotate-0': !open }"
                        class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95"
                    class="absolute right-0 z-30 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                    <div class="px-2 py-2 rounded-md shadow bg-primary text-action">

                        <p class="block px-4 py-2 mt-2 text-sm font-bold text-center rounded-lg bg-secondary md:mt-0">
                            {{ Auth::user()->display_name }}</p>

                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:bg-gray-900"
                            href="{{ route('auth.account.show', auth()->user()->steam_hex) }}">Your Account</a>
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:bg-gray-900"
                            href="{{ route('auth.account.show', auth()->user()->steam_hex) }}">Settings</a>

                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:bg-gray-900"
                            href="{{ route('logout') }}">Logout</a>
                    </div>
                </div>
            </div>


            <a class="px-3 py-2 mt-3 font-semibold rounded-lg md:mt-0 hover:text-white" href="#">

                <label for="toggle" class="dark:text-yellow-400 text-action">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        x-show="darkMode" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        x-show="!darkMode" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </label>

                <input id="toggle" type="checkbox" class="hidden" :value="darkMode"
                    @change="darkMode = !darkMode" />
            </a>
        </nav>
    </div>
</div>
