<?php

namespace App\Livewire;

use App\Models\Playlist;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Component;

use function Termwind\render;

class MostrarPlaylist extends Component
{
    public  $id = 1;

    public $openeditar = true;
    public function render()
    {
        try {

            $cancionn = Playlist::findOrFail($this->id);

            return view('livewire.mostrar-playlist', compact('cancionn'));
        } catch (ModelNotFoundException $ex) {
            $error = $ex->getMessage();
            return view('livewire.mostrar-playlist', compact('error'));
        }
    }

    public function delante()
    {
        $this->id++;
        if ($this->id == 24) {
            $this->id = 1;
        }
    }

    public function atras()
    {
        $this->id--;
        if ($this->id < 1) {
            $this->id = 23;
        }
    }
}
