<?php

namespace App\Livewire;
use App\Livewire\Forms\UpdateForm;
use Illuminate\Support\Facades\Storage;
use App\Models\Categoria;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Psy\Readline\Hoa\Console;


class Mostrarpost extends Component
{
    use WithFileUploads;
    public Post $mipost;
    public UpdateForm $form;
    public $showModal=false;

    public $titulo ,$imagen, $subtitulo, $contenido , $categoria_id,$id;
    public bool $openeditar=false;
    

    public function render()
    {
        
        $posts=Post::all();
        $categorias=Categoria::all();
        return view('livewire.mostrarpost',compact('posts','categorias'));
    }

    protected function rules():array {
        return[
        'mipost.titulo' => ['required','string','min:3'],
        'mipost.subtitulo'=>['required','string','min:3'],
         'mipost.contenido'=>['required','string'],
        'mipost.categoria_id'=>['required', 'exists:categorias,id'],
        'imagen'=>['nullable','max:2048']

    ];
}


public function editar(Post $post){
    
    $this->form->setPost($post);
    $this->openeditar=true;
}


public function update(){
    $this->form->actualizar();
    $this->cancelar();
    
} 


   

    public function borrar(Post $postt){
        Storage::delete($postt->imagen);
        $postt->delete();
       

    }
    public function cancelar(){
        $this->form->limpiar();
        $this->openeditar=false;
    }

   
    
}
