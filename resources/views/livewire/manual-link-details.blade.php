<div class="px-5 py-5 ">

    <div class="p-6 mb-5 bg-white rounded-lg shadow-xl">

        <h2 class="text-xl font-semibold ">{{ $manualLink->title }}</h2>
        <p class="my-2">
            <i class="mr-1 fa-regular fa-calendar"></i>
            {{ $manualLink->created_at->format('F d, Y h:i') }} by {{ $manualLink->user->name }}
        </p>

    </div>

    <div class="p-6 bg-white rounded-lg shadow-xl" x-data="{
            url: '{{ $manualLink->url }}',
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

        <div class="flex items-center justify-between ">
            <a class="font-semibold text-orange-700 " target="_blank" href="{{ $manualLink->url }}">
                {{ $manualLink->url }}
            </a>

            <button class="px-4 py-2 bg-gray-100 rounded-md shadow-md" x-on:click="copyToClipboard()">
                <i class="mr-1 fa-solid fa-copy"></i>
                <span x-text="copied ? '¡Copiado!' : 'Copiar'"></span>
            </button>
        </div>

        <div class="flex items-center">
            <i class="mr-2 text-gray-700 rotate-90 fa-solid fa-turn-up"></i>
            <a class="text-xs font-semibold text-gray-700 " target="_blank" href="{{ $manualLink ->url }}">
                {{ $manualLink->url }}
            </a>
        </div>

        <div>
            <h2 class="mt-2 mb-2 text-lg font-semibold">QR Code</h2>
            <div>
                Medida:
                <x-jet-input wire:model="sizeLink" type="text" class="w-20"></x-jet-input>
            </div>

            <div class="flex mt-2">
                {{-- {!! QrCode::size(200)->generate($manualLink->url) !!} --}}

                <x-jet-button class="ml-3" wire:click="downloadQR">
                    <i class="mr-3 fa-solid fa-download"></i>
                    Descargar
                </x-jet-button>
                <br>
            </div>
            <div class="flex mt-2">
                {{-- {!! QrCode::size(200)->color(255, 0, 0)->generate($manualLink->url) !!}
                {!! QrCode::size(200)->color(255, 0, 0)->style('dot')->generate($manualLink->url) !!}
                {!! QrCode::size(200)->color(255, 0, 0)->style('round')->generate($manualLink->url) !!} --}}
                {{-- <img src="data:image/png;base64, {!! base64_encode(QrCode::size(400)->format('png')->size(100)->generate('Make me into an QrCode!')) !!} "> --}}
            </div>
            {{-- <div class="flex mt-2">
                <img src="data:image/png;base64, {!! base64_encode(QrCode::size(350)
                        ->gradient(91, 38, 128, 123, 59, 168, 'diagonal') // De rojo a azul
                        ->format('png')
                        ->style('round') // 'round', 'dot', 'square'
                        ->margin(1)
                        ->merge('/public/img/Logo-MON_Fondo.png', 0.4)
                        ->generate($manualLink->url))
                    !!}">
                <img src="data:image/png;base64, {!! base64_encode(QrCode::size(350)
                        // ->gradient(91, 38, 128, 123, 59, 168, 'diagonal') // De rojo a azul
                        ->format('png')
                        ->style('round') // 'round', 'dot', 'square'
                        ->margin(1)
                        ->merge('/public/img/Logo-MON_Fondo_C.png', 0.4)
                        ->generate($manualLink->url))
                    !!}">
            </div> --}}

            <div class="flex mt-2">
                <img src="data:image/png;base64, {!! base64_encode(QrCode::size(1500)
                        ->gradient(91, 38, 128, 123, 59, 168, 'diagonal') // De rojo a azul
                        ->format('png')
                        ->style('round') // 'round', 'dot', 'square'
                        ->margin(1)
                        ->merge('/public/img/Logo-OMNI_Fondo.png', 0.3)
                        ->generate($manualLink->url))
                    !!}">
                <img src="data:image/png;base64, {!! base64_encode(QrCode::size(1500)
                        // ->gradient(91, 38, 128, 123, 59, 168, 'diagonal') // De rojo a azul
                        ->format('png')
                        ->style('round') // 'round', 'dot', 'square'
                        ->margin(1)
                        ->merge('/public/img/Logo-OMNI_Fondo_C.png', 0.3)
                        ->generate($manualLink->url))
                    !!}">
            </div>


            {{-- <div class="flex mt-2">
                @php
                    $imagePath = public_path('img/omnilogo.png');
                    $image = imagecreatefrompng($imagePath); // Cargar imagen en GD
                    imagealphablending($image, false);
                    imagesavealpha($image, true);

                    // Guardar una nueva versión sin el perfil ICC
                    $newImagePath = public_path('img/omni_fixed.png');
                    imagepng($image, $newImagePath);
                    imagedestroy($image);
                @endphp
                {!!
                    QrCode::size(200)->gradient(102, 48, 140, 127, 81, 159, 'diagonal')->merge('/public/img/omni_fixed.png', 0.5)->generate($manualLink->url)
                !!}
            </div> --}}
        </div>

    </div>

</div>
