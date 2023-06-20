<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

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

Route::get('/', [ProdutoController::class, 'index'])->name('produtos.index');
Route::get('/produtos/detalhes/{id}', [ProdutoController::class, 'show'])->name('produtos.show');
Route::get('/produtos/cadastrar', [ProdutoController::class, 'create'])->name('produtos.create');
Route::post('/produtos/cadastrar', [ProdutoController::class, 'store'])->name('produtos.store');
Route::put('/produtos/{id}', [ProdutoController::class, 'update']);
Route::delete('/produtos/{id}', [ProdutoController::class, 'destroy']);
