<x-app-layout>
    <x-slot name="header">
        

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hogueras') }}
        </h2>
    </x-slot>

    <div class='py-12'>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-gray-100 overflow-hidden shadow-xl sm:rounded-lg h-full">
                <img class="m-auto hover:scale-125 transition-all duration-500"src="https://images.hive.blog/0x0/https://fotos.subefotos.com/27dbb38508d6f1c4b2b71c4aa123d78bo.png"
                    width="350" height="60" alt="Wiki Dark Souls">

                <div class="w-3/4 mx-auto">

                    <div class="flex items-center justify-center bg-red-lightest mb-24">
                        <div
                        
                            class="bg-white shadow-lg rounded-lg  max-md:bg-[url('/storage/playlist/ancient_dragon.webp')]">
                            
                            <div class="flex">
                                <div class="max-w-80 overflow-hidden cursor-pointer">
                                    <img class="w-full rounded hidden md:block hover:scale-125 transition-all duration-500"
                                        src="/storage/playlist/firelink.jpg" alt="Album Pic">
                                </div>
                                <div class="w-full p-8">
                                  
                                    
                                </div>
                            </div>
                        </div>

                    </div>


                    @if ($showModal)
                        <div class="modal show" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modal Title</h5>
                                        <button type="button" class="close" wire:click="closeModal">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Modal content goes here -->
                                        Your modal content goes here.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            wire:click="closeModal">Close</button>
                                        <!-- Additional modal buttons go here -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-backdrop show"></div>
                    @endif

                </div>
            </div>


</x-app-layout>
