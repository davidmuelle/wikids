<?php

namespace App\Livewire;

use Livewire\Component;

class Hogueras extends Component
{
    public $showModal =false;
    public function render()
    {
        $showModal=$this->showModal;
        return view('livewire.hogueras',compact('showModal'));
    }

    public function delante(){
        $this->showModal=true;
    }
}
