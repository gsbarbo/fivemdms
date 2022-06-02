<x-app-layout>
    <div class="p-4 dark:text-off-white">
        <div class="container w-full mx-auto mt-8 md:w-3/5">
            <h2 class="text-3xl font-bold text-center">Welcome, {{ auth()->user()->display_name }}</h2>
            <p class="mt-3 text-lg text-center">Your current unit number is: <span
                    class="text-2xl font-bold">{{ auth()->user()->badge_number }}</span>. If this is
                wrong please see your department staff.</p>
            <x-back-button />
        </div>
        <div class="container w-full mx-auto mt-8 md:w-3/5">
            <div class="mt-10 space-y-8 divide-y divide-gray-200 sm:space-y-5">
                <div>
                    <div>
                        <h3 class="text-3xl font-medium leading-6">{{ $report->report_form->title }}</h3>
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
                            <div
                                class="border-t border-gray-200 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
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
            </div>
        </div>





    </div>


</x-app-layout>
