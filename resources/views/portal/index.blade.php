<x-app-layout>
    <div class="container w-full mx-auto lg:w-3/5 p-3">
        <h1 class="text-3xl font-semibold text-center">Welcome, {{ auth()->user()->display_name }}</h1>

        <div class="my-5">
            <h2 class="text-xl font-semibold text-center">Announcements</h2>
            {{-- <a href="#" class="text-blue-500">View All</a>
            <a href="#" class="text-green-500">Create New</a> --}}
            <div class="">
                <div class="p-3 my-2 border-2 border-gray-900">
                    <div class="flex">
                        <div class="my-auto mr-2 border-r-2 border-gray-900">
                            <p class="text-sm font-bold uppercase text-secondary dark:text-off-white"
                                style="writing-mode: vertical-lr; text-orientation: upright;">Welcome</p>
                        </div>
                        <div class="">
                            <p class="text-lg font-bold dark:text-gray-200">Welcome to FiveM DMS</p>
                            <p class="">Welcome to the FiveM Department Manager System.
                                This system is to
                                aid in the running of departments in a roleplay community. This is targeted towards the
                                FiveM but will work with any roleplay community on Roblox, PS5 or Xbox. This is still a
                                work in progress and will receive updates on a weekly basis. If you have any feedback
                                please join my discord at <a class="text-blue-800 dark:text-blue-400 hover:underline"
                                    href="https://discord.gages.space" target="_blank">https://discord.gages.space</a>.
                            </p>
                            <p class="mt-2">
                                Have several amazing features planned out. Follow on Github to track progress and
                                suggest features. <a class="text-blue-800 dark:text-blue-400 hover:underline"
                                    href="https://github.com/gsbarbo/fivemdms"
                                    target="_blank">https://github.com/gsbarbo/fivemdms</a>
                            </p>
                        </div>
                    </div>
                    <p class="text-right">Posted by: Admin at
                        Today
                    </p>
                </div>
                {{-- <p class="text-white">Showing 3 of 6. View all <a href="#" class="link-blue">here</a>.</p> --}}
            </div>
        </div>

        <div class="my-5">
            <h2 class="text-xl font-semibold text-center">Quick Links</h2>

            <div class="space-x-4 space-y-4">
                <a href="{{ route('portal.patrols.index') }}">
                    <x-bladewind.button>Start Patrol</x-bladewind.button>
                </a>

                <a href="{{ route('portal.reports.index') }}">
                    <x-bladewind.button>New Report</x-bladewind.button>
                </a>

                <a href="{{ route('portal.roster.index') }}">
                    <x-bladewind.button>Department Roster</x-bladewind.button>
                </a>

                @can('staff_access')
                    <a href="{{ route('portal.staff.dashboard') }}">
                        <x-bladewind.button color="red">Staff Area</x-bladewind.button>
                    </a>
                @endcan


                @can('staff_access')
                    <a href="{{ route('portal.admin.dashboard') }}">
                        <x-bladewind.button color="red">Admin Area</x-bladewind.button>
                    </a>
                @endcan
            </div>
        </div>
    </div>

</x-app-layout>
