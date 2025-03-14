<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Short url') }}
        </h2>
    </x-slot>

    <div class="py-7">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @livewire('short-links')
        </div>
    </div>
</x-app-layout>
