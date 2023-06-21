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
Route::get('/admin', [ProdutoController::class, 'index_admin'])->name('produtos.admim.index');
Route::get('/produtos/detalhes/{id}', [ProdutoController::class, 'show'])->name('produtos.show');
Route::get('/produtos/cadastrar', [ProdutoController::class, 'create'])->name('produtos.create');
Route::post('/produtos/cadastrar', [ProdutoController::class, 'store'])->name('produtos.store');
<<<<<<< HEAD
Route::put('/produtos/{id}', [ProdutoController::class, 'update']);
Route::delete('/produtos/{id}', [ProdutoController::class, 'destroy']);
=======

Route::put('/produtos/{id}', [ProdutoController::class, 'update'])->name('produtos.update');
Route::delete('/produtos/{id}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');
>>>>>>> 921dc34a0bcdbaeb65c62b546277f2c0150253f8
