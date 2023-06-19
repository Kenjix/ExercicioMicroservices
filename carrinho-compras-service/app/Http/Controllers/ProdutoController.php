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

    public function show($id)
    {
        $response = Http::get("http://localhost:8001/api/produtos/{$id}");
        $produto = $response->json();
        return view('detalhes-produtos', ['produto' => $produto]);
    }

    public function store(Request $request)
    {
        $response = Http::post('http://localhost:8001/api/produtos/cadastrar', [
            'nome' => $request->input('nome'),
            'descricao' => $request->input('descricao'),
            'valor' => $request->input('valor'),
            'estoque' => $request->input('estoque'),
        ]);
        return redirect('/produtos');
    }

    public function update(Request $request, $id)
    {
        $response = Http::put("http://localhost:8001/api/produtos/{$id}", [
            'nome' => $request->input('nome'),
            'descricao' => $request->input('descricao'),
            'valor' => $request->input('valor'),
            'estoque' => $request->input('estoque'),
        ]);
        return $response->json();
    }

    public function destroy($id)
    {
        $response = Http::delete("http://localhost:8001/api/produtos/{$id}");
        return $response->json();
    }
}
