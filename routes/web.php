<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FuncionarioController;
use Illuminate\Support\Facades\Route;

$cliente = ClienteController::class;

Route::delete('/cliente/{id}/destroy', [$cliente, 'delete'])->name('cliente.delete');
Route::post('/cliente/{id}/update', [$cliente, 'update'])->name('cliente.update');
Route::get('/cliente/{id}/edit', [$cliente, 'edit'])->name('cliente.edit');
Route::get('/cliente', [$cliente, 'index'])->name('cliente.index');
Route::post('/cliente/create', [$cliente, 'store'])->name('cliente.store');
Route::get('/cliente/create', [$cliente, 'create'])->name('cliente.create');
Route::get('/cliente/{id}', [$cliente, 'show'])->name('cliente.show');

$funcionario = FuncionarioController::class;

Route::delete('/funcionario/{id}/destroy', [$funcionario, 'delete'])->name('funcionario.delete');
Route::post('/funcionario/{id}/update', [$funcionario, 'update'])->name('funcionario.update');
Route::get('/funcionario/{id}/edit', [$funcionario, 'edit'])->name('funcionario.edit');
Route::get('/funcionario', [$funcionario, 'index'])->name('funcionario.index');
Route::post('/funcionario/create', [$funcionario, 'store'])->name('funcionario.store');
Route::get('/funcionario/create', [$funcionario, 'create'])->name('funcionario.create');
Route::get('/funcionario/{id}', [$funcionario, 'show'])->name('funcionario.show');

Route::get('/', function () {
    return view('inicial');
});