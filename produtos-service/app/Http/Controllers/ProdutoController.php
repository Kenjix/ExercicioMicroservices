<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'descricao' => 'required',
            'valor' => 'required',
            'imagem' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $base64Image = $request->input('imagem');
        $decodedImage = base64_decode($base64Image);
        $fileName = uniqid() . '.png';
        $url = Storage::url($fileName);

        $produto = Produto::create([
            'nome' => $request->nome,
            'codigo' => $request->codigo,
            'imagem' => $url,
            'descricao' => $request->descricao,
            'valor' => $request->valor,
            'estoque' => $request->estoque,
        ]);

        if ($produto) {
            Storage::disk('public')->put($fileName, $decodedImage);
            return response()->json($produto, 201);
        } else {
            return response()->json(['message' => 'Erro ao cadastrar'], 500);
        }
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
