<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

$cliente = ClienteController::class;

Route::delete('/cliente/{id}/destroy', [$cliente, 'delete'])->name('cliente.delete');
Route::post('/cliente/{id}/update', [$cliente, 'update'])->name('cliente.update');
Route::get('/cliente/{id}/edit', [$cliente, 'edit'])->name('cliente.edit');
Route::get('/cliente', [$cliente, 'index'])->name('cliente.index');
Route::post('/cliente/create', [$cliente, 'store'])->name('cliente.store');
Route::get('/cliente/create', [$cliente, 'create'])->name('cliente.create');
Route::get('/cliente/{id}', [$cliente, 'show'])->name('cliente.show');

Route::get('/', function () {
    return view('inicial');
});