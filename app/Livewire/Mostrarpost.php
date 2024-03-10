<?php

namespace App\Livewire;
use App\Livewire\Forms\UpdateForm;
use Illuminate\Support\Facades\Storage;
use App\Models\Categoria;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use PhpParser\Node\Expr\Cast\String_;

class Mostrarpost extends Component
{
    use WithFileUploads;
    use WithPagination;
    public Post $mipost;
    public UpdateForm $form;
    public $showModal=false;
    public $palabra=6;

    public $titulo ,$imagen, $subtitulo, $contenido , $categoria_id,$id;
    public bool $openeditar=false;
    

    public function render()
    {
        if($this->palabra<=5){
          
            $posts=Post::where('categoria_id', '=', $this->palabra)->get();;
            
        }else{
            $posts=Post::all();

        }
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


public function busqueda(String $palabra){
    $this->palabra=$palabra;
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
