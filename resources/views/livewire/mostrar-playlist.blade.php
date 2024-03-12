<div>



    <x-slot name="header">

        <div class="flex gap-6 ">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Playlist') }}
            </h2>

        </div>
    </x-slot>

    <div class='py-12'>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-gray-300 overflow-hidden shadow-xl sm:rounded-lg h-full">
                <img class="m-auto "src="https://images.hive.blog/0x0/https://fotos.subefotos.com/27dbb38508d6f1c4b2b71c4aa123d78bo.png"
                    width="350" height="60" alt="Wiki Dark Souls">

                <div class="w-3/4 mx-auto">

                    <div class="flex items-center justify-center bg-red-lightest mb-24">
                        <div
                            class="bg-white shadow-lg rounded-lg bg-cover bg-center object-cover max-md:bg-[url('{{ $cancionn->imagen }}')]">
                            <div class="flex">
                                <div class="max-w-80  overflow-hidden cursor-pointer">
                                    <img class="w-full object-cover rounded  max-md:hidden md:block hover:scale-125 transition-all duration-500"
                                    loading="lazy"  src="{{ $cancionn->imagen }}" alt="Album Pic">
                                    {{-- <p>{{ $cancionn->imagen }}</p>  --}}
                                </div>
                                <div class="w-full p-8">
                                    <div class="flex justify-between ">
                                        <div>


                                            {{-- <p>esto es {{$prueba}}</p>  --}}

                                            <h3 class="text-2xl  max-md:backdrop-opacity-95 max-md:text-white text-grey-darkest font-medium">
                                                {{ $cancionn->titulo }}
                                            </h3>
                                            

                                        </div>

                                    </div>
                                    <div class="flex justify-between items-center mt-8">
                                        {{-- <p>{{$cancionn->cancion}}</p> --}}
                                        <audio src="{{ $cancionn->cancion }}" preload="none" controls>

                                            {{-- <source src="{{ $cancionn->cancion }}" type="audio/mpeg"> --}}
                                        </audio>

                                    </div>
                                    <div class="flex ml-10 mt-5 gap-8">

                                        <button type="button" wire:click="atras"
                                            class="inline-block rounded-full w-20 border border-lime-500 hover:border-transparent hover:bg-lime-500 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-lime-500  hover:text-amber-50 shadow-lime-800 transition duration-150 ease-in-out  hover:shadow-amber-50 ">
                                            << </button>
                                                <button type="button" wire:click="delante"
                                                    class="inline-block rounded-full w-20 border border-lime-500 hover:border-transparent hover:bg-lime-500 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-lime-500  hover:text-amber-50 shadow-lime-800 transition duration-150 ease-in-out  hover:shadow-amber-50 ">
                                                    >>
                                                </button>

                                    </div>
                                </div>
                            </div>
                            <div class="mx-8 py-4">
                                <div class="flex justify-between text-sm text-grey-darker">
                                    
                                </div>
                                <div class="mt-1">
                                    <div class="h-1 bg-grey-dark rounded-full">
                                        <div class="w-1/5 h-1 bg-red-light rounded-full relative">
                                            <span
                                                class="w-4 h-4 bg-red absolute pin-r pin-b -mb-1 rounded-full shadow"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>




        </div>
    </div>




</div>
