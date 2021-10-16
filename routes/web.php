<?php

use App\Http\Livewire\ServiciosIndex;
use App\Http\Livewire\OfertasIndex;
use App\Http\Livewire\ProjectsIndex;
use App\Http\Livewire\PreciosIndex;
use App\Http\Livewire\EquiposIndex;
use App\Http\Livewire\MaterialsIndex;
use App\Http\Livewire\ObrerosIndex;
use App\Http\Livewire\TransportesIndex;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('category/{category}', [PostController::class, 'category'])->name('posts.category');
Route::get('tag/{tag}', [PostController::class, 'tag'])->name('posts.tag');

Route::get('equipos',EquiposIndex::class)->name('equipos');
Route::get('materials',MaterialsIndex::class)->name('materials');
Route::get('obreros',ObrerosIndex::class)->name('obreros');
Route::get('transportes',TransportesIndex::class)->name('transportes');

Route::get('precios', PreciosIndex::class)->name('precios');
Route::get('projects', ProjectsIndex::class)->name('projects');
Route::get('ofertas', OfertasIndex::class)->name('ofertas');
Route::get('servicios', ServiciosIndex::class)->name('servicios');

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');
