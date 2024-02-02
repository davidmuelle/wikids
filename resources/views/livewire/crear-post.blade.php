<div class="flex gap-6 ">

    <button type="button" wire:click= "$set('opencrear',true)"
    class="inline-block rounded-full w-40 border border-lime-500 hover:border-transparent bg-lime-500 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-lime-500  hover:text-amber-50 shadow-lime-800 transition duration-150 ease-in-out hover:bg-lime-500 hover:shadow-amber-50 ">
    nuevo post
</button>
<x-dialog-modal wire:model="opencrear">
    <x-slot name="title">
        {{ __('crear post') }}
    </x-slot>

    <x-slot name="content">
        <x-form>

            @wire('defer')
                <x-form-input name="titulo" label="titulo del post" />
                <x-form-input name="subtitulo" label="subtitulo del post" />
                <x-form-textarea name="contenido" label="contenido" />
                <x-form-group name="categoria_id" label="categoria del post" inline>

                    @foreach ($categorias as $categoria)
                        <x-form-radio name="categoria_id" value="{{ $categoria->id }}"
                            label="{{ $categoria->nombre }}" />
                    @endforeach

                </x-form-group>
            @endwire
            <x-input-error for="categoria"></x-input-error>
            <label for="imagen">introduzca imagen</label>
            <input type="file" id="imagen" hidden accept="image/*" wire:model="imagen">
            @if ($imagen)
                <img src="{{ $imagen->temporaryUrl() }}" alt="imagen del usuario">
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
</div>
