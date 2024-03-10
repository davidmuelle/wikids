<div>

    <x-slot name="header">

        <div class="flex gap-6 ">

            @livewire('crear-post')
        </div>
    </x-slot>
    <div class="flex justify-center mb-8 gap-10">

        <button
            class=" rounded-full w-40 border border-white hover:border-transparent bg-lime-500 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal   text-amber-50 shadow-lime-800 transition duration-150 ease-in-out hover:bg-lime-500 hover:shadow-amber-50 "
            wire:click="busqueda(1)">Fails</button>
        <button
            class=" rounded-full w-40 border border-white hover:border-transparent bg-lime-500 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal   text-amber-50 shadow-lime-800 transition duration-150 ease-in-out hover:bg-lime-500 hover:shadow-amber-50 "
            wire:click="busqueda(2)">Anecdotas</button>
        <button
            class=" rounded-full w-40 border border-white hover:border-transparent bg-lime-500 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal   text-amber-50 shadow-lime-800 transition duration-150 ease-in-out hover:bg-lime-500 hover:shadow-amber-50 "
            wire:click="busqueda(3)">Curiosidades</button>
        <button
            class=" rounded-full w-40 border border-white hover:border-transparent bg-lime-500 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal   text-amber-50 shadow-lime-800 transition duration-150 ease-in-out hover:bg-lime-500 hover:shadow-amber-50 "
            wire:click="busqueda(4)">Bugs</button>
        <button
            class=" rounded-full w-40 border border-white hover:border-transparent bg-lime-500 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal   text-amber-50 shadow-lime-800 transition duration-150 ease-in-out hover:bg-lime-500 hover:shadow-amber-50 "
            wire:click="busqueda(5)">otros</button>
        <button
            class=" rounded-full w-40 border border-white hover:border-transparent bg-lime-500 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal   text-amber-50 shadow-lime-800 transition duration-150 ease-in-out hover:bg-lime-500 hover:shadow-amber-50 "
            wire:click="busqueda(6)">Todas</button>
    </div>

    <div class="grid lg:grid-cols-3 justify-items-center gap-10 text-amber-50 pb-6">

        @foreach ($posts as $post)
            <div class="w-5/6 rounded-t-lg border-2 border-yellow-600 grid-rows-2 bg-gray-300 bg-opacity-25">



                <div class="h-48 w-15 rounded-t-lg overflow-hidden flex justify-center ">

                    <img class="h-full w-full  rounded  md:block hover:scale-125 transition-all duration-500"
                        loading="lazy" src="{{ $post->imagen }}" alt="Album Pic">
                </div>
                <div>
                    <div class="pt-3 flex justify-around">

                        <div>
                            <p class="text-lg">
                                Título:
                            </p>
                            <p> {{ $post->titulo }}</p>
                        </div>
                        <div>
                            <p class="text-lg">
                                Subtítulo:
                            </p>
                            <p> {{ $post->subtitulo }}</p>
                        </div>
                        <div>
                            <p class="text-lg">
                                Categoría:
                            </p>
                            <p> {{ $categorias[$post->categoria_id - 1]->nombre }}</p>
                            {{-- <p>{{$post->categoria_id}}</p> --}}
                        </div>



                    </div>

                    <div class="mt-8 ml-8">
                        <p>Contenido: {{ $post->contenido }}</p>
                    </div>
                    <div class="pt-3 pb-3 flex justify-around">

                        @if ($post->user_id == auth()->user()->id)
                            <button wire:click="editar({{ $post->id }})"
                                class="bg-transparent hover:bg-yellow-700 text-yellow-700 font-semibold hover:text-white py-2 px-10 border border-yellow-700 hover:border-transparent rounded">
                                editar
                            </button>
                            <button wire:click="borrar({{ $post }})"
                                class="bg-transparent hover:bg-yellow-700 text-yellow-700 font-semibold hover:text-white py-2 px-10 border border-yellow-700 hover:border-transparent rounded">
                                borrar
                            </button>
                        @endif
                    </div>
                </div>


            </div>
        @endforeach

        @isset($form->post)

            <x-dialog-modal wire:model="openeditar">
                <x-slot name="title">
                    Actualizar Post
                </x-slot>
                <x-slot name="content">

                    <x-label for="titulo">Título</x-label>
                    <x-input type="text" id="titulo" placeholder="Título" class="w-full mb-3"
                        wire:model="form.titulo" />
                    <x-input-error for="form.titulo" />

                    <x-label for="sinopsis">Subtitulo</x-label>
                    <x-input type="text" id="subtitulo" placeholder="Subtítulo" class="w-full mb-3"
                        wire:model="form.subtitulo" />
                    <x-input-error for="form.subtitulo" />


                    <x-label for="sinopsis">Contenido</x-label>

                    <textarea class="w-full mb-3" placeholder="contenido..." id="contenido" wire:model="form.contenido"></textarea>
                    <x-input-error for="form.contenido" />

                    <x-label for="categoria_id">Categoría</x-label>
                    <select id="categoria_id" class="w-full mb-3" wire:model="form.categoria_id">
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="form.category_id" />





                    <x-label for="imagenU">Imagen</x-label>
                    <div class="w-full h-80 bg-gray-200 relative">

                        <input type="file" accept="image/*" hidden id="imagenU" wire:model="form.imagen"
                            wire:loading.attr="disabled" />
                        <label for="imagenU"
                            class="absolute bottom-2 right-2 bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded">
                            <i class="fa-solid fa-cloud-arrow-up mr-2"></i>SUBIR
                        </label>

                        @if ($form->imagen)
                            <img src="{{ $form->imagen->temporaryUrl() }}"
                                class="w-full h-full bg-center bg-cover bg-no-repeat" />
                        @else
                            <img src="{{ $form->post->imagen }}" class="w-full h-full bg-center bg-cover bg-no-repeat" />
                        @endif
                    </div>
                    <x-input-error for="form.imagen" />

                </x-slot>
                <x-slot name="footer">
                    <div class="flex flex-row-reverse">
                        <button wire:click="update" wire:loading.attr="disabled"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fas fa-edit"></i> EDITAR
                        </button>

                        <button wire:click="cancelar"
                            class="mr-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fas fa-xmark"></i> CANCELAR
                        </button>
                    </div>
                </x-slot>
            </x-dialog-modal>
        @endisset


    </div>

</div>
