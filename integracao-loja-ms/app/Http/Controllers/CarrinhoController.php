<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CarrinhoController extends Controller
{
    public function addItem(Request $request)
    {
        $response = Http::post('http://localhost:8001/api/carrinho/add', [
            'produto_id' => $request->input('produto_id'),
            'quantidade' => $request->input('quantidade'),
            'carrinho_id' => $request->input('carrinho_id'),
        ]);
        return $response->json();
    }

    public function removeItem($id)
    {
        $response = Http::delete("http://localhost:8001/api/carrinho/remove/{$id}");
        return $response->json();
    }

    public function finalizarCarrinho($id)
    {
        $response = Http::post("http://localhost:8001/api/carrinho/finaliza/{$id}");
        return $response->json();
    }
}
