@extends("template.layout")
@section("main")
<div class="container">
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-6 h-100">
                <img src="..." class="rounded-start" alt="...">
            </div>
            <div class="col-md-6 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <!-- Ícone de Favoritos -->
                        <div class="me-3">
                            <i class="bi bi-heart"></i>
                        </div>

                        <!-- Compartilhar -->
                        <div>
                            <i class="bi bi-share-fill"></i>
                        </div>
                    </div>
                    <!-- Avaliações -->
                    <div class="small">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                            class="bi bi-star-fill"></i> 4.5 (123 avaliações)
                    </div>
                    <h1 class="card-title">{{ $produto['nome'] }}</h1>
                    <p class="card-text">{{ $produto['descricao'] }}</p>
                    <p class="card-text">
                    <h4>Valor: R$ {{ $produto['valor'] }}</h4>
                    </p>
                    <p class="card-text">Estoque: {{ $produto['estoque'] }}</p>

                    <!-- Opções de Parcelamento -->
                    <div class="mb-3">
                        <label for="parcelamento">Opções de Parcelamento:</label>
                        <select class="form-select form-select-sm narrow-select mt-3" id="parcelamento"
                            style="width: 300px;">
                            <option selected disabled>Selecione uma opção de parcelamento</option>
                            <option value="2">2x de R$ 50,00 sem juros</option>
                            <option value="3">3x de R$ 33,33 sem juros</option>
                            <option value="4">4x de R$ 25,00 sem juros</option>
                        </select>
                    </div>

                    <!-- Botões Comprar e Adicionar ao Carrinho -->
                    <div class="mb-3">
                        <form action="{{ route('carrinho.addItem') }}" method="POST">
                            @csrf
                            <input type="hidden" name="carrinho_id" value="{{ session('carrinho_id', null) }}">
                            <input type="hidden" name="produto_id" value="{{ $produto['id'] }}">
                            <input type="hidden" name="quantidade" value="1">
                            <button type="submit" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="bi bi-cart"></i> Comprar
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Deseja ir ao carrinho?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal" aria-label="Close">Continuar comprando</button>
            <a href="{{ route('carrinho.index') }}" type="button" class="btn btn-primary">Ir ao carrinho</a>
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
@endsection