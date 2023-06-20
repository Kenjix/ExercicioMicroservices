<nav class="navbar navbar-expand-lg bg-body-tertiary mb-4">
    <div class="container-fluid">
        Minha Loja
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('produtos.index')}}">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Ofertas do Dia</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Admin
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('produtos.create') }}">Cadastrar um produto</a></li>
                        <li><a class="dropdown-item" href="#">Listar e Editar Produtos</a></li>
                    </ul>
                </li>
            </ul>
            <div class="d-flex">
                <a href="{{ route('carrinho.index') }}" class="btn btn-outline-success" type="submit"><i
                        class="bi bi-cart-fill"></i></a>
            </div>
        </div>
    </div>
</nav>
