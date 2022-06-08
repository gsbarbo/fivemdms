<x-staff-layout>
    <div class="container w-full mx-auto lg:w-3/5">
        <h1 class="text-3xl font-semibold text-center">Viewing User: {{ $user->display_name }}</h1>

        <div class="container w-9/12 h-64 p-5 mx-auto my-5">
            <div class="">

                <div class="text-center">
                    <p class="dark:text-off-white"><b>Steam Hex</b>: {{ $user->steam_hex }}</p>
                    <p class="dark:text-off-white"><b>Discord ID</b>: {{ $user->discord_id }}</p>
                    <p class="dark:text-off-white"><b>Discord Name</b>: {{ $user->discord_name }}</p>

                    <p class="dark:text-off-white"><b>Current Status</b>: {{ $user->account_status_name }}</p>

                </div>

                <hr>
                <h3 class="text-xl font-semibold">Account Status</h3>
                <form action="{{ route('portal.staff.users.update_status', $user->steam_hex) }}" method="post">
                    @csrf
                    @method('put')
                    <label for="account_status" class="block text-sm font-medium text-gray-200 sm:mt-px sm:pt-2">
                        Current Account Status </label>
                    <select id="account_status" name="account_status"
                        class="block w-full max-w-lg text-black border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm">
                        @foreach ($account_statuses as $status)
                            <option value="{{ $status->id }}"
                                @if ($user->account_status == $status->id) selected="selected" @endif>
                                {{ $status->name }}</option>
                        @endforeach
                    </select>

                    <x-bladewind.button size="small" color="blue" can_submit="true">Save
                    </x-bladewind.button>

                </form>


                <hr>
                <h3 class="text-xl font-semibold">Edit Account</h3>


            </div>
        </div>
    </div>
</x-staff-layout>
