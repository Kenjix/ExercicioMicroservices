@extends('template.layout')
@section('main')
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
            @foreach ($produtos as $produto)
                <div class="col mb-4">
                    <a href="{{ route('produtos.show', ['id' => $produto['id']]) }}" style="text-decoration: none;">
                        <div class="card card-produtos">
                            <div class="ratio ratio-4x3">
                                <img src="{{ $produto['imagem_link'] }}" class="card-img-top img-fluid object-fit-contain" alt="Foto do produto">
                            </div>
                            <div class="card-body">
                                <div class="d-flex d-inline">
                                    <h5 class="card-title">{{ $produto['nome'] }}</h5>
                                    <p class="card-text">R$ {{ $produto['valor'] }}</p>
                                </div>
                                <p class="card-text small">{{ $produto['descricao'] }}</p>
                                <p class="card-text">Estoque: {{ $produto['estoque'] }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
