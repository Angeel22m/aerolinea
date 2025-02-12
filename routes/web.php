<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AerolineaController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio',
[AerolineaController::class,'inicio']);
Route::get('/inicio/mostrar/asientos',
[AerolineaController::class,'tiposAsientos'])->name('mostrar.asientos');

Route::get('/inicio/mostrar/vuelos',
[AerolineaController::class,'mostrarVuelos'])->name('mostrar.vuelos');

Route::get('inicio/agregar/tipo/asiento',
[AerolineaController::class,'agregarAsiento'])->name('agregar.asiento');

Route::get('inicio/eliminar/asiento/{id}',
[AerolineaController::class,'eliminarAsiento'])->name('eliminar.asiento');

Route::post('inicio/agregar/asiento/salvar',
[AerolineaController::class,'agregarAsientoSalvar'])->name('agregar.asiento.salvar');

Route::get('inicio/editar/asientos/{id}',
[AerolineaController::class,'editarAsiento'])->name('editar.asiento');

Route::get('inicio/nuevo/vuelo',
[AerolineaController::class, 'nuevoVuelo'])->name('nuevo.vuelo');

Route::post('inicio/nuevo/vuelo/salvar',
[AerolineaController::class, 'nuevoVueloSalvar'])->name('agregar.vuelo.salvar');

Route::get('inicio/editar/vuelo/{id}',[AerolineaController::class, 'getVuelo'])->name('editar.vuelo');

Route::get('inicio/editar/salvar/{id}',[AerolineaController::class, 'setVuelo'])->name('editar.vuelo.salvar');