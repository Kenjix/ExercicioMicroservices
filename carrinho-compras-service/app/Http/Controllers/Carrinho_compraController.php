<?php

namespace App\Http\Controllers;

use App\Models\Carrinho_compra;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class Carrinho_compraController extends Controller
{
    public function index()
    {
        $itens = Carrinho_compra::all();

        $produtos = [];

        foreach ($itens as $item) {
            // Faz uma requisição para a API de produtos para obter os detalhes do produto
            $response = Http::get('http://localhost:8001/api/produtos/' . $item->produto_id);

            if ($response->successful()) {
                $produto = $response->json();
                $produto['quantidade'] = $item->quantidade;
                $produtos[] = $produto;
            }
        }

        return view('carrinho-index', compact('produtos'));
    }

    public function addItem(Request $request)
    {
        $carrinhoId = $request->input('carrinho_id');
        $produto_id = $request->input('produto_id');
        $quantidade = $request->input('quantidade');
    
        //faz uma requisicao para a aplicacao de produtos para buscar os dados        
        $response = Http::get('http://localhost:8001/api/produtos/' . $produto_id);
    
        if ($response->failed()) {
            return response()->json(['message' => 'Produto não localizado'], $response->status());
        }
    
        $produto = $response->json(); 

        if($carrinhoId == null){
            $carrinhoCompra = Carrinho_compra::create();
            $id = $carrinhoCompra->id;

            $carrinhoCompra->produto_id = $produto['id'];
            $carrinhoCompra->carrinho_id = $id;
            $carrinhoCompra->quantidade = $quantidade;
            $carrinhoCompra->save();
            return back();
        } else {
            $carrinho = Carrinho_compra::where('carrinho_id', $carrinhoId)->first();

            if (!$carrinho) {
                return response()->json(['message' => 'Carrinho não encontrado'], 404);
            }
    
            $carrinhoCompra = Carrinho_compra::create([
                'carrinho_id' => $carrinhoId,
                'produto_id' => $produto['id'],
                'quantidade' => $quantidade,
            ]);
            return back();
        }        
    }

    public function removeItem($carrinho_id, $produto_id)
    {    
        //faz uma requisicao para a aplicacao de produtos para buscar os dados
        $response = Http::get('http://localhost:8001/api/produtos/' . $produto_id);
        if ($response->failed()) {
            return response()->json(['message' => 'Produto não encontrado'], $response->status());
        }
    
        $produto = $response->json();

        $carrinho = Carrinho_compra::where('carrinho_id', $carrinho_id)
            ->where('produto_id', $produto['id'])
            ->first();
        if (!$carrinho) {
            return response()->json(['message' => 'Item não encontrado'], 404);
        }
        
        $quantidade = $carrinho->quantidade;
        
        if ($quantidade > 1) {
            $carrinho->quantidade -= 1;
            $carrinho->save();
            return response()->json(['message' => 'Item removido do carrinho'], 204);
        } else {
            $carrinho->delete();
            return response()->json(['message' => 'Item removido do carrinho'], 204);
        }    
    }

    public function finalizar($id)
    {      
        $carrinho = Carrinho_compra::find($id);
    
        if (!$carrinho) {
            return response()->json(['message' => 'Carrinho não encontrado'], 404);
        }
    
        //faz uma requisição para a aplicação de produtos para buscar os dados
        $response = Http::get('http://localhost:8001/api/produtos/' . $carrinho->produto_id);
        if ($response->failed()) {
            return response()->json(['message' => 'Produto não encontrado'], $response->status());
        }
    
        $produto = $response->json();
        $produto['estoque'] -= $carrinho->quantidade;
    
        //faz a requisicao PUT para atualizar o estoque do produto
        $response = Http::put('http://localhost:8001/api/produtos/' . $carrinho->produto_id, $produto);
        if ($response->failed()) {
            return response()->json(['message' => 'Falha ao atualizar estoque do produto'], $response->status());
        } 
    
        $carrinho->finalizado = true;
        $carrinho->save();
    
        return response()->json(['message' => 'Finalizado com sucesso'], 200);
    }
}
