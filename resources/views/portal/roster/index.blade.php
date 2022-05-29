<x-app-layout>
    <div class="container w-full mx-auto lg:w-3/5">
        <h1 class="text-3xl font-semibold text-center">Active Department Members</h1>

        <div class="my-5">
            <x-bladewind.table>
                <x-slot name="header">
                    <th>Discord Name</th>
                    <th>Display Name</th>
                    <th>Badge Number</th>
                    <th>Join Date</th>
                    <th>Last Login</th>
                </x-slot>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->discord_name }}</td>
                        <td>{{ $user->display_name }}</td>
                        <td>{{ $user->badge_number }}</td>
                        <td>{{ $user->created_at->format('m-d-Y') }}</td>
                        <td>{{ $user->last_login->format('m-d-Y H:m:i') }}</td>
                    </tr>
                @endforeach
            </x-bladewind.table>
        </div>
    </div>
</x-app-layout>
