@extends('template.layout')
@section('main')
    <div class="container">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center h-100">
                        <img src="{{ $produto['imagem_link'] }}" class="img-fluid img-produto" style="max-width:300px">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-body d-flex flex-column justify-content-between h-100">
                        <!-- Avaliações -->
                        <div>
                            <h1 class="card-title">{{ $produto['nome'] }}</h1>
                            <p class="card-text">{{ $produto['descricao'] }}</p>
                            <div class="small mb-2">
                                <img src="{{ asset('imagens/star.png') }}" style="width: 14px;">
                                <img src="{{ asset('imagens/star.png') }}" style="width: 14px;">
                                <img src="{{ asset('imagens/star.png') }}" style="width: 14px;">
                                <img src="{{ asset('imagens/star.png') }}" style="width: 14px;">
                                <img src="{{ asset('imagens/star.png') }}" style="width: 14px;"> 4.5 (123)
                            </div>
                        </div>
                        <div>
                            <p class="card-text">
                            <h4>R$ {{ $produto['valor'] }}</h4>
                            </p>
                        </div>
                        <div class="mb-3">
                            <p class="card-text text-secondary small">Disponível: {{ $produto['estoque'] }} unidades</p>
                        </div>
                        <!-- Opções de Parcelamento -->
                        <div class="mb-3 mt-3">
                            <label for="parcelamento">Opções de Parcelamento:</label>
                            <select class="form-select form-select-sm narrow-select mt-3" id="parcelamento"
                                style="width: 300px;">
                                <option selected disabled>Selecione uma opção de parcelamento</option>
                                <option value="2">2x de R$ 50,00 sem juros</option>
                                <option value="3">3x de R$ 33,33 sem juros</option>
                                <option value="4">4x de R$ 25,00 sem juros</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <form action="{{ route('carrinho.addItem') }}" method="POST">
                                @csrf
                                <input type="hidden" name="carrinho_id" value="{{ session('carrinho_id', null) }}">
                                <input type="hidden" name="produto_id" value="{{ $produto['id'] }}">
                                <input type="hidden" name="quantidade" value="1">
                                <button type="submit" class="btn btn-success rounded-pill">
                                    <i class="bi bi-cart"></i> Comprar agora
                                </button>
                                <button type="submit" class="btn btn-outline-success rounded-pill liveToastBtn"
                                    data-toast-id="liveToast" id="liveToastBtn">
                                    Adicionar ao carrinho
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card para a seção de Comentários -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Comentários</h5>
                <div class="card-text">
                    <!-- Comentário 1 -->
                    <div class="mb-3">
                        <h6>Usuário 1</h6>
                        <p>O produto atendeu minhas expectativas. Recomendo!</p>
                    </div>

                    <!-- Comentário 2 -->
                    <div class="mb-3">
                        <h6>Usuário 2</h6>
                        <p>Excelente qualidade e entrega rápida.</p>
                    </div>

                    <!-- Comentário 3 -->
                    <div class="mb-3">
                        <h6>Usuário 3</h6>
                        <p>Entrega rápida e produto em perfeitas condições.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="{{ asset('imagens/adicionar.png') }}" class="rounded me-2" alt="..." style="width: 14px;">
                <strong class="me-auto">Adicionado ao carrinho</strong>
                <small>agora</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Seu produto foi adicionado ao carrinho!
            </div>
        </div>
    </div>
    <script>
        var toastTrigger = document.getElementById('liveToastBtn');
        var toastLiveExample = document.getElementById('liveToast');
        if (toastTrigger) {
            toastTrigger.addEventListener('click', function() {
                var toast = new bootstrap.Toast(toastLiveExample);
                toast.show();
            });
        }

        document.querySelector('.btn.btn-success.rounded-pill').addEventListener('click', function(event) {
            event.preventDefault();
            var form = document.querySelector('form');

            // Adicionar o item ao carrinho enviando o formulário
            form.submit();

            // Redirecionar para a página do carrinho após um pequeno atraso (200ms)
            setTimeout(function() {
                window.location.href = "{{ route('carrinho.index') }}";
            }, 200);
        });
    </script>
@endsection
