<x-app-layout>
    <div class="container w-full mx-auto lg:w-3/5 p-3">
        <div class="">
            <h1 class="text-3xl font-semibold text-center">Welcome, {{ auth()->user()->display_name }}</h1>
            <x-back-button href="{{ route('portal.dashboard') }}" />
        </div>

        <a href="#new_reports">
            <x-bladewind.button color="green">New Reports</x-bladewind.button>
        </a>

        <div class="my-5">
            <h3 class="text-xl font-semibold text-center">Completed Reports</h3>
            <livewire:reports-table />
        </div>

        <hr>

        <div class="my-5">
            <h3 class="text-xl font-semibold text-center" id="new_reports">Create New Reports</h3>
            <div class="space-y-8 divide-y divide-gray-800 dark:divide-gray-200 sm:space-y-5">
                @foreach ($report_forms as $report)
                    <div class="md:flex md:justify-between pt-5">
                        <div class="w-3/4">
                            <h2 class="font-semibold text-lg underline">{{ $report->title }}</h2>
                            <p>{{ $report->description }}</p>
                        </div>

                        <a href="{{ route('portal.reports.create', $report->id) }}">
                            <x-bladewind.button color="green">Create report</x-bladewind.button>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

</x-app-layout>
