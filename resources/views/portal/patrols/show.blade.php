<x-app-layout>
    <div class="p-4 dark:text-off-white">
        <h2 class="text-3xl font-bold text-center">Welcome, {{ auth()->user()->display_name }}</h2>
        <p class="mt-3 text-lg text-center">Your current unit number is: <span
                class="text-2xl font-bold">{{ auth()->user()->badge_number }}</span>. If this is
            wrong please see your department staff.</p>
        <div class="container w-full mx-auto mt-8 md:w-3/5">
            <x-back-button />
            <div class="my-12">
                <h3 class="text-xl text-center">Patrol Information</h3>
                <p><b>Start Time: </b> {{ $patrol->started_at }}</p>
                <p><b>End Time: </b> {{ $patrol->stopped_at }}</p>
                <p><b>Patrol Time: </b> {{ $patrol->totalTime() }}</p>
            </div>

            <div class="my-12">
                <h3 class="text-xl text-center">Patrol Reports</h3>
                <div class="space-y-7">
                    @foreach ($patrol->reports as $report)
                        <a href="{{ route('portal.reports.show', [$report->report_form->id, $report->id]) }}">
                            <x-bladewind.button size="small">{{ $report->id }} -
                                {{ $report->report_form->title }}</x-bladewind.button>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="my-12">
                <h3 class="text-xl text-center">Add New Report</h3>
                @foreach ($fillable_reports as $report)
                    <x-bladewind.button size="small" color="green"><a
                            href="{{ route('portal.reports.create', $report->id) }}">{{ $report->title }}</a>
                    </x-bladewind.button>
                @endforeach
            </div>

        </div>
    </div>

</x-app-layout>
