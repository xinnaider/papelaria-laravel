<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

Route::delete('/cliente/{id}', [ClienteController::class, 'delete'])->name('cliente.delete');
Route::put('/cliente/{id}', [ClienteController::class, 'update'])->name('cliente.update');
Route::get('/cliente/{id}/edit', [ClienteController::class, 'edit'])->name('cliente.edit');
Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente.index');
Route::post('/cliente/create', [ClienteController::class, 'store'])->name('cliente.store');
Route::get('/cliente/create', [ClienteController::class, 'create'])->name('cliente.create');
Route::get('/cliente/{id}', [ClienteController::class, 'show'])->name('cliente.show');

Route::get('/', function () {
    return view('inicial');
});


