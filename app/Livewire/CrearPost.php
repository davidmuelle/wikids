<?php

namespace App\Livewire;

use App\Models\Categoria;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;
use Psy\CodeCleaner\ReturnTypePass;

class CrearPost extends Component
{
    use WithFileUploads;
    public $imagen;
    public $titulo = "", $subtitulo = "", $contenido = "", $categoria_id = "";
    public bool $opencrear = false;
    public function render()
    {

        $categorias = Categoria::all();
        return view('livewire.crear-post', compact('categorias'));
    }


    protected function rules():array {
        return
        [
            'titulo' => ['required', 'string', 'min:3'],
            'subtitulo' => ['required', 'string', 'min:3'],
            'contenido' => ['required', 'string'],
            'categoria_id' => ['required'],
            'imagen' => ['required', 'max:2048']

        ];
    }

    public function crear(){
        $this->validate();
        $ruta=$this->imagen->store('posts');
        Post::create([
            
            'titulo' => $this->titulo,
            'subtitulo'=>$this->subtitulo,
            'contenido'=>$this->contenido,
            'categoria_id'=>$this->categoria_id,
            'imagen'=>'/storage/'.$ruta,
            'user_id'=>auth()->user()->id
        ]);
         
        $this->cancelar();
        return redirect()->route('post.mostrar');
    }
    public function cancelar()
    {
        $this->reset(['opencrear', 'imagen', 'titulo', 'subtitulo', 'contenido', 'categoria_id']);
    }
}
