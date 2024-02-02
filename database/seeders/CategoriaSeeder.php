<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create(
            ["nombre"=>"Fails"]
        );

        Categoria::create(
            ["nombre"=>"Anecdotas"]
        );
        
        Categoria::create(
            ["nombre"=>"Curiosidades"]
        );

        Categoria::create(
            ["nombre"=>"Bugs"]
        );

        Categoria::create(
            ["nombre"=>"otros"]
        );
    }
}
