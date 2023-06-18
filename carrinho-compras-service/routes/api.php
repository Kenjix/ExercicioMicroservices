<?php

use App\Http\Controllers\Carrinho_compraController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/carrinho/add', [Carrinho_compraController::class, 'addItem']);
Route::delete('/carrinho/remove/{carrinho_id}/{produto_id}', [Carrinho_compraController::class, 'removeItem']);
Route::post('/carrinho/finaliza/{id}', [Carrinho_compraController::class, 'finalizar']);