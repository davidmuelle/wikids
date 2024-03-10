<div>
   
    <div class="relative overflow-x-auto w-1/3 mx-auto mt-24 shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Puesto
                    </th>
                    
                    <th scope="col" class="px-6 py-3">
                        acción
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $user )
                    
               
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$user->name}}
                    </th>
                    <td class="px-6 py-4">
                        {{$user->email}}
                    </td>
                    <td class="px-6 py-4">
                        {{($user->getRoleNames()=='[]')? 'Estándar' : 'Admin'}}
                    </td>
                    
                    <td class="px-6 py-4 ">
                        @if ($user->getRoleNames()=='[]')
                            
                        <button wire:click="borrar({{ $user->id }})">
                                    Borrar
                                </button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
