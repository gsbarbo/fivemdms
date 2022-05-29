<x-app-layout>
    <div class="p-4 dark:text-off-white">
        <h2 class="text-3xl font-bold text-center">Welcome, {{ auth()->user()->display_name }}</h2>
        <p class="mt-3 text-lg text-center">Your current unit number is: <span
                class="text-2xl font-bold">{{ auth()->user()->badge_number }}</span>. If this is
            wrong please see your department staff.</p>
        <div class="container w-full mx-auto mt-8 md:w-3/5">
            <div class="my-12">
                <h3 class="text-xl text-center">Reports</h3>
            </div>

            <h3 class="text-xl text-center">Patrol Reports</h3>
            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">

                @foreach ($reports as $report)
                    <div class="">
                        <a href="{{ route('portal.reports.create', $report->id) }}">{{ $report->title }}</a><br>
                        <p>{{ $report->description }}</p>
                    </div>
                @endforeach

            </div>

        </div>
    </div>

</x-app-layout>
