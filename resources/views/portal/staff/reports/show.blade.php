<x-staff-layout>
    <div class="container w-full mx-auto lg:w-3/5">
        <x-back-button />
        <x-bladewind.card title="{{ $report->report_form->title }} for patrol: {{ $report->patrol_id }}">
            <div>
                <div>
                    <p class="max-w-2xl mt-1 text-sm text-gray-300">{{ $report->report_form->description }}</p>
                    <p class="border-t border-gray-200">Report time: {{ $report->created_at }}</p>
                    <p>Last update: {{ $report->updated_at }}</p>
                    @if ($report->patrol)
                        <p>Patrol: <a class="underline"
                                href="{{ route('portal.patrols.show', $report->patrol_id) }}">{{ $report->patrol_id }}
                            </a></p>
                    @else
                        <p>Patrol: Not Linked</p>
                    @endif
                    <p>User:
                        {{ $report->user->display_name }}</p>
                </div>
                <div class="mt-6 space-y-6 sm:mt-5 sm:space-y-5">
                    @foreach ($report_questions as $question => $answer)
                        <div class="border-t border-gray-200 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                            <p class="block text-sm font-medium text-gray-200 sm:mt-px sm:pt-2">
                                {{ strtoupper(str_replace('_', ' ', $question)) }}</p>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <p class="block w-full max-w-lg text-white rounded-md shadow-sm sm:text-sm">
                                    {{ $answer }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mt-3">
                <x-bladewind.button size="small" color="green">Approve</x-bladewind.button>
                <x-bladewind.button size="small" color="red">Deny</x-bladewind.button>
            </div>
        </x-bladewind.card>
    </div>

</x-staff-layout>
