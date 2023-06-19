<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Detalhes do Produto</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-4">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Minha Loja</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Admin
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{route('produtos.create')}}">Cadastrar um produto</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
              </li>
            </ul>
            <div class="d-flex">
              <a href="{{route('carrinho.index')}}" class="btn btn-outline-success" type="submit"><i class="bi bi-cart-fill"></i></a>
            </div>
          </div>
        </div>
      </nav>
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
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i> 4.5 (123 avaliações)
                  </div>
                  <h1 class="card-title">{{ $produto['nome'] }}</h1>
                  <p class="card-text">{{ $produto['descricao'] }}</p>
                  <p class="card-text"><h4>Valor: R$ {{ $produto['valor'] }}</h4></p>
                  <p class="card-text">Estoque: {{ $produto['estoque'] }}</p>

                  <!-- Opções de Parcelamento -->
                  <div class="mb-3">
                    <label for="parcelamento">Opções de Parcelamento:</label>
                    <select class="form-select form-select-sm narrow-select mt-3" id="parcelamento" style="width: 300px;">
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
                      <button class="btn btn-primary me-2">
                        <i class="bi bi-cart"></i> Comprar
                      </button>
                      <button class="btn btn-secondary" type="submit">
                        <i class="bi bi-plus"></i> Adicionar ao Carrinho
                      </button>
                    </form>
                                     
                  </div>
                </div>
              </div>
            </div>
        </div>

        <!-- Card para a seção de Comentários -->
        <div class="card">
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
</body>
</html>
