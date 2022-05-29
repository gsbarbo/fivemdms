<x-app-layout>
    <div class="p-4 dark:text-off-white">
        <h2 class="text-3xl font-bold text-center">Welcome, {{ auth()->user()->display_name }}</h2>
        <p class="mt-3 text-lg text-center">Your current unit number is: <span
                class="text-2xl font-bold">{{ auth()->user()->badge_number }}</span>. If this is
            wrong please see your department staff.</p>
        <div class="container w-full mx-auto mt-8 md:w-3/5">
            <div class="my-12">
                <h3 class="text-xl text-center">{{ $report_form->title }}</h3>
                <p>{{ $report_form->description }}</p>
            </div>

            <div class="my-12">
                <form action="{{ route('portal.report.store', $report_form->id) }}" method="POST"
                    class="text-black">
                    @csrf

                    Was this linked to a patrol? If so choose patrol id here:

                    <select name="patrol_id" id="">
                        <option value="0">No</option>
                        @foreach ($patrols as $patrol)
                            <option value="{{ $patrol->id }}">{{ $patrol->id }}</option>
                        @endforeach
                    </select>

                    @foreach ($report_form->report_questions as $question)
                        {{ $question->question }}
                        @if ($question->type == 'textarea')
                            <textarea name="{{ strtolower(str_replace(' ', '_', $question->question)) }}" id="" cols="30" rows="10"></textarea>
                        @else
                            <input type="{{ $question->type }}"
                                name="{{ strtolower(str_replace(' ', '_', $question->question)) }}">
                        @endif
                    @endforeach

                    <input type="submit" value="Save">
                </form>
            </div>

        </div>
    </div>

</x-app-layout>
