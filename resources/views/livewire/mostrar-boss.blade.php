<div>
    @role('admin')
    <div class="flex justify-around mb-8 pt-8">

        <button type="button" wire:click= "$set('opencrear',true)"
            class="inline-block rounded-full w-40 border border-lime-500 hover:border-transparent bg-lime-500 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal hover:text-lime-500  text-amber-50 shadow-lime-800 transition duration-150 ease-in-out hover:bg-lime-500 hover:shadow-amber-50 ">
            Nuevo Boss
        </button>
    
        
         <button type="button" wire:click= "editar({{ $bosses[1]->id }})"
            class="inline-block rounded-full w-40 border border-lime-500 hover:border-transparent bg-lime-500 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal hover:text-lime-500  text-amber-50 shadow-lime-800 transition duration-150 ease-in-out hover:bg-lime-500 hover:shadow-amber-50 ">
            Actulizar boss
        </button> 
    </div>
    @endrole
    <div class="flex ml-10 mt-5 gap-8 ">

        <button type="button" wire:click="atras"
            class="mx-auto mb-8 inline-block rounded-full w-20 border border-lime-500 hover:border-transparent hover:bg-lime-500 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-lime-500  hover:text-amber-50 shadow-lime-800 transition duration-150 ease-in-out  hover:shadow-amber-50 ">
            << </button>
                <button type="button" wire:click="delante"
                    class=" mx-auto mb-8 inline-block rounded-full w-20 border border-lime-500 hover:border-transparent hover:bg-lime-500 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-lime-500  hover:text-amber-50 shadow-lime-800 transition duration-150 ease-in-out  hover:shadow-amber-50 ">
                    >>
                </button>

    </div>
    <x-dialog-modal wire:model="opencrear">
        <x-slot name="title">
            {{ __('crear Boss') }}
        </x-slot>

        <x-slot name="content">
            <x-form>

                @wire('defer')
                    <x-form-input name="nombre" label="Nombre del boss" />
                    <x-form-input name="localizacion" label="Localización del boss" />
                    <x-form-textarea name="lore" label="Lore del boss" />
                @endwire

                <label for="imagen">introduzca imagen</label>
                <input type="file" id="imagen" hidden accept="image/*" wire:model="imagen">
                @if ($imagen)
                    <img  src="{{ $imagen->temporaryUrl() }}" alt="imagen del usuario">
                @endif
                <x-input-error for="imagen"></x-input-error>
            </x-form>
        </x-slot>

        <x-slot name="footer">
            <div class="flex space-x-12">

                <button wire:click="crear"
                    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-10 border border-blue-500 hover:border-transparent rounded">
                    crear
                </button>
                <button wire:click="cancelar"
                    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-10 border border-blue-500 hover:border-transparent rounded">
                    cancelar
                </button>
            </div>
        </x-slot>
    </x-dialog-modal>









    @isset($form->boss)

    <x-dialog-modal wire:model="openeditar">
        <x-slot name="title">
            Actualizar Boss
        </x-slot>
        <x-slot name="content">

            <x-label for="nombre">Nombre</x-label>
            <x-input type="text" id="nombre" placeholder="Nombre" class="w-full mb-3" wire:model="form.nombre" />
            <x-input-error for="form.nombre" />

            <x-label for="lore">Lore</x-label>
            <x-input type="text" id="lore" placeholder="lore" class="w-full mb-3" wire:model="form.lore" />
            <x-input-error for="form.lore" />


            <x-label for="localizacion">Localizacion</x-label>
           
            <textarea class="w-full mb-3" placeholder="localizacion..." id="localizacion" wire:model="form.localizacion"></textarea>
            <x-input-error for="form.localizacion" />
            
           


          


            <x-label for="imagenU">Imagen</x-label>
            <div class="w-full h-80 bg-gray-200 relative">
                
                <input type="file" accept="image/*" hidden id="imagenU" wire:model="form.imagen"
                    wire:loading.attr="disabled" />
                <label for="imagenU"
                    class="absolute bottom-2 right-2 bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded">
                    <i class="fa-solid fa-cloud-arrow-up mr-2"></i>SUBIR
                </label>
                
                @if ($form->imagen)
                    <img src="{{$form->imagen->temporaryUrl()}}"
                        class="w-full h-full bg-center bg-cover bg-no-repeat" />
                @else
                     <img src="{{ $form->boss->imagen}}" 
                        class="w-full h-full bg-center bg-cover bg-no-repeat" /> 
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






   




    <div 
        class="block rounded-lg  mt-15 shadow-secondary-1 dark:bg-surface-dark w-1/2 mx-auto bg-pink-50	 bg-opacity-50 dark:text-black text-surface">
        <div class="relative overflow-hidden bg-cover bg-no-repeat ">
             <img class="rounded-t-lg w-full aspect-video"  loading="lazy" src="{{ $bosses[$bossindice]->imagen }}" alt="" /> 
        </div>
        {{-- <p>
            {{$bosses[$bossindice]->imagen}}  
        </p> --}}
        <div class="p-6">
            <h2 class="mb-2 text-2xl text-center font-medium leading-tight">
                {{ $bosses[$bossindice]->nombre }} 
            </h2>
            <h2  class="my-5 text-2xl ">Lore</h2>

            <hr  class=" h-1 mx-auto mb-4  border-0 rounded  dark:bg-gray-700">
            <p class="mb-4 text-base text-left" >
                {{ $bosses[$bossindice]->lore }} 
            </p>
            <h2  class="my-5 text-2xl">Ubicación</h2>

            <hr  class=" h-1 mx-auto mb-4  border-0 rounded  dark:bg-gray-700">
            <p class="text-base text-surface/75 text-left ">
                 {{ $bosses[$bossindice]->localizacion }}
            </p>
        </div>
    </div>






</div>
