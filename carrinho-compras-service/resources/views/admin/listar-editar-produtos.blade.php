@extends("template.layout")
@section("main")
<div class="container">
  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
    @foreach ($produtos as $produto)
    <div class="col mb-4">
      <div class="card card-produtos">
        <div class="card-body">
          <img src="{{ $produto['imagem_link'] }}" class="card-img-top" alt="Foto do produto">
          <h5 class="card-title">{{ $produto['nome'] }}</h5>
          <p class="card-text">{{ $produto['descricao'] }}</p>
          <p class="card-text">Valor: R$ {{ $produto['valor'] }}</p>
          <p class="card-text">Estoque: {{ $produto['estoque'] }}</p>
        </div>
        <div class="card-footer d-flex justify-content-between">
          <div>
            <a href="{{ route('produtos.edit', ['id' => $produto['id']]) }}" class="btn btn-primary btn-sm">
              <i class="bi bi-pencil-square"></i> Editar
            </a>
            <form action="{{ route('produtos.destroy', ['id' => $produto['id']]) }}" method="POST" class="d-inline-block">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este produto?')">
                <i class="bi bi-trash3"></i> Excluir
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
