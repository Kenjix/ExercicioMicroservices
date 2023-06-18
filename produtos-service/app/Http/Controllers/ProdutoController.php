<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return response()->json($produtos);
    }

    public function show($id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        return response()->json($produto);
    }

    public function store(Request $request)
    {
        $produto = Produto::create($request->all());
        return response()->json($produto, 201);
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::find($id);
    
        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }
    
        //obtem o estoque atualizado do request
        $estoqueAtualizado = $request->input('estoque');
    
        //verifica se o estoque atualizado resultará em um valor negativo
        if ($estoqueAtualizado < 0) {
            return response()->json(['message' => 'Estoque não pode ser negativo'], 400);
        }
    
        //atualiza o estoque apenas se não for negativo
        $produto->update($request->all());
    
        return response()->json($produto);
    }

    public function destroy($id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        $produto->delete();

        return response()->json(['message' => 'Produto removido'], 204);
    }
}
