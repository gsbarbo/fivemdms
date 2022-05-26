<x-guest-layout>

    <div class="container p-5 mx-auto my-5">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <!-- Profile Card -->
                <div class="p-3 bg-gray-200 border-t-4 dark:bg-secondary dark:text-off-white border-action">

                    <div class="overflow-hidden image">
                        <img class="w-full h-auto mx-auto rounded-full"
                            src="https://ui-avatars.com/api/?name={{ urlencode($user->display_name) }}" alt="">

                    </div>
                    <h1 class="my-1 text-xl font-bold leading-8 text-action">{{ $user->display_name }}</h1>
                    <h3 class="leading-6 text-gray-600 dark:text-gray-400 font-lg text-semibold">Community Rank</h3>

                    <ul class="px-3 py-2 mt-3 divide-y rounded">

                        <li class="flex items-center py-3">
                            <span>Status</span>
                            <span class="ml-auto"><span
                                    class="px-2 py-1 text-sm text-white bg-green-500 rounded">Active</span></span>
                        </li>
                        <li class="flex items-center py-3">
                            <span>Member since</span>
                            <span class="ml-auto">{{ $user->created_at->format('M d, Y') }}</span>
                        </li>
                        <li class="flex items-center py-3">
                            <span class="ml-auto"><a href="#"
                                    class="w-full px-2 py-1 text-sm text-white bg-blue-500 rounded hover:bg-blue-700">Send
                                    Message</a></span>

                        </li>

                    </ul>
                </div>
                <!-- End of profile card -->
                <div class="my-4"></div>


            </div>
            <!-- Right Side -->
            <div class="w-full h-64 mx-2 md:w-9/12">
                <!-- Profile tab -->
                <!-- About Section -->
                <div class="p-3 bg-white rounded-lg shadow-sm dark:bg-secondary dark:text-off-white">

                    <div class="flex items-center space-x-2 font-semibold leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide">About</span>
                    </div>
                    <div class="">
                        <div class="grid text-sm md:grid-cols-2">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Display Name</div>
                                <div class="px-4 py-2">{{ $user->display_name }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Last Patrol</div>
                                <div class="px-4 py-2">Doe</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Community Rank</div>
                                <div class="px-4 py-2">Sargent</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Total Patrol Time</div>
                                <div class="px-4 py-2">1001 hours</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Account Status</div>
                                <div class="px-4 py-2">{{ $user->statusName }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Discord Name</div>
                                <div class="px-4 py-2">{{ $user->discord_name }}</div>

                            </div>


                        </div>
                    </div>
                </div>
                <!-- End of about section -->

                <div class="my-4"></div>

                @if (config('dms.must_apply'))


                    <div class="p-3 bg-white rounded-lg shadow-sm dark:bg-secondary dark:text-off-white">

                        <div class="">
                            <div>
                                <div class="flex items-center mb-3 space-x-2 font-semibold leading-8">
                                    <span clas="text-green-500">
                                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </span>
                                    <span class="tracking-wide">Applications</span>
                                </div>
                                <div>
                                    @forelse ($user->applications as $application)
                                        <div class="border-y-2">
                                            <div class="grid text-sm md:grid-cols-2">
                                                <div class="grid grid-cols-2">
                                                    <div class="px-4 py-2 font-semibold">Application ID</div>
                                                    <div class="px-4 py-2">{{ $application->id }}</div>
                                                </div>
                                                <div class="grid grid-cols-2">
                                                    <div class="px-4 py-2 font-semibold">Submitted At</div>
                                                    <div class="px-4 py-2">
                                                        {{ $application->created_at->format('m-d-Y H:i') }}</div>

                                                </div>
                                                <div class="grid grid-cols-2">
                                                    <div class="px-4 py-2 font-semibold">Status</div>
                                                    <div class="px-4 py-2">{{ $application->statusName }}</div>
                                                </div>


                                            </div>
                                        </div>
                                    @empty
                                        <p>No applications on file.</p>
                                    @endforelse

                                    <a href="{{ route('apply.application.create', '1') }}" class="">
                                        <x-button>Apply Now</x-button>
                                    </a>


                                </div>
                            </div>

                        </div>


                    </div>
                @endif

                <!-- End of profile tab -->
                <div class="my-4"></div>

                <div class="p-3 bg-white rounded-lg shadow-sm dark:bg-secondary dark:text-off-white">

                    <div class="">
                        <div>
                            <div class="flex items-center mb-3 space-x-2 font-semibold leading-8">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">Admin Options</span>
                            </div>
                            <div>


                                <a href="#" class="">
                                    <x-button>Approve Member</x-button>
                                </a>

                                <a href="#" class="">
                                    <x-button>Suspend Member</x-button>
                                </a>

                                <a href="#" class="">
                                    <x-button>Ban Member</x-button>
                                </a>

                                <a href="#" class="">
                                    <x-button>Warn Member</x-button>
                                </a>

                                <a href="#" class="">
                                    <x-button>Issue 10-95</x-button>
                                </a>





                            </div>
                        </div>

                    </div>
                    <!-- End of Experience and education grid -->
                </div>


            </div>
        </div>
    </div>

</x-guest-layout>
