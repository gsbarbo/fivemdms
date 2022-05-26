<div class="w-full text-gray-400 bg-secondary">
    <div x-data="{ open: false }"
        class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
        <div class="flex flex-row items-center justify-between p-4">
            {{-- <img src="{{ asset('images/logo.png') }}" width="60" height="60" alt=""> --}}
            <a href="#"
                class="text-lg font-semibold tracking-widest text-white uppercase rounded-lg xl:ml-3 focus:outline-none focus:shadow-outline">
                {{ config('app.name') }}
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

            <a class="md:mt-0 hover:text-white px-3 py-2 mt-3 font-semibold rounded-lg {{ Request::is('/') ? 'text-white' : '' }}"
                href="{{ route('home') }}">Home</a>

            {{-- <div @click.away="open = false" class="relative" x-data="{ open: false }">
				<button @click="open = !open"
					class="flex flex-row items-center w-full px-2 py-2 mt-2 font-semibold text-left bg-transparent rounded-lg navbar-item-color md:w-auto md:inline md:mt-0 md:ml-4">
					<span>Departments</span>
					<svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"
						class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
						<path fill-rule="evenodd"
							d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
							clip-rule="evenodd"></path>
					</svg>
				</button>
				<div x-show="open" x-transition:enter="transition ease-out duration-100"
					x-transition:enter-start="transform opacity-0 scale-95"
					x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
					x-transition:leave-start="transform opacity-100 scale-100"
					x-transition:leave-end="transform opacity-0 scale-95"
					class="absolute right-0 z-30 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
					<div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-700">
						<a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:bg-gray-200"
							href="#">Link #1</a>
						<a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:bg-gray-200"
							href="#">Link #2</a>
						<a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:bg-gray-200"
							href="#">Link #3</a>
					</div>
				</div>
			</div> --}}

            @if (Auth::check())
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

                            <p
                                class="block px-4 py-2 mt-2 text-sm font-bold text-center rounded-lg bg-secondary md:mt-0">
                                {{ Auth::user()->display_name }}</p>
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:bg-gray-900"
                                href="{{ route('auth.account.show', auth()->user()->steam_hex) }}">Your Account</a>

                            <?php
                            if (auth()->user()->account_status == 1 && config('dms.must_apply')) {
                                if (auth()->user()->reapply == 'Y') {
                                    if (auth()->user()->reapply_date <= date('Y-m-d')) {
                                        echo '<a href=' . route('apply.application.create', '1') . " class=\"md:mt-0 hover:bg-gray-900 block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg\">Apply For Membership</a>";
                                    }
                                } elseif (is_null(auth()->user()->reapply)) {
                                    echo '<a href=' . route('apply.application.create', '1') . " class=\"md:mt-0 hover:bg-gray-900 block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg\">Apply For Membership</a>";
                                }
                            }
                            ?>

                            @if (auth()->user()->account_status == 4)
                                <a href="{{ route('portal.index') }}"
                                    class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:bg-gray-200">Go
                                    to Portal</a>
                            @endif
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:bg-gray-900"
                                href="{{ route('logout') }}">Logout</a>
                        </div>
                    </div>
                </div>
            @else
                @if (session('steam_hex'))
                    <a class="md:mt-0 hover:text-white px-4 py-2 mt-2 font-semibold text-gray-400 rounded-lg {{ Request::is('account/create') ? 'text-white' : '' }}"
                        href="{{ route('auth.account.create') }}">About
                        You</a>
                @else
                    <a class="px-4 py-2 mt-2 font-semibold text-gray-400 rounded-lg md:mt-0 hover:text-white"
                        href="{{ route('auth.steam') }}">Login</a>
                @endif
            @endif

            <a class="md:mt-0 hover:text-white px-3 py-2 mt-3 font-semibold rounded-lg {{ Request::is('/') ? 'text-white' : '' }}"
                href="{{ route('home') }}"><label for="toggle" class="dark:text-yellow-400 text-action">
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
                    @change="darkMode = !darkMode" /></a>



        </nav>
    </div>
</div>
