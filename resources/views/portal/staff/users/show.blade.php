<x-staff-layout>
    <div class="container w-full mx-auto lg:w-3/5">
        <h1 class="text-3xl font-semibold text-center">Viewing User: {{ $user->display_name }}</h1>

        <x-back-button href="{{ route('portal.staff.users.index') }}" />

        <div class="container w-9/12 h-64 p-5 mx-auto my-5">
            <div class="">

                <div class="text-center">
                    <p class="dark:text-off-white"><b>Steam Hex</b>: {{ $user->steam_hex }}</p>
                    <p class="dark:text-off-white"><b>Discord ID</b>: {{ $user->discord_id }}</p>
                    <p class="dark:text-off-white"><b>Discord Name</b>: {{ $user->discord_name }}</p>

                    <p class="dark:text-off-white"><b>Current Status</b>: {{ $user->account_status_name }}</p>
                    <hr>

                </div>
                @if ($user->is_protected_user && !auth()->user()->is_super_user)
                    <p>This user can only be changed by a super user. Which you are not.</p>
                @else
                    <h3 class="text-xl font-semibold">Account Status</h3>

                    @if (config('dms.must_apply'))
                        show some sort of warning about statuses
                    @endif

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

                    <form action="{{ route('portal.staff.users.update', $user->steam_hex) }}" method="post">
                        <x-auth-validation-errors />
                        @csrf
                        @method('put')

                        <label for="display_name" class="block text-sm font-medium text-gray-200 sm:mt-px sm:pt-2">
                            Display Name </label>
                        <input id="display_name" name="display_name" type="text" value="{{ $user->display_name }}"
                            class="block w-full max-w-lg text-black border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm" />
                        <br>
                        @if (auth()->user()->is_super_user)
                            <label class="inline-flex items-center text-sm cursor-pointer">
                                <input
                                    class="w-5 h-5 mr-2 text-blue-500 border border-gray-300 rounded disabled:opacity-60 focus:ring-blue-400 focus:ring-opacity-25 bw-checkbox"
                                    type="checkbox" name="is_protected_user"
                                    @if ($user->is_protected_user == 1) checked="checked" @endif>
                                Is Protected User
                            </label>
                            <br>
                            <label class="inline-flex items-center text-sm cursor-pointer">
                                <input
                                    class="w-5 h-5 mr-2 text-blue-500 border border-gray-300 rounded disabled:opacity-60 focus:ring-blue-400 focus:ring-opacity-25 bw-checkbox"
                                    type="checkbox" name="is_super_user"
                                    @if ($user->is_super_user == 1) checked="checked" @endif>
                                Is Super User
                            </label>
                        @endif
                        <br>

                        <x-bladewind.button size="small" color="blue" can_submit="true">Save
                        </x-bladewind.button>

                    </form>

                @endif

                <hr>
                <h3 class="text-xl font-semibold">Edit Departments</h3>
                @csrf
                @method('put')
                <div class="m-2 space-y-4 divide-y divide-white">
                    @foreach ($departments as $department)
                        @php
                            if (in_array($department->id, $user->user_departments->toArray())) {
                                echo 'member';
                            }
                        @endphp
                        <form action="{{ route('portal.staff.users.update', $user->steam_hex) }}" method="post">
                            <label
                                class="block font-bold text-gray-200 sm:mt-px sm:pt-2">{{ $department->name }}</label>
                            <div class="space-y-5 md:flex md:justify-around md:space-y-0">
                                <div class="">
                                    <label for="rank"
                                        class="block text-sm font-medium text-gray-200 sm:mt-px sm:pt-2">Rank</label>
                                    <input id="rank" name="rank" type="text" value="{{ old('rank') }}"
                                        required
                                        class="block max-w-lg text-black border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm" />
                                </div>
                                <div class="">
                                    <label for="unit_number"
                                        class="block text-sm font-medium text-gray-200 sm:mt-px sm:pt-2">Unit
                                        Number</label>
                                    <input id="unit_number" name="unit_number" type="text" required
                                        value="{{ old('unit_number') }}"
                                        class="block max-w-lg text-black border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm" />
                                </div>

                                <x-bladewind.button size="small" color="blue" can_submit="true">Save
                                </x-bladewind.button>
                            </div>
                        </form>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</x-staff-layout>
