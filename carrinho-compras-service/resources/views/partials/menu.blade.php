<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('produtos.index') }}">
            <img src="{{ asset('imagens/icon.png') }}" style="width: 32px; margin-right: 8px;">ByteStore
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Categorias
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Celulares</a></li>
                        <li><a class="dropdown-item" href="#">Periféricos</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Etc...</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ofertas do Dia</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control rounded-pill me-2" type="search" placeholder="Pesquisar" aria-label="Search">
                <button class="btn btn-outline-success rounded-pill" type="submit"><i class="bi bi-search"></i></button>
            </form>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ asset('imagens/account.png') }}" style="width: 24px; margin-right: 8px;">Conta
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('produtos.create') }}">Cadastrar um produto</a></li>
                        <li><a class="dropdown-item" href="{{ route('produtos.admin.index') }}">Listar e Editar Produtos</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('carrinho.index') }}" class="nav-link">
                        <img src="{{ asset('imagens/cart.png') }}" style="width: 24px; margin-right: 8px;">Carrinho
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
