<div>
    <div class="p-6 bg-white rounded shadow-xl">

        <div class="flex">
            <x-jet-input wire:model="url" type="text" class="w-full" placeholder="ingrese la url para acortar"></x-jet-input>
            <x-jet-button wire:click="procesarUrl()" class="ml-4 ">
                Acortar
            </x-jet-button>
        </div>
        <x-jet-input-error for="url" class="mt-1" />

    </div>


</div>
