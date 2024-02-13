<?php

namespace App\Livewire;
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
    public $showModal=false;

    public $titulo ,$imagen, $subtitulo, $contenido , $categoria_id,$id;
    public bool $openeditar=false;
    

    public function render()
    {
        
        $posts=Post::all();
        $categorias=Categoria::all();
        $openeditar=$this->openeditar;
        return view('livewire.mostrarpost',compact('posts','categorias','openeditar'));
    }

    protected function rules():array {
        return[
        'titulo' => ['required','string','min:3'],
        'subtitulo'=>['required','string','min:3'],
         'contenido'=>['required','string'],
        'categoria_id'=>['required', 'exists:categorias,id'],
        'imagen'=>['nullable','max:2048']

    ];
}


    public function editar(Post $postt)
    {
        // $this->authorize('update', $postt);
        
        $this->mipost = $postt;
        $this->openeditar = true;
        
    }


    public function update()
    {
        $this->validate();
        $ruta=$this->mipost->imagen;
        if($this->imagen){
            $ruta=$this->imagen->store('posts');
            Storage::delete($this->mipost->imagen);
        }
        $this->mipost->update([
            'titulo'=>$this->mipost->titulo,
            'subtitulo'=>$this->mipost->subtitulo,
            'contenido'=>$this->mipost->contenido,
            'categoria_id'=>$this->mipost->categoria_id,
            'user_id'=>auth()->user()->id,
            'imagen'=>$ruta
        ]);
        $this->cancelar();
    }


   

    public function borrar(Post $postt){
        Storage::delete($postt->imagen);
        $postt->delete();
       

    }
    public function cancelar(){
        $this->reset(['imagen','titulo','subtitulo','contenido','categoria_id','openeditar','mipost']);
        $this->showModal=true;
    }

   
    
}
