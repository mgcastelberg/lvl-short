<div>

    <style>
        .polaroid {
            width: 80%;
            background-color: white;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
            border-radius: 50px;
            overflow: hidden;
        }
        img {
            width: 100%;
        }
    </style>

    <div class="p-6 bg-white rounded shadow-xl">

        <div class="flex">
            {{-- <x-jet-input wire:model="url" type="text" class="w-full" placeholder="ingrese la url para generar QR"></x-jet-input> --}}
            <x-jet-button wire:click="$set('createForm.open',true)" class="ml-4 ">
                Crear Mock
            </x-jet-button>
        </div>
        <x-jet-input-error for="url" class="mt-1" />

    </div>

    {{-- @if ($manualsLinks->count()) --}}

        <div class="mt-5 rounded shadow-xl bg-gray-50">
            <div class="grid grid-cols-4 divide-x-2 divide-gray-200">

                <div class="col-span-1">
                    <div class="px-4 py-2 border-b-2">
                        {{-- <p class="font-semibold ">{{ $manualsLinks->count() }} url's encontradas</p> --}}
                    </div>

                    <ul class="mt-3 divide-y-2 divide-gray-200">
                        {{-- @foreach ($manualsLinks as $sLink)
                            <li class="p-4 text-xs cursor-pointer {{ $sLink->id == $currentShortLink->id ? 'bg-blue-100' : '' }}" wire:click="changeShortLink({{ $sLink->id }})">
                                <p>{{ $sLink->created_at->format('d M y') }}</p>
                                <p class="overflow-hidden whitespace-nowrap text-ellipsis">{{ $sLink->title }}</p>
                                <div class="flex items-center justify-between">
                                    <a class="text-xs font-semibold text-orange-700 " target="_blank" href="{{ $sLink->url }}">
                                        Ir a la Url
                                    </a>
                                </div>
                            </li>
                        @endforeach --}}
                    </ul>

                </div>

                <div class="col-span-3">

                    <div class="polaroid">
                        <img class="polaroid" src="{{ asset('img/Bart.png') }}" alt="Imagen con estilo">
                    </div>
                    <button id="downloadButton" class="pt-10 ">Descargar Imagen</button>

                    <script>
                        document.getElementById("downloadButton").addEventListener("click", function() {
                            const polaroidDiv = document.querySelector(".polaroid");
                            const img = polaroidDiv.querySelector("img");

                            const canvas = document.createElement("canvas");
                            const context = canvas.getContext("2d");
                            canvas.width = polaroidDiv.offsetWidth;
                            canvas.height = polaroidDiv.offsetHeight;

                            // Dibujar la imagen con estilos en el lienzo
                            context.drawImage(img, 0, 0, canvas.width, canvas.height);

                            // Convertir el lienzo a un enlace para descarga
                            const link = document.createElement("a");
                            link.href = canvas.toDataURL("image/png");
                            link.download = "imagen_con_estilo.png";
                            link.click();
                        });
                    </script>


                    {{-- @livewire('manual-link-details', ['manualLink' => $currentShortLink], key($currentShortLink->id) ) --}}
                </div>

            </div>
        </div>

    {{-- @else

        <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
            No hay links acortados.
        </div>

    @endif --}}

    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

        {{-- modal agregar --}}
        <x-jet-dialog-modal wire:model="createForm.open" class="pt-10 ">
            <x-slot name="title">Agregar Mock</x-slot>
            <x-slot name="content">

                <div class="grid grid-cols-12 gap-6 space-y-1">

                    <div class="col-span-6">
                        <x-jet-label>Título</x-jet-label>
                        <x-jet-input wire:model="createForm.title" type="text" class="w-full mt-1" />
                        <x-jet-input-error for="createForm.title" />
                    </div>

                    <div class="col-span-6 ">
                        <x-jet-label value="Tipo Envío" />
                        <select wire:model="createForm.type" class="w-full form-control">
                            <option value="1">Imagen</option>
                            <option value="2">Video Youtube</option>
                        </select>
                        <x-jet-input-error for="createForm.type"></x-jet-input-error>
                    </div>

                    {{-- url --}}
                    <div class="col-span-full">
                        <x-jet-label value="Url" />
                        <x-jet-input class="w-full bg-gray-200 disabled" disabled type="text" placeholder="Ingrese el slug del producto"
                            wire:model="url" />
                        <x-jet-input-error for="url"></x-jet-input-error>
                    </div>



                    <div class="col-span-full">
                        <x-jet-label>Descripción</x-jet-label>
                        <textarea wire:model.defer="createForm.description" type="text" rows="6" class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
                        </textarea>
                        <x-jet-input-error for="createForm.description" />
                    </div>

                </div>

            </x-slot>
            <x-slot name="footer">

                <x-jet-secondary-button
                    wire:click="$set('createForm.open',false)">
                    Cancelar
                </x-jet-secondary-button>
                <x-jet-danger-button
                    wire:loading.attr="disabled"
                    wire:target="procesarUrl()"
                    wire:click="procesarUrl()">
                    Crear
                </x-jet-danger-button>

            </x-slot>
        </x-jet-dialog-modal>

</div>

