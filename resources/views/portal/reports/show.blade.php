<x-app-layout>
    <div class="container w-full mx-auto lg:w-3/5 p-3">
        <div class="">
            <h1 class="text-3xl font-semibold text-center">Welcome, {{ auth()->user()->display_name }}</h1>
            <x-back-button />
        </div>

        <div class="my-5">
            <h3 class="text-2xl font-semibold text-center">{{ $report->report_form->title }} --
                {{ $report->id }}
            </h3>
            <div class="space-y-8 sm:space-y-5">

                <div>
                    <h3 class="text-lg font-semibold underline">Report Information</h3>
                    <h3 class="mt-3"><b>Report Type: </b>{{ $report->report_form->title }}</h3>
                    <p class=""><b>Report Description:</b><br>
                    <p class="ml-10 max-w-xl">{{ $report->report_form->description }}</p>
                    </p>
                    <p class=""><b>Report Time: </b> {{ $report->created_at }}</p>
                    <p><b>Report Updated At: </b> {{ $report->updated_at }}</p>
                    @if ($report->patrol)
                        <p><b>Patrol: </b> <a class="text-blue-900 dark:text-blue-400 hover:underline"
                                href="{{ route('portal.patrols.show', $report->patrol_id) }}">Patrol
                                #{{ $report->patrol_id }}
                            </a></p>
                    @else
                        <p><b>Patrol: </b> Not Linked</p>
                    @endif
                    <p><b>User: </b>
                        {{ $report->user->display_name }}</p>
                </div>
                <h3 class="text-lg font-semibold underline">Report Answers</h3>

                <div class="space-y-8 divide-y divide-gray-800 dark:divide-gray-200 sm:space-y-5">
                    @foreach ($report_questions as $question => $answer)
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                            <p class="block font-medium sm:mt-px sm:pt-2">
                                {{ strtoupper(str_replace('_', ' ', $question)) }}</p>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <p class="block w-full max-w-lg rounded-md">
                                    {{ $answer }}
                                </p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>

</x-app-layout>
