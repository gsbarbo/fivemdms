<x-app-layout>
    <div class="container w-full mx-auto lg:w-3/5">
        <x-bladewind.card title="Roles">

            @foreach ($roles as $role)
                <div class="flex justify-between text-black">
                    <p class="">{{ $role->title }}</p>
                    @can('role_edit')
                        <a href="{{ route('portal.admin.roles.edit', $role->id) }}">Edit</a>
                    @endcan

                    @can('role_delete')
                        @if ($role->id > 1)
                            <form action="{{ route('portal.admin.roles.destroy', $role->id) }}" method="POST">
                                @method('delete')
                                @csrf
                                <input type="submit" value="Delete">
                            </form>
                        @endif
                    @endcan
                </div>
            @endforeach


        </x-bladewind.card>

        <a href="{{ route('portal.admin.roles.create') }}">
            <x-bladewind.button size="small" color="green">Create
            </x-bladewind.button>
        </a>
    </div>

</x-app-layout>
