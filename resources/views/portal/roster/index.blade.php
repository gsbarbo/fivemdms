<x-app-layout>
    <div class="container w-full mx-auto lg:w-3/5 p-3">
        <div class="">
            <h1 class="text-3xl font-semibold text-center">Welcome, {{ auth()->user()->display_name }}</h1>
            <x-back-button />
        </div>

        <div class="my-5">
            <h3 class="text-xl font-semibold text-center">Active Department Members</h3>
            <table class="min-w-full divide-y divide-black dark:divide-gray-300">
                <thead class="bg-secondary text-off-white">
                    <tr>
                        <th scope="col" class="text-left text-sm font-semibold">
                            Discord Name
                        </th>
                        <th scope="col" class="text-left text-sm font-semibold">
                            Display Name
                        </th>
                        <th scope="col" class="text-left text-sm font-semibold">
                            Badge Number
                        </th>
                        <th scope="col" class="text-left text-sm font-semibold hidden md:block">
                            Join Date
                        </th>
                        <th scope="col" class="text-left text-sm font-semibold">
                            Last Login
                        </th>
                    </tr>
                </thead>
                <tbody
                    class="text-sm bg-gray-200 divide-y divide-black dark:divide-gray-200 dark:bg-secondary md:text-base">

                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->discord_name }}</td>
                            <td>{{ $user->display_name }}</td>
                            <td>{{ $user->badge_number }}</td>
                            <td class="hidden md:block">{{ $user->created_at->format('m-d-Y') }}</td>
                            <td>{{ $user->last_login->format('m-d-Y H:m:i') }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
