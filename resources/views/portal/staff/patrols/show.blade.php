<x-staff-layout>

    <div class="container w-full mx-auto lg:w-3/5 p-3">
        <div class="">
            <h1 class="text-3xl font-semibold text-center">Welcome, {{ auth()->user()->display_name }}</h1>
            <x-back-button />
        </div>

        <div class="divide-y divide-gray-800 dark:divide-gray-200">
            <div class="my-5">
                <h3 class="text-xl font-semibold text-center">Patrol Information</h3>
                <p><b>Start Time: </b> {{ $patrol->started_at }}</p>
                <p><b>End Time: </b> {{ $patrol->stopped_at }}</p>
                <p><b>Patrol Time: </b> {{ $patrol->totalTime() }}</p>

                <p><b>Department: </b> {{ @$patrol->user_department->department->name }} as
                    {{ @$patrol->user_department->badge_number }}</p>
                <p><b>Subdivison: </b> Soon&#8482;</p>
            </div>

            <div class="my-5">
                <h3 class="text-xl font-semibold text-center">Patrol Reports</h3>
                <div class="space-x-4 space-y-4">
                    @foreach ($patrol->reports as $report)
                        <a href="{{ route('portal.reports.show', [$report->report_form->id, $report->id]) }}">
                            <x-bladewind.button size="small">
                                {{ $report->id }} - {{ $report->report_form->title }}
                            </x-bladewind.button>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-staff-layout>
