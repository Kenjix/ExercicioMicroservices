@extends('template.layout')
@section('main')
<div class="container-lg">
    <h3 class="mb-4">Produtos para você!</h3>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
        @foreach ($produtos as $produto)
            <div class="col mb-4">
                <a href="{{ route('produtos.show', ['id' => $produto['id']]) }}" style="text-decoration: none;">
                    <div class="card card-produtos card-hover card-wide">
                            <div class="ratio ratio-4x3">
                                <img src="{{ $produto['imagem_link'] }}" class="card-img-top img-fluid object-fit-contain" alt="Foto do produto">
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">{{ $produto['nome'] }}</h5>
                                    <h6 class="card-text">R$ {{ $produto['valor'] }}</h6>
                                </div>
                                <div class="small mb-2">
                                    <p class="card-text"><small>{{ $produto['descricao'] }}</small></p>
                                <img src="{{ asset('imagens/star.png') }}" style="width: 14px;"><img src="{{ asset('imagens/star.png') }}" style="width: 14px;"><img src="{{ asset('imagens/star.png') }}" style="width: 14px;"><img src="{{ asset('imagens/star.png') }}" style="width: 14px;"><img src="{{ asset('imagens/star.png') }}" style="width: 14px;"> 4.5 (123)
                                </div>
                                <form action="{{ route('carrinho.addItem') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="carrinho_id" value="{{ session('carrinho_id', null) }}">
                                    <input type="hidden" name="produto_id" value="{{ $produto['id'] }}">
                                    <input type="hidden" name="quantidade" value="1">
                                    <button type="submit" class="btn btn-outline-success rounded-pill liveToastBtn" data-toast-id="{{ $produto['id'] }}">
                                        Adicionar ao carrinho
                                    </button>
                                </form>
                                {{-- <p class="card-text">Estoque: {{ $produto['estoque'] }}</p> --}}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
            @foreach ($produtos as $produto)
                <div id="liveToast{{ $produto['id'] }}" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <img src="{{ asset('imagens/adicionar.png')}}" class="rounded me-2" alt="..." style="width: 14px;">
                        <strong class="me-auto">Adicionado ao carrinho</strong>
                        <small>agora</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        Seu produto foi adicionado ao carrinho!
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        const toastButtons = document.querySelectorAll('.liveToastBtn');

        toastButtons.forEach((button) => {
            const toastId = button.getAttribute('data-toast-id');
            const toastElement = document.getElementById(`liveToast${toastId}`);
            const toast = new bootstrap.Toast(toastElement);

            button.addEventListener('click', () => {
                toast.show();
            });
        });
    </script>
@endsection
