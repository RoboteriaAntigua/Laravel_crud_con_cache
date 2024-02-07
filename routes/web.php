<?php

use App\Http\Controllers\AlumnosController;
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

Route::controller(AlumnosController::class)->group(function(){
    Route::get( '/', 'index')                                   ->name('alumnos.index');
    Route::get( 'alumnos/listar','listar')                      ->name('alumnos.listar');
    Route::get( 'alumnos/listarCache','listarCache')            ->name('alumnos.listarCache');
    Route::get( 'alumnos/listarRenderCache','listarRenderCache')  ->name('alumnos.listarRenderCache');
    Route::get( 'alumnos/actualizarCache','actualizarCache')    ->name('alumnos.actualizarCache');                
    Route::get( 'alumnos/create','create')                      ->name('alumnos.create');
    Route::get( 'alumnos/{alumno}','show')                      ->name('alumnos.show');
    Route::post('alumnos/create/store','store')                 ->name('alumnos.store');
    Route::get( 'alumnos/edit/{id}','edit')                     ->name('alumnos.edit');
    Route::put( 'alumnos/{id}','update')                        ->name('alumnos.update');
    Route::put( 'alumnos/delete/{id}','destroy')                ->name('alumnos.destroy');
});