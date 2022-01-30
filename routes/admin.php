<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ZonaController;
use App\Http\Controllers\Admin\GroupController;

use App\Http\Controllers\Admin\GrupoEquipoController;
use App\Http\Controllers\Admin\GrupoMaterialController;
use App\Http\Controllers\Admin\GrupoObreroController;
use App\Http\Controllers\Admin\GrupoPrecioController;
use App\Http\Controllers\Admin\EquipoController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\ObreroController;
use App\Http\Controllers\Admin\TransporteController;
use App\Http\Controllers\Admin\GeneralController;
use App\Http\Controllers\Admin\IndiceController;
use App\Http\Controllers\Admin\IndirectoController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\ProyectController;
use App\Http\Controllers\Admin\PrecioController;
use App\Http\Controllers\Admin\OfertaController;
use App\Http\Controllers\Admin\ServicioController;

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;

use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileController;

Route::get('', [HomeController::class,'index'])->middleware('can:admin.home')->name('admin.home');
Route::resource('users', UserController::class)->only('index', 'edit', 'update')->names('admin.users');
Route::resource('roles', RoleController::class)->except('show')->names('admin.roles');
Route::resource('permissions', PermissionController::class)->except('show')->names('admin.permissions');

Route::resource('zonas', ZonaController::class)->except('show')->names('admin.zonas');
Route::resource('groups', GroupController::class)->except('show')->names('admin.groups');
Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');
Route::resource('tags', TagController::class)->except('show')->names('admin.tags');
Route::resource('posts', PostController::class)->except('show')->names('admin.posts');

Route::resource('grupo_equipos', GrupoEquipoController::class)->except('show')->names('admin.grupo_equipos');
Route::resource('grupo_materials', GrupoMaterialController::class)->except('show')->names('admin.grupo_materials');
Route::resource('grupo_obreros', GrupoObreroController::class)->except('show')->names('admin.grupo_obreros');
Route::resource('grupo_precios', GrupoPrecioController::class)->except('show')->names('admin.grupo_precios');
Route::resource('equipos', EquipoController::class)->except('show')->names('admin.equipos');
Route::resource('materials', MaterialController::class)->except('show')->names('admin.materials');
Route::resource('obreros', ObreroController::class)->except('show')->names('admin.obreros');
Route::resource('transportes', TransporteController::class)->except('show')->names('admin.transportes');
Route::resource('generals', GeneralController::class)->except('show')->names('admin.generals');
Route::resource('indirectos', IndirectoController::class)->except('show')->names('admin.indirectos');
Route::resource('indices', IndiceController::class)->except('show')->names('admin.indices');
Route::resource('proyectos', ProyectController::class)->except('show')->names('admin.proyectos');
Route::resource('precios', PrecioController::class)->except('show')->names('admin.precios');
Route::resource('ofertas', OfertaController::class)->except('show')->names('admin.ofertas');
Route::resource('servicios', ServicioController::class)->except('show')->names('admin.servicios');

Route::post('/comments/store', [CommentController::class,'store'])->name('comment.add');
Route::post('/reply/store', [CommentController::class,'replyStore'])->name('reply.add');