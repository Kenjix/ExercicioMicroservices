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

        return view('produto.listar-produtos', compact('produtos'));
    }

    public function index_admin()
    {
        $response = Http::get('http://localhost:8001/api/produtos');

        if ($response->failed()) {
            // Lidar com o erro, exibir uma mensagem adequada ou retornar uma resposta de erro
        }

        $produtos = $response->json();

        return view('admin.listar-editar-produtos', compact('produtos'));
    }

    public function create(){
        return view('admin.cadastrar-produtos');
    }

    public function show($id)
    {
        $response = Http::get("http://localhost:8001/api/produtos/detalhes/{$id}");
        $produto = $response->json();
        return view('produto.detalhes-produtos', compact('produto'));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $imagemBase64 = base64_encode(file_get_contents($imagem->getRealPath()));
            $url = "http://localhost:8001/api/produtos/cadastrar";
            $response = Http::post($url, [
                'nome' => $request->input('nome'),
                'codigo' => $request->input('codigo'),
                'descricao' => $request->input('descricao'),
                'valor' => $request->input('valor'),
                'estoque' => $request->input('estoque'),
                'imagem' => $imagemBase64,
            ]);

            if (!$response) {
                return response()->json(['message' => 'Erro ao cadastrar'], 500);
            } else {
                return redirect()->route('produtos.create');
            }
        } else {
            return response()->json(['message' => 'Parametros invalidos'], 400);
        }
        
        return redirect()->route('produtos.create');
    }


    public function edit()
    {
        return view("admin.editar-produtos");
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
