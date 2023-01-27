<div class="px-5 py-5 ">

    <div class="p-6 mb-5 bg-white rounded-lg shadow-xl">

        <h2 class="text-xl font-semibold ">{{ $shortLink->title }}</h2>
        <p class="my-2">
            <i class="mr-1 fa-regular fa-calendar"></i>
            {{ $shortLink->created_at->format('F d, Y h:i') }} by {{ $shortLink->user->name }}
        </p>
        <p>
            <i class="mr-1 fa-solid fa-chart-simple"></i>
            {{ $shortLink->visits->count() }} visitas
        </p>

    </div>

    <div class="p-6 bg-white rounded-lg shadow-xl" x-data="{
            url: '{{ route('shortlink.show', $shortLink->slug) }}',
            copied: false,
            copyToClipboard: function() {
                let input = document.createElement('input');
                input.setAttribute('type', 'text');
                input.setAttribute('value', this.url);
                document.body.appendChild(input);
                input.select();
                document.execCommand('copy');
                document.body.removeChild(input);
                this.copied = true;
                setTimeout(() => {
                    this.copied = false;
                }, 2000)
            }
        }">

        {{-- <h2 class="text-xl font-semibold ">{{ $shortLink->title }}</h2> --}}

        <div class="flex items-center justify-between ">
            <a class="font-semibold text-orange-700 " target="_blank" href="{{ route('shortlink.show', $shortLink->slug) }}">
                {{ route('shortlink.show', $shortLink->slug) }}
            </a>

            <button class="px-4 py-2 bg-gray-100 rounded-md shadow-md" x-on:click="copyToClipboard()">
                <i class="mr-1 fa-solid fa-copy"></i>
                <span x-text="copied ? '¡Copiado!' : 'Copiar'"></span>
            </button>
        </div>

        <div class="flex items-center">
            <i class="mr-2 text-gray-700 rotate-90 fa-solid fa-turn-up"></i>
            <a class="text-xs font-semibold text-gray-700 " target="_blank" href="{{ $shortLink->url }}">
                {{ $shortLink->url }}
            </a>
        </div>

        <div>
            <h2 class="text-lg font-semibold">QR Code</h2>
            <div class="flex">
                {!! QrCode::size(150)->generate(route('shortlink.show', $shortLink->slug)) !!}
                <x-jet-button class="ml-3" wire:click="downloadQR">
                    <i class="mr-3 fa-solid fa-download"></i>
                    Descargar
                </x-jet-button>
            </div>
        </div>

    </div>

</div>
