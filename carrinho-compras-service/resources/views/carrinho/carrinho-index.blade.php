@extends("template.layout")
@section("main")
    <div class="container">
        <h1 class="mt-4">Carrinho de Compras</h1>
        
        @foreach ($produtos as $produto)
        <div class="card card-item mt-3">
            <div class="row g-0">
                <div class="col-md-4">
                    {{-- <img src="{{ $produto['imagem'] }}" class="img-fluid rounded-start" alt="Imagem do Produto"> --}}
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $produto['nome'] }}</h5>
                        <p class="card-text">{{ $produto['descricao'] }}</p>
                        <p class="card-text"><small class="text-muted">Estoque: {{ $produto['estoque'] }}</small></p>
                        <p class="card-text"><small class="text-muted">Valor: R$ {{ $produto['valor'] }}</small></p>
                        <div class="d-flex justify-content-between">
                            <div class="quantity">
                                <button id="addItem" class="btn btn-sm btn-secondary">-</button>
                                <span class="mx-2">{{ $produto['quantidade'] }}</span>
                                <button id="remItem" class="btn btn-sm btn-secondary">+</button>
                            </div>
                            <button type="submit" id="excluir" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <div class="text-end">
            <button class="btn btn-success my-3">Finalizar Compra</button>
        </div>
    </div>
@endsection
