<?php

namespace Database\Seeders;

use App\Models\Playlist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaylistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Playlist::create([
            "titulo"=>"Cuatro Reyes",
            "imagen"=>"/storage/playlist/cuatro_reyes.webp",
            "cancion"=>"/storage/audio/cuatro_reyes.mp3"
        ]);

        Playlist::create([
            "titulo"=>"Demonio Cienpiés",
            "imagen"=>"/storage/playlist/demonio_cienpies.jpg",
            "cancion"=>"/storage/audio/demonio_cienpies.mp3"
        ]);

        Playlist::create([
            "titulo"=>"Demonio Tauro",
            "imagen"=>"/storage/playlist/demonio_tauro.jpg",
            "cancion"=>"/storage/audio/demonio_tauro.mp3"
        ]);

        Playlist::create([
            "titulo"=>"Descarga Incesante",
            "imagen"=>"/storage/playlist/descarga_incesante.jpg",
            "cancion"=>"/storage/audio/descarga_incesante.mp3"
        ]);

        Playlist::create([
            "titulo"=>"Dragón Boquiabierto",
            "imagen"=>"/storage/playlist/dragon_boquiabierto.jpg",
            "cancion"=>"/storage/audio/dragon_boquiabierto.mp3"
        ]);

        Playlist::create([
            "titulo"=>"Gárgola Campana",
            "imagen"=>"/storage/playlist/gargolas.jpg",
            "cancion"=>"/storage/audio/gargolas.mp3"
        ]);

        Playlist::create([
            "titulo"=>"Golem De Hierro",
            "imagen"=>"/storage/playlist/golem.webp",
            "cancion"=>"/storage/audio/golem_hierro.mp3"
        ]);

        Playlist::create([
            "titulo"=>"Gwyn",
            "imagen"=>"/storage/playlist/Gwyn.jpg",
            "cancion"=>"/storage/audio/gwyn.mp3"
        ]);

        Playlist::create([
            "titulo"=>"Gwyndolin",
            "imagen"=>"/storage/playlist/gwyndolin.jpg",
            "cancion"=>"/storage/audio/gwyndolin.mp3"
        ]);

        Playlist::create([
            "titulo"=>"Gwynevere",
            "imagen"=>"/storage/playlist/gwynevere.jpg",
            "cancion"=>"/storage/audio/gwynevere.mp3"
        ]);

        Playlist::create([
            "titulo"=>"Hija Del Caos",
            "imagen"=>"/storage/playlist/hija_caos.jpg",
            "cancion"=>"/storage/audio/hija_caos.mp3"
        ]);

        Playlist::create([
            "titulo"=>"Lecho del caos",
            "imagen"=>"/storage/playlist/bed_of_chaos.jpg",
            "cancion"=>"/storage/audio/lecho_caos.mp3"
        ]);

        Playlist::create([
            "titulo"=>"Hija del caos",
            "imagen"=>"/storage/playlist/hija_caos.jpg",
            "cancion"=>"/storage/audio/hija_caos.mp3"
        ]);

        Playlist::create([
            "titulo"=>"Molinete",
            "imagen"=>"/storage/playlist/molinete.jpg",
            "cancion"=>"/storage/audio/molinete.mp3"
        ]);

        Playlist::create([
            "titulo"=>"Nameless Song",
            "imagen"=>"/storage/playlist/nameless.jpg",
            "cancion"=>"/storage/audio/nameless_song.mp3"
        ]);

        Playlist::create([
            "titulo"=>"Nito",
            "imagen"=>"/storage/playlist/nito.jpg",
            "cancion"=>"/storage/audio/nito.mp3"
        ]);

        Playlist::create([
            "titulo"=>"Ornstein Y Smough",
            "imagen"=>"/storage/playlist/ornstein.jpg",
            "cancion"=>"/storage/audio/ornstein.mp3"
        ]);

        Playlist::create([
            "titulo"=>"Priscilla",
            "imagen"=>"/storage/playlist/Priscilla.webp",
            "cancion"=>"/storage/audio/priscilla.mp3"
        ]);

        Playlist::create([
            "titulo"=>"Prólogo",
            "imagen"=>"/storage/playlist/prologo.jpg",
            "cancion"=>"/storage/audio/prologo.mp3"
        ]);

        Playlist::create([
            "titulo"=>"Quelaag",
            "imagen"=>"/storage/playlist/quelaag.webp",
            "cancion"=>"/storage/audio/queelag.mp3"
        ]);

        Playlist::create([
            "titulo"=>"Seath El Descamado",
            "imagen"=>"/storage/playlist/seath.jpg",
            "cancion"=>"/storage/audio/seath.mp3"
        ]);

        Playlist::create([
            "titulo"=>"Sif",
            "imagen"=>"/storage/playlist/sif.jpeg",
            "cancion"=>"/storage/audio/sif.mp3"
        ]);

        Playlist::create([
            "titulo"=>"Dragón Eterno",
            "imagen"=>"/storage/playlist/ancient_dragon.webp",
            "cancion"=>"/storage/audio/The_Ancient_Dragon.mp3"
        ]);
    }
}
