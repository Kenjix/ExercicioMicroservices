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
        $response = Http::get("http://localhost:8001/api/produtos/{$id}");
        $produto = $response->json();
        return view('produto.detalhes-produtos', compact('produto'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' //define as regras de validacao da imagem
        ]);
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $imageContent = file_get_contents($request->file('imagem')->path());
            
            $response = Http::post('http://localhost:8001/api/produtos/cadastrar', [
                'nome' => $request->input('nome'),
                'codigo' => $request->input('codigo'),
                'imagem' => mb_convert_encoding($imageContent, 'UTF-8', 'UTF-8'),
                'descricao' => $request->input('descricao'),
                'valor' => $request->input('valor'),
                'estoque' => $request->input('estoque'),
            ]);        
        }
        
        return redirect()->route('produtos.create');
    }
    

    public function edit(){
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
