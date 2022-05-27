<x-app-layout>
    <div class="p-4 dark:text-off-white">
        <h2 class="text-3xl font-bold text-center">Welcome, {{ auth()->user()->display_name }}</h2>
        <p class="mt-3 text-lg text-center">Your current unit number is: <span
                class="text-2xl font-bold">{{ auth()->user()->badge_number }}</span>. If this is
            wrong please see your department staff.</p>
        <div class="mt-16">
            {{ $patrol->started_at }}
            <br>
            On this page:
            <ul>
                <li>show how long and start and end times</li>
                <li>add models for reports - Might use the new window option like old cad?</li>
                <li>show status from supervisor review</li>
                <li>add comment system</li>
            </ul>
        </div>
    </div>

</x-app-layout>
