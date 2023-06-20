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
        $request->validate([
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' //define as regras de validacao da imagem
        ]);
        $imagemBinario = file_get_contents($request->file('imagem')->getRealPath());
        
        $produto = Produto::create([
            'nome' => $request->nome,
            'codigo' => $request->codigo,
            'imagem' => $imagemBinario,
            'descricao' => $request->descricao,
            'valor' => $request->valor,
            'estoque' => $request->estoque,            
        ]);
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
