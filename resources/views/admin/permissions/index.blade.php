<x-app-layout>
    <div class="container w-full mx-auto lg:w-3/5">
        <x-bladewind.card title="Permissions">

            @foreach ($permissions as $permission)
                <div class="flex justify-between text-black">
                    <p class="">{{ $permission->title }}</p>
                    @can('permission_delete')
                        <form action="{{ route('portal.admin.permissions.destroy', $permission->id) }}" method="POST">
                            @method('delete')
                            @csrf
                            <input type="submit" value="Delete">
                        </form>
                    @endcan
                </div>
            @endforeach


        </x-bladewind.card>

        <a href="{{ route('portal.admin.permissions.create') }}">
            <x-bladewind.button size="small" color="green">Create
            </x-bladewind.button>
        </a>
    </div>

</x-app-layout>
