<x-app-layout>
    <div class="p-4 dark:text-off-white">
        <h2 class="text-3xl font-bold text-center">Welcome, {{ auth()->user()->display_name }}</h2>
        <p class="mt-3 text-lg text-center">Your current unit number is: <span
                class="text-2xl font-bold">{{ auth()->user()->badge_number }}</span>. If this is
            wrong please see your department staff.</p>
        <div class="container w-full mx-auto mt-8 md:w-3/5">
            <a href="{{ route('portal.patrols.index') }}">
                <button type="button"
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Back</button>
            </a>
            <form class="space-y-8 divide-y divide-gray-200"
                action="{{ route('portal.report.store', $report_form->id) }}" method="POST">
                @csrf
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    <div>
                        <div>
                            <h3 class="text-3xl font-medium leading-6">{{ $report_form->title }}</h3>
                            <p class="max-w-2xl mt-1 text-sm text-gray-300">{{ $report_form->description }}</p>
                        </div>
                        <div class="mt-6 space-y-6 sm:mt-5 sm:space-y-5">
                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="patrol_id" class="block text-sm font-medium text-gray-200 sm:mt-px sm:pt-2">
                                    Was this linked to a patrol? If so choose patrol id here </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <select id="patrol_id" name="patrol_id"
                                        class="block w-full max-w-lg text-black border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm">
                                        <option value="0">No</option>
                                        @foreach ($patrols as $patrol)
                                            <option value="{{ $patrol->id }}">{{ $patrol->id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            @foreach ($report_form->report_questions as $question)
                                @if ($question->type == 'textarea')
                                    <div
                                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label for="{{ strtolower(str_replace(' ', '_', $question->question)) }}"
                                            class="block text-sm font-medium text-gray-200 sm:mt-px sm:pt-2">
                                            {{ $question->question }} </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <textarea id="{{ strtolower(str_replace(' ', '_', $question->question)) }}"
                                                name="{{ strtolower(str_replace(' ', '_', $question->question)) }}"
                                                rows="3"
                                                class="block w-full max-w-lg text-black border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>

                                        </div>
                                    </div>
                                @else
                                    <div
                                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label for="{{ strtolower(str_replace(' ', '_', $question->question)) }}"
                                            class="block text-sm font-medium text-gray-200 sm:mt-px sm:pt-2">
                                            {{ $question->question }}
                                        </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <input type="{{ $question->type }}"
                                                name="{{ strtolower(str_replace(' ', '_', $question->question)) }}"
                                                id="{{ strtolower(str_replace(' ', '_', $question->question)) }}"
                                                class="block w-full max-w-lg text-black border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm">
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="pt-5">
                    <div class="flex justify-end">

                        <button type="submit"
                            class="inline-flex justify-center px-4 py-2 ml-3 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                    </div>
                </div>

            </form>
        </div>





    </div>


</x-app-layout>
