<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProdutoController extends Controller
{
    public function index()
    {
        $response = Http::get('http://localhost:8001/api/produtos');

        if ($response->failed()) {
            // Lidar com o erro, exibir uma mensagem adequada ou retornar uma resposta de erro
        }

        $produtos = $response->json();

        return view('listar-produtos', compact('produtos'));
    }
}
