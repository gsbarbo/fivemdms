<x-app-layout>
    <div class="p-4 dark:text-off-white">
        <h2 class="text-3xl font-bold text-center">Welcome, {{ auth()->user()->display_name }}</h2>
        <p class="mt-3 text-lg text-center">Your current unit number is: <span
                class="text-2xl font-bold">{{ auth()->user()->badge_number }}</span>. If this is
            wrong please see your department staff.</p>
        <div class="container w-full mx-auto mt-8 md:w-3/5">
            <x-back-button />
            <h3 class="text-2xl font-bold text-center">Create Permission</h3>
            <form class="space-y-8 divide-y divide-gray-200" action="{{ route('portal.admin.roles.store') }}"
                method="POST">
                @csrf
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    <div class="container w-full mx-auto lg:w-3/5">
                        <div
                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="title" class="block text-sm font-medium text-gray-200 sm:mt-px sm:pt-2">
                                Title
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input type="text" name="title" id="title" required value="{{ old('title') }}"
                                    class="block w-full max-w-lg text-black border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm">
                            </div>
                        </div>
                    </div>
                </div>
                <x-auth-validation-errors />
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    <div class="container w-full mx-auto lg:w-3/5">
                        <div
                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="title" class="block text-sm font-medium text-gray-200 sm:mt-px sm:pt-2">
                                Permissions
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">

                                <label class="inline-flex items-center text-sm cursor-pointer">
                                    <input onclick="toggle(this)"
                                        class="w-5 h-5 mr-2 text-blue-500 border border-gray-300 rounded disabled:opacity-60 focus:ring-blue-400 focus:ring-opacity-25 bw-checkbox"
                                        type="checkbox">
                                    Select All
                                </label>
                                <br>
                                <br>
                                @foreach ($permissions as $permission)
                                    <label class="inline-flex items-center text-sm cursor-pointer">
                                        <input
                                            class="w-5 h-5 mr-2 text-blue-500 border border-gray-300 rounded disabled:opacity-60 focus:ring-blue-400 focus:ring-opacity-25 bw-checkbox"
                                            type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                                        {{ $permission->title }}
                                    </label>
                                    <br>
                                @endforeach

                                <script language="JavaScript">
                                    function toggle(source) {
                                        checkboxes = document.getElementsByName('permissions[]');
                                        for (var i = 0, n = checkboxes.length; i < n; i++) {
                                            checkboxes[i].checked = source.checked;
                                        }
                                    }
                                </script>

                            </div>
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
