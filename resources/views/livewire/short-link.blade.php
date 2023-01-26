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

    @if ($shortsLinks->count())

        <div class="mt-5 rounded shadow-xl bg-gray-50">
            <div class="grid grid-cols-4 divide-x-2 divide-gray-200">

                <div class="col-span-1">
                    <div class="px-4 py-2 border-b-2">
                        <p class="font-semibold ">{{ $shortsLinks->count() }} url's encontradas</p>
                    </div>

                    <ul class="mt-3 divide-y-2 divide-gray-200">
                        @foreach ($shortsLinks as $sLink)
                            <li class="p-4 text-xs cursor-pointer {{ $sLink->id == $currentShortLink->id ? 'bg-blue-100' : '' }}" wire:click="changeShortLink({{ $sLink->id }})">
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
                    @livewire('short-link-detail', ['shortLink' => $currentShortLink], key($currentShortLink->id) )
                </div>

            </div>
        </div>

    @else

        <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
            No hay links acortados.
        </div>

    @endif



</div>
