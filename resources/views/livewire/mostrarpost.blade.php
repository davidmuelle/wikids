<div>
    <x-app-layout>
        <x-slot name="header">

            <div class="flex gap-6 ">

                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Post') }}
                </h2>
                @livewire('crear-post')
            </div>
        </x-slot>
        <div class="grid lg:grid-cols-3 justify-items-center gap-10 text-amber-50 pb-6">

            @foreach ($posts as $post)
                <div
                    class="w-5/6 rounded-t-lg border-2 border-yellow-600 grid-rows-2 bg-gray-300 bg-opacity-25">



                    <div class="h-48 w-15 rounded-t-lg flex justify-center ">

                        <img class="h-full w-full  rounded  md:block hover:scale-125 transition-all duration-500"
                            src="{{ $post->imagen }}" alt="Album Pic">
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
                                <p> {{ $categorias[$post->categoria_id-1]->nombre }}</p>
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

            @if ($mipost)


                <x-dialog-modal wire:model="openeditar">
                    <x-slot name="title">
                        editar coche
                    </x-slot>

                    <x-slot name="content">
                        <x-form>

                            @bind($mipost, 'defer')
                                <p>{{ $mipost }}</p>
                                <x-form-input name="mipost.titulo" value="{{ $mipost->titulo }}" label="titulo" />
                                <x-form-input name="mipost.subtitulo" value="{{ $mipost->subtitulo }}" label="subtitulo" />


                                <x-form-textarea rows='4' name="mipost.contenido" value="{{ $mipost->contenido }}"
                                    label="contenido" placeholder="contenido...">
                                    @if ($mipost->contenido)
                                        {{ $mipost->contenido }}
                                    @endif
                                </x-form-textarea>

                                <x-form-group name="postt.categoria_id" label="categoria del post" inline>
                                    @foreach ($categorias as $categoria)
                                        @if ($categoria->id == $mipost->categoria_id)
                                            <x-form-radio name="mipost.categoria_id" checked="checked"
                                                value="{{ $categoria->id }}" label="{{ $categoria->nombre }}" />
                                        @else
                                            <x-form-radio name="mipost.categoria_id" value="{{ $categoria->id }}"
                                                label="{{ $categoria->nombre }}" />
                                        @endif
                                    @endforeach
                                </x-form-group>
                            @endbind
                            <label for="imagen">introduzca imagen</label>
                            @if ($imagen)
                                <img src="{{ $imagen->temporaryUrl() }}" alt="imagen del usuario">
                            @endif
                            <x-input-error for="imagen"></x-input-error>
                            <input type="file" id="imagen" hidden accept="image/*" wire:model="imagen">
                        </x-form>
                    </x-slot>

                    <x-slot name="footer">
                        <button wire:click="update" wire:loading.attr="disabled"
                            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-10 border border-blue-500 hover:border-transparent rounded">
                            actualizar
                        </button>
                        <button wire:click="cancelar"
                            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-10 border border-blue-500 hover:border-transparent rounded">
                            cancelar
                        </button>
                    </x-slot>
                </x-dialog-modal>
            @endif


        </div>
    </x-app-layout>
</div>
