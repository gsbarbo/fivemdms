<x-staff-layout>
    <div class="w-5/6 mx-auto lg:flex">
        <div class="w-full p-4 bg-black lg:m-4 lg:w-1/4">
            <h3 class="text-2xl text-center text-white">Staff Links</h3>
            <hr>
            <div class="mt-2 space-y-2">
                <a class="block" href="{{ route('portal.staff.dashboard') }}">Dashboard</a>

                <a class="block" href="#">Permissions</a>
                <a class="block" href="#">Roles</a>
                <a class="block" href="#">Users</a>
            </div>
        </div>
        <div class="w-full bg-red-300 lg:m-4 lg:w-3/4">2</div>
    </div>
</x-staff-layout>
