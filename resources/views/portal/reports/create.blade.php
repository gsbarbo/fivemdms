<x-app-layout>
    <div class="container w-full mx-auto lg:w-3/5 p-3">
        <div class="">
            <h1 class="text-3xl font-semibold text-center">Welcome, {{ auth()->user()->display_name }}</h1>
            <x-back-button />
        </div>
        <div class="">
            <h3 class="text-2xl font-semibold text-center">{{ $report_form->title }}</h3>
            <p class=""><b>Report Description:</b><br>
            <p class="ml-10 max-w-xl">{{ $report_form->description }}</p>


            </p>
        </div>

        <form class="space-y-8 sm:space-y-5" action="{{ route('portal.reports.store', $report_form->id) }}"
            method="POST">
            @csrf
            <div>
                <h3 class="text-lg font-semibold underline">Report Qustions</h3>
                <p class="mt-2 text-red-500 text-sm">All fields are required</p>
            </div>
            <div class="space-y-8 divide-y divide-gray-800 dark:divide-gray-200 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                    <label for="patrol_id" class="block font-medium sm:mt-px sm:pt-2">
                        Was this linked to a patrol?</label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <select id="patrol_id" name="patrol_id"
                            class="block w-full max-w-lg text-black rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm">
                            <option value="0">No</option>
                            @foreach ($patrols as $patrol)
                                <option value="{{ $patrol->id }}"
                                    @if ($patrol_id == $patrol->id) selected="selected" @endif
                                    @if (old('patrol_id') == $patrol->id) selected="selected" @endif>
                                    {{ $patrol->id }} - {{ $patrol->stopped_at->format('m/d/Y H:m') }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                @foreach ($report_form->report_questions as $question)
                    @if ($question->type == 'textarea')
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                            <label for="{{ strtolower(str_replace(' ', '_', $question->question)) }}"
                                class="block font-medium sm:mt-px sm:pt-2">
                                {{ $question->question }} </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <textarea id="{{ strtolower(str_replace(' ', '_', $question->question)) }}"
                                    name="{{ strtolower(str_replace(' ', '_', $question->question)) }}" rows="3"
                                    class="block w-full max-w-lg text-black border  rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old(strtolower(str_replace(' ', '_', $question->question))) }}</textarea>
                            </div>
                            @error(strtolower(str_replace(' ', '_', $question->question)))
                                <p class="text-red-600">This field is required.</p>
                            @enderror
                        </div>
                    @else
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                            <label for="{{ strtolower(str_replace(' ', '_', $question->question)) }}"
                                class="block font-medium sm:mt-px sm:pt-2">
                                {{ $question->question }}
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input type="{{ $question->type }}"
                                    name="{{ strtolower(str_replace(' ', '_', $question->question)) }}"
                                    id="{{ strtolower(str_replace(' ', '_', $question->question)) }}"
                                    value="{{ old(strtolower(str_replace(' ', '_', $question->question))) }}"
                                    class="block w-full max-w-lg text-black rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm">
                            </div>
                            @error(strtolower(str_replace(' ', '_', $question->question)))
                                <p class="text-red-600">This field is required.</p>
                            @enderror
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="pt-5">
                <div class="flex justify-end">
                    <x-bladewind.button size="small" color="green" can_submit="true">Submit</x-bladewind.button>
                </div>
            </div>

        </form>
    </div>





    </div>


</x-app-layout>
