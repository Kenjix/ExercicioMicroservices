<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
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
                  <h5 class="card-title">{{ $produto['nome'] }}</h5>
                  <p class="card-text">{{ $produto['descricao'] }}</p>
                  <p class="card-text">Valor: R$ {{ $produto['valor'] }}</p>
                  <p class="card-text">Estoque: {{ $produto['estoque'] }}</p>

                  <!-- Avaliações -->
                  <div class="mb-3">
                    Avaliações: 4.5 (123 avaliações)
                  </div>

                  <!-- Ícone de Favoritos -->
                  <div class="mb-3">
                    <i class="bi bi-heart"></i> Adicionar aos favoritos
                  </div>

                  <!-- Compartilhar -->
                  <div class="mb-3">
                    Compartilhar:
                    <i class="bi bi-facebook"></i>
                    <i class="bi bi-twitter"></i>
                    <i class="bi bi-instagram"></i>
                  </div>

                  <!-- Opções de Parcelamento -->
                  <div class="mb-3">
                    Opções de Parcelamento:
                    <ul>
                      <li>2x de R$ 50,00 sem juros</li>
                      <li>3x de R$ 33,33 sem juros</li>
                      <li>4x de R$ 25,00 sem juros</li>
                    </ul>
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
