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

    <div class="mt-5 rounded shadow-xl bg-gray-50">
        <div class="grid grid-cols-4 divide-x-2 divide-gray-200">

            <div class="col-span-1">
                <div class="px-4 py-2 border-b-2">
                    <p class="font-semibold ">{{ $shortsLinks->count() }} url's encontradas</p>
                </div>

                <ul class="divide-y-2 divide-gray-200 mt-">
                    @foreach ($shortsLinks as $sLink)
                        <li class="p-4 text-xs cursor-pointer">
                            <p>{{ $sLink->created_at->format('d M y') }}</p>
                            <p class="overflow-hidden whitespace-nowrap text-ellipsis">{{ $sLink->title }}</p>
                            <div class="flex items-center justify-between">
                                <a class="text-xs font-semibold text-orange-700 " target="_blank" href="{{ route('shortlink.show', $sLink->slug) }}">
                                    {{ route('shortlink.show', $sLink->slug) }}
                                    {{-- {{ $sLink->slug }} --}}
                                </a>
                                <span class="text-sm ">
                                    {{ $sLink->visits->count() }}
                                    <i class="ml-1 fa-solid fa-chart-simple"></i>
                                </span>
                            </div>
                        </li>
                    @endforeach
                </ul>

            </div>

            <div class="col-span-3">

            </div>

        </div>
    </div>


</div>
