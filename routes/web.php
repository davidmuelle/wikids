<?php

use App\Livewire\Hogueras;
use App\Livewire\MostrarPlaylist;
use App\Livewire\Mostrarpost;
use App\Livewire\Playlist;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/mostrarPosts',Mostrarpost::class)->name('post.mostrar');
    Route::get('/hogueras',[Hogueras::class,"render"]);
  
    Route::get('/playlist',MostrarPlaylist::class)->name('Playlist');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});
