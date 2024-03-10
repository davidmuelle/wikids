<?php

namespace App\Livewire;

use App\Livewire\Forms\UpdateFormB;
use App\Models\Boss;
use Livewire\Component;
use Livewire\WithFileUploads;

class MostrarBoss extends Component
{
    use WithFileUploads;
    public UpdateFormB $form;
    public $nombre = "", $lore = "", $localizacion = "";
    public bool $opencrear = false;

    public bool $openeditar=false;
    public $imagen;
    public function render()
    {
         $bosses=Boss::all();
        return view('livewire.mostrar-boss' ,compact("bosses"));
    }

    // protected function rules():array {
    //     return
    //     [
    //         'nombre' => ['required', 'string', 'min:3'],
    //         'lore' => ['required', 'string', 'min:3'],
    //         'localizacion' => ['required', 'string'],
    //         'imagen' => ['required', 'max:2048']
    //     ];
    // }


    public function crear(){
        $this->validate( [
            'nombre' => ['required', 'string', 'min:3'],
            'lore' => ['required', 'string', 'min:3'],
            'localizacion' => ['required', 'string'],
            'imagen' => ['required', 'max:2048']
        ]);
       
        $ruta=$this->imagen->store('boss');
        Boss::create([
            
            'nombre' => $this->nombre,
            'lore'=>$this->lore,
            'localizacion'=>$this->localizacion,
            'imagen'=>'/storage/'.$ruta
        ]);
         
        $this->cancelar();
        return redirect()->route('Boss');
    }

    public function cancelar()
    {
        $this->reset(['opencrear', 'imagen', 'nombre', 'lore', 'localizacion' ,'openeditar']);
    }







    public function editar(Boss $boss){
    
        $this->form->setPost($boss);
        $this->openeditar=true;
    }
    
    
    public function update(){
        $this->form->actualizar();
        $this->cancelar();
        
    } 


}
