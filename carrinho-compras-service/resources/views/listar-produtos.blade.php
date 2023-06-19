<!DOCTYPE html>
<html>
<head>
    <title>Listagem de Produtos</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Personalização adicional */
        .card {
            height: 400px; /* Altura fixa para os cards */
        }
        .card-img-top {
            height: 200px; /* Altura fixa para a imagem do produto */
            object-fit: cover; /* Redimensionar a imagem para preencher a área */
        }
    </style>
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
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
            @foreach ($produtos as $produto)
                <div class="col mb-4">
                    <a href="{{ route('detalhes-produto', ['id' => $produto['id']]) }}" style="text-decoration: none;">
                        <div class="card">
                            {{-- <img src="{{ $produto->foto }}" class="card-img-top" alt="Foto do produto"> --}}
                            <div class="card-body">
                                <h5 class="card-title">{{ $produto['nome'] }}</h5>
                                <p class="card-text">{{ $produto['descricao'] }}</p>
                                <p class="card-text">Valor: R$ {{ $produto['valor'] }}</p>
                                <p class="card-text">Estoque: {{ $produto['estoque'] }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
