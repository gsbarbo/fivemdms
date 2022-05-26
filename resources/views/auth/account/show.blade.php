<x-guest-layout>
    <div class="container w-9/12 h-64 p-5 mx-auto my-5">
        <div class="">

            <div class="text-center">

                <h1 class="text-3xl dark:text-off-white">Welcome {{ $user->display_name }}</h1>

                <p class="dark:text-off-white"><b>Steam Hex</b>: {{ $user->steam_hex }}</p>
                <p class="dark:text-off-white"><b>Discord ID</b>: {{ $user->discord_id }}</p>
                <p class="dark:text-off-white"><b>Discord Name</b>: {{ $user->discord_name }}</p>

            </div>

            @if (!config('dms.must_apply') && ($user->account_status == 1 || $user->account_status == 3))
                <div class="p-3 mx-auto my-4 bg-blue-500 rounded-lg shadow-sm md:w-2/3 text-off-white">
                    You must have an admin approve your account or application.
                </div>
            @endif

            @if (config('dms.must_apply') && $user->account_status == 2)
                <div class="p-3 mx-auto my-4 bg-blue-500 rounded-lg shadow-sm md:w-2/3 text-off-white">
                    Your application has been approved. Join the Discord for an interview.
                </div>
            @endif

            @if ($user->account_status == 4)
                <div class="p-3 mx-auto my-4 bg-green-500 rounded-lg shadow-sm md:w-2/3 text-off-white">
                    <a href="{{ route('portal.index') }}">Your account or application has been approved. You may
                        access the panel here</a>.
                </div>
            @endif

            @if ($user->account_status == 5)
                <div class="p-3 mx-auto my-4 bg-red-500 rounded-lg shadow-sm md:w-2/3 text-off-white">
                    Your account has been suspended. You must contact an admin.
                </div>
            @endif

            @if ($user->account_status == 6)
                <div class="p-3 mx-auto my-4 bg-red-500 rounded-lg shadow-sm md:w-2/3 text-off-white">
                    Your account has been banned. You must contact an admin for appeal.
                </div>
            @endif

        </div>
    </div>
</x-guest-layout>
