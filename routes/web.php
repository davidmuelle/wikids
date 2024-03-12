<?php

use App\Livewire\Abismo;
use App\Livewire\AnorLondo;
use App\Livewire\ArchivosDuque;
use App\Livewire\Burgo;
use App\Livewire\Catacumbas;
use App\Livewire\Ciudad;
use App\Livewire\CuevaCristal;
use App\Livewire\Firelink;
use App\Livewire\Fortaleza;
use App\Livewire\Hogueras;
use App\Livewire\Horno;
use App\Livewire\IzalithPerdida;
use App\Livewire\Jardin;
use App\Livewire\Lago;
use App\Livewire\Mapa;
use App\Livewire\MostrarBoss;
use App\Livewire\MostrarPlaylist;
use App\Livewire\Mostrarpost;
use App\Livewire\MostrarUser;
use App\Livewire\MundoPintado;
use App\Livewire\Playlist;
use App\Livewire\Refugio;
use App\Livewire\RuinaDemonio;
use App\Livewire\RuinaNuevo;
use App\Livewire\TumbaGigantes;
use App\Livewire\Valle;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Rules\Role;

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
    Route::get('/hogueras',Hogueras::class);
    Route::get('/mapa',Mapa::class);
    Route::get('/anor-londo',AnorLondo::class);
    Route::get('/mundo-pintado',MundoPintado::class);
    Route::get('/archivos-duque',ArchivosDuque::class);
    Route::get('/cueva-cristal',CuevaCristal::class);
    Route::get('/izalith-perdida',IzalithPerdida::class);
    Route::get('/ruina-demonio',RuinaDemonio::class);
    Route::get('/catacumbas',Catacumbas::class);
    Route::get('/horno',Horno::class);
    Route::get('/tumba-gigantes',TumbaGigantes::class);
    Route::get('firelink',Firelink::class);
    Route::get('/fortaleza',Fortaleza::class);
    Route::get('/abismo',Abismo::class);
    Route::get('/valle',Valle::class);
    Route::get('/lago',Lago::class);
    Route::get('/ruina-nuevo',RuinaNuevo::class);
    Route::get('/jardin-tenebroso',Jardin::class);
    Route::get('/refugio',Refugio::class);
    Route::get('/burgo',Burgo::class);
    Route::get('/ciudad-infestada',Ciudad::class);
    Route::get('/boss',MostrarBoss::class)->name('Boss');
    Route::get('/playlist',MostrarPlaylist::class)->name('Playlist');
    
    
    Route::group(['middleware' => ['role:admin']], function () {
         Route::get('/users',MostrarUser::class)->name('users');
        
    });
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});

