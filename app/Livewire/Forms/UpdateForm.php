<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Post;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;

class UpdateForm extends Form
{
    public ?Post $post = null;
    public string $titulo = "";
    public string $subtitulo = "";
    public string $contenido = "";

    public $imagen;
    public string $categoria_id = "";
    

    public function setPost(Post $mipost)
    {
        $this->post = $mipost;
        $this->titulo = $mipost->titulo;
        $this->subtitulo = $mipost->subtitulo;
        $this->contenido = $mipost->contenido;
        $this->categoria_id = $mipost->categoria_id;
        //  $this->imagen=$mipost->imagen;

    }
    public function rules(): array
    {
        return [
            'titulo' => ['required', 'string', 'min:3'],
            'subtitulo' => ['required', 'string', 'min:3'],
            'contenido' => ['required', 'string', 'min:10'],
            'imagen' => ['nullable',  'max:2048'],
            'categoria_id' => ['required', 'exists:categorias,id'],

        ];
    }

    public function actualizar()
    {
        $this->validate();
        $ruta = $this->post->imagen;
        if ($this->imagen ) {
            if (basename($this->post->imagen) != 'noimage.png') {
                
                Storage::delete($this->post->imagen);
            }
            $ruta=$this->imagen->store('posts');
           // dd($ruta);
        }
         if ($this->imagen == null) {

            $this->post->update([
                'titulo' => $this->titulo,
                'subtitulo' => $this->subtitulo,
                'categoria_id' => $this->categoria_id,
                'contenido' => $this->contenido,
                'imagen' => $ruta,

            ]);
         } else {

            $this->post->update([
                'titulo' => $this->titulo,
                'subtitulo' => $this->subtitulo,
               'categoria_id' => $this->categoria_id,
                'contenido' => $this->contenido,
                 'imagen' => '/storage/' . $ruta,

            ]);
        }
    }
    public function limpiar()
    {
        $this->reset(['post', 'titulo', 'subtitulo', 'categoria_id',  'imagen',]);
    }
}
