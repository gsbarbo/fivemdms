<x-staff-layout>
    <div class="container w-full mx-auto lg:w-3/5 p-3">
        <div class="">
            <h1 class="text-3xl font-semibold text-center">Welcome, {{ auth()->user()->display_name }}</h1>
            <x-back-button />
        </div>

        <div class="my-5">
            <h3 class="text-xl font-semibold text-center">Completed Reports</h3>
            @livewire('staff.report-table')
        </div>

        <hr>

        <div class="my-5">

        </div>

    </div>

</x-staff-layout>
