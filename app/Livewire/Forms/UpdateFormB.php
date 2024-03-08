<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Boss;
use Illuminate\Support\Facades\Storage;

class UpdateFormB extends Form
{
    public ?Boss $boss = null;
    public string $nombre = "";
    public string $lore = "";
    public string $localizacion = "";

    public $imagen;
    
    

    public function setPost(Boss $miboss)
    {
        $this->boss = $miboss;
        $this->nombre = $miboss->nombre;
        $this->lore = $miboss->lore;
        $this->localizacion = $miboss->localizacion;
       
 

    }
    public function rules(): array
    {
        return [
            'nombre' => ['required', 'string', 'min:3'],
            'lore' => ['required', 'string', 'min:3'],
            'localizacion' => ['required', 'string', 'min:10'],
            'imagen' => ['nullable',  'max:2048'],

        ];
    }

    public function actualizar()
    {
        $this->validate();
        $ruta = $this->boss->imagen;
        if ($this->imagen ) {
            if (basename($this->boss->imagen) != 'noimage.png') {
                
                Storage::delete($this->boss->imagen);
            }
            $ruta=$this->imagen->store('boss');
           // dd($ruta);
        }
         if ($this->imagen == null) {

            $this->boss->update([
                'nombre' => $this->nombre,
                'lore' => $this->lore,
                'localizacion' => $this->localizacion,
                'imagen' => $ruta,

            ]);
         } else {

            $this->boss->update([
                'nombre' => $this->nombre,
                'lore' => $this->lore,
               'localizacion' => $this->localizacion,
                 'imagen' => '/storage/' . $ruta,

            ]);
        }
    }
    public function limpiar()
    {
        $this->reset(['nombre', 'lore', 'localizacion',  'imagen',]);
    }
}
