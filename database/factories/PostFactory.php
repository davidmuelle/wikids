<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categoria;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->addProvider(new \Mmo\Faker\PicsumProvider($this->faker));
        
            return [
                'titulo'=>ucfirst($this->faker->name()),
                'subtitulo'=>$this->faker->name(),
                'contenido'=>$this->faker->text(),
                'imagen'=>'post/'.$this->faker->picsum('public/storage/posts',640,480,null,false),
                'user_id'=>User::all()->random()->id,
                'categoria_id'=>Categoria::all()->random()->id
            ];
        
    }
}
