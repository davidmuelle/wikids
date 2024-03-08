<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class MostrarUser extends Component
{
   
    public function render()
    {
        $usuarios=User::all();
        return view('livewire.mostrar-user',compact('usuarios'));
    }



    public function borrar(User $user){
        
        // Storage::delete($user->imagen);
        $user->delete();
       

    }
}
