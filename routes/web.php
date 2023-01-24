<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\MovimentacaoController;
use Illuminate\Support\Facades\Route;

$cliente = ClienteController::class;

Route::delete('/clientes/{cliente}/destroy', [$cliente, 'delete'])->name('cliente.delete');
Route::post('/clientes/{cliente}/update', [$cliente, 'update'])->name('cliente.update');
Route::get('/clientess/{cliente}/edit', [$cliente, 'edit'])->name('cliente.edit');
Route::get('/clientes', [$cliente, 'index'])->name('cliente.index');
Route::post('/clientes/create', [$cliente, 'store'])->name('cliente.store');
Route::get('/clientes/create', [$cliente, 'create'])->name('cliente.create');

$vendedor = VendedorController::class;

Route::delete('/vendedores/{vendedor}/destroy', [$vendedor, 'delete'])->name('vendedor.delete');
Route::post('/vendedores/{vendedor}/update', [$vendedor, 'update'])->name('vendedor.update');
Route::get('/vendedores/{vendedor}/edit', [$vendedor, 'edit'])->name('vendedor.edit');
Route::get('/vendedores', [$vendedor, 'index'])->name('vendedor.index');
Route::post('/vendedores/create', [$vendedor, 'store'])->name('vendedor.store');
Route::get('/vendedores/create', [$vendedor, 'create'])->name('vendedor.create');

$produto = ProdutoController::class;

Route::delete('/produtos/{produto}/destroy', [$produto, 'delete'])->name('produto.delete');
Route::post('/produtos/{produto}/update', [$produto, 'update'])->name('produto.update');
Route::get('/produtos/{produto}/edit', [$produto, 'edit'])->name('produto.edit');
Route::get('/produtos', [$produto, 'index'])->name('produto.index');
Route::post('/produtos/create', [$produto, 'store'])->name('produto.store');
Route::get('/produtos/create', [$produto, 'create'])->name('produto.create');

$venda = VendaController::class;

Route::get('/vendas/{venda}/pdf', [$venda, 'pdf'])->name('venda.pdf');
Route::get('/vendas/create', [$venda, 'create'])->name('venda.create');
Route::post('/vendas/create', [$venda, 'store'])->name('venda.store');
Route::get('/vendas', [$venda, 'index'])->name('venda.index');
;
$movimentacao = MovimentacaoController::class;

Route::get('/movimentacoes/create', [$movimentacao, 'create'])->name('movimentacao.create');
Route::post('/movimentacoes/create', [$movimentacao, 'store'])->name('movimentacao.store');
Route::get('/movimentacoes', [$movimentacao, 'index'])->name('movimentacao.index');

Route::get('/', function () {
    return view('inicial');
})->name('inicial.index');