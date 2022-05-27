<x-app-layout>
    <div class="p-4 dark:text-off-white">
        <h2 class="text-3xl font-bold text-center">Welcome, {{ auth()->user()->display_name }}</h2>
        <p class="mt-3 text-lg text-center">Your current unit number is: <span
                class="text-2xl font-bold">{{ auth()->user()->badge_number }}</span>. If this is
            wrong please see your department staff.</p>
        <p class="mt-3 text-lg text-center">Your current status is:
            @if (auth()->user()->hasActivePatrol())
                <span class="text-2xl font-bold text-green-700">On Duty</span>
            @else
                <span class="text-2xl font-bold text-red-700">Off Duty</span>
            @endif
            {{-- If this is wrong <a href="#" class="text-blue-600">click here</a>. --}}
        </p>

        <div class="mt-16">
            <div class="block text-center">

                @if (auth()->user()->hasActivePatrol())
                    <form action="{{ route('portal.patrols.update',auth()->user()->patrol()->running()->id) }}"
                        method="POST">
                        @method('put')

                        @csrf
                        <input type="submit"
                            class="inline-block px-4 py-3 m-3 text-lg bg-red-700 cursor-pointer md:text-2xl md:px-8 md:py-6 hover:bg-red-800 rounded-xl"
                            value="Go Off Duty">

                    </form>
                @else
                    <form action="{{ route('portal.patrols.store') }}" method="POST">
                        @csrf
                        <input type="submit"
                            class="inline-block px-4 py-3 m-3 text-lg bg-green-700 cursor-pointer md:text-2xl md:px-8 md:py-6 hover:bg-green-800 rounded-xl"
                            value="Go On Duty">
                    </form>
                @endif

            </div>
        </div>

        <div class="mt-16">
            <div class="justify-between md:flex">

                <div class="w-full p-4 md:w-1/2">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="items-center text-center sm:flex">
                            <div class="sm:flex-auto">
                                <h1 class="text-xl font-semibold">Recent Patrols Without a Report</h1>
                                <p class="mt-2 text-sm">Reports that don't have an end of watch report attached.
                                    Please click the patrol id to fill out end of watch.</p>
                            </div>
                        </div>
                        <div class="flex flex-col mt-8">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle">
                                    <div
                                        class="overflow-hidden border border-black shadow-sm ring-1 ring-black ring-opacity-5">
                                        <table class="min-w-full divide-y divide-black dark:divide-gray-300">

                                            <thead class="bg-gray-600 dark:bg-gray-800 text-off-white">

                                                <tr>
                                                    <th scope="col"
                                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold sm:pl-6 lg:pl-8">
                                                        ID</th>
                                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">
                                                        Date</th>
                                                </tr>
                                            </thead>
                                            <tbody
                                                class="text-sm bg-gray-200 divide-y divide-black dark:divide-gray-200 dark:bg-secondary md:text-base">

                                                @foreach ($patrols as $patrol)
                                                    <tr>
                                                        <td
                                                            class="py-4 pl-4 pr-3 font-medium text-indigo-500 dark:text-action whitespace-nowrap sm:pl-6 lg:pl-8">
                                                            <a href="{{ route('portal.patrols.show', $patrol->id) }}"
                                                                class="hover:underline">{{ $patrol->id }}</a>
                                                        </td>
                                                        <td
                                                            class="px-3 py-4 text-gray-700 dark:text-off-white whitespace-nowrap">
                                                            {{ $patrol->created_at->format('m-d-Y') }}</td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>



                <div class="w-full p-4 md:w-1/2">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="items-center text-center sm:flex">
                            <div class="sm:flex-auto">
                                <h1 class="text-xl font-semibold">Recent Patrols With Completed Reports</h1>
                                <p class="mt-2 text-sm">Last 5 Patrols. Click here to view all.</p>
                            </div>
                        </div>
                        <div class="flex flex-col mt-8">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle">
                                    <div
                                        class="overflow-hidden border border-black shadow-sm ring-1 ring-black ring-opacity-5">
                                        <table class="min-w-full divide-y divide-black dark:divide-gray-300">

                                            <thead class="bg-gray-600 dark:bg-gray-800 text-off-white">

                                                <tr>
                                                    <th scope="col"
                                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold sm:pl-6 lg:pl-8">
                                                        ID</th>
                                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">
                                                        Date</th>
                                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">
                                                        Length</th>

                                                </tr>
                                            </thead>
                                            <tbody
                                                class="text-sm bg-gray-200 divide-y divide-black dark:divide-gray-200 dark:bg-secondary md:text-base">
                                                {{-- @foreach ($patrols as $patrol)
                                                    <tr>
                                                        <td
                                                            class="py-4 pl-4 pr-3 font-medium text-indigo-500 dark:text-action whitespace-nowrap sm:pl-6 lg:pl-8">
                                                            <a href="{{ route('portal.timeclock.show', $patrol->id) }}"
                                                                class="hover:underline">{{ $patrol->id }}</a></td>
                                                        <td
                                                            class="px-3 py-4 text-gray-700 dark:text-off-white whitespace-nowrap">
                                                            {{ $patrol->created_at->format('m-d-Y') }}</td>
                                                        <td
                                                            class="px-3 py-4 text-gray-700 dark:text-off-white whitespace-nowrap">
                                                            1 hour 30 mins</td>
                                                    </tr>
                                                @endforeach --}}

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>

</x-app-layout>
