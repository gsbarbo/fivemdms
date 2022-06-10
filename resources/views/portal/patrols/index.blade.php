<x-app-layout>
    <div class="container w-full mx-auto lg:w-3/5 p-3">
        <div class="">
            <h1 class="text-3xl font-semibold text-center">Welcome, {{ auth()->user()->display_name }}</h1>
            <p class="mt-3 text-lg text-center">Your current unit number is: <span
                    class="text-2xl font-bold">{{ auth()->user()->badge_number }}</span>. If this is
                wrong please see your department staff.</p>
            <x-back-button href="{{ route('portal.dashboard') }}" />
        </div>

        <div class="my-5">
            <p class="text-lg text-center">Your current status is:
                @if (auth()->user()->hasActivePatrol())
                    <span class="text-2xl font-bold text-green-700">On Duty</span>
                @else
                    <span class="text-2xl font-bold text-red-700">Off Duty</span>
                @endif
            </p>
        </div>

        <div class="my-5">
            <div class="block text-center">

                @if (auth()->user()->hasActivePatrol())
                    <form action="{{ route('portal.patrols.update',auth()->user()->patrol()->running()->id) }}"
                        method="POST">
                        @method('put')
                        @csrf
                        <x-bladewind.button color="red" can_submit="true">Go Off Duty</x-bladewind.button>
                    </form>
                @else
                    <form action="{{ route('portal.patrols.store') }}" method="POST">
                        @csrf
                        <x-bladewind.button color="green" can_submit="true">Go On Duty</x-bladewind.button>
                    </form>
                @endif

            </div>
        </div>
        <h3 class="text-xl font-semibold text-center">Completed Patrols</h3>
        <div class="my-5">
            <table class="min-w-full divide-y divide-black dark:divide-gray-300">
                <thead class="bg-secondary text-off-white">
                    <tr>
                        <th scope="col" class="text-left text-sm font-semibold">
                            ID</th>
                        <th scope="col" class="text-left text-sm font-semibold">
                            Length</th>
                        <th scope="col" class="text-left text-sm font-semibold">End Time</th>
                        <th scope="col" class="text-left text-sm font-semibold"></th>
                    </tr>
                </thead>
                <tbody
                    class="text-sm bg-gray-200 divide-y divide-black dark:divide-gray-200 dark:bg-secondary md:text-base">

                    @foreach ($patrols as $patrol)
                        <tr>
                            <td class="">
                                {{ $patrol->id }}
                            </td>
                            <td class="">
                                {{ $patrol->totalTime() }}
                            </td>
                            <td class="">
                                {{ $patrol->stopped_at->format('m-d-Y H:m:i') }}
                            </td>
                            <td>
                                <a href="{{ route('portal.patrols.show', $patrol->id) }}">
                                    <x-bladewind.button color="blue" size="tiny">View</x-bladewind.button>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
