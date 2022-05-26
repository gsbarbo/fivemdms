<x-guest-layout>

    <div class="w-full p-8 lg:md-12"
        style="background-image: url('{{ asset('images/public/lightbar-background.jpg') }}');background-repeat: no-repeat;background-position: center;background-size: cover;">
        <div class="rounded">
            <h2 class="block text-xl font-bold text-center text-white uppercase lg:text-2xl">
                <p>The name on your badge says</p>
                <p>who hired you</p>
                <p class="mt-3">The name on your nameplate says</p>
                <p>who raised you</p>

                <p class="mt-6">Represent them both with honor and integrity</p>
            </h2>
        </div>
    </div>

    <div class="w-11/12 p-5 mx-auto mt-4 bg-secondary lg:w-3/5 rounded-2xl text-off-white">
        <h1 class="text-3xl text-center">Welcome to {{ config('dms.department_name', config('app.name')) }}!</h1>
        <p class="text-lg text-center">
            First we need to get some more information about you before you can apply. Please fill out the following:
        </p>

        <form action="{{ route('auth.account.store') }}" class="mx-auto mt-6 space-y-5 md:w-2/3" method="post">
            @csrf

            <div>
                <x-label class="text-action" for="real_name" :value="__('Real Name')" />

                <x-input id="real_name" class="block w-full text-black" type="text" name="real_name" :value="old('real_name')"
                    autofocus />

                @error('real_name')
                    <x-input-validation>{{ $message }} </x-input-validation>
                @enderror
            </div>

            <div>
                <x-label class="text-action" for="birthday" :value="__('Date of Birth')" />

                <x-input id="birthday" class="block w-full text-black" type="date" name="birthday" :value="old('birthday')" />

                @error('birthday')
                    <x-input-validation>{{ $message }} </x-input-validation>
                @enderror
            </div>

            <div>
                <x-label class="text-action" for="display_name" :value="__('Display Name')" />

                <x-input id="display_name" class="block w-full text-black" type="text" name="display_name"
                    :value="old('display_name')" />

                @error('display_name')
                    <x-input-validation>{{ $message }} </x-input-validation>
                @enderror
            </div>

            <div>
                <x-button class="">Create Account</x-button>
            </div>


        </form>
    </div>

</x-guest-layout>
