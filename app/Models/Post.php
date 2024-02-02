<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable=[
        "titulo",
        "subtitulo",
        "imagen",
        "contenido",
        "user_id",
        "categoria_id"
    ];

    public function user(){
        $this->belongsTo(User::class);
    }

    public function categoria(){
        $this->belongsTo(Categoria::class);
    }
}
