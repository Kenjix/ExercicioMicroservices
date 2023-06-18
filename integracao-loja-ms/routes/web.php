<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CarrinhoController;

Route::get('/produtos', [ProdutoController::class, 'index']);
Route::get('/produtos/{id}', [ProdutoController::class, 'show'])->name('detalhes-produto');
Route::get('/produtos/cadastrar', [ProdutoController::class, 'create'])->name('produtos.create');
Route::post('/produtos/cadastrar', [ProdutoController::class, 'store'])->name('produtos.store');
Route::put('/produtos/{id}', [ProdutoController::class, 'update']);
Route::delete('/produtos/{id}', [ProdutoController::class, 'destroy']);

Route::post('/carrinho/add', [CarrinhoController::class, 'addItem']);
Route::delete('/carrinho/remove/{id}', [CarrinhoController::class, 'removeItem']);
Route::post('/carrinho/finaliza/{id}', [CarrinhoController::class, 'finalizarCarrinho']);
