<div class="">
    <a {{ $attributes->merge(['href' => url()->previous()]) }}>
        <x-bladewind.button type="secondary" size="small">
            Back
        </x-bladewind.button>
    </a>
</div>
