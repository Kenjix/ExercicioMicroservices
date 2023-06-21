@extends("template.layout")
@section("main")
<div class="container">
  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
    @foreach ($produtos as $produto)
      <div class="col mb-4">
        <div class="card card-produtos">
          {{-- <img src="{{ $produto->foto }}" class="card-img-top" alt="Foto do produto"> --}}
          <div class="card-body">
            <h5 class="card-title">{{ $produto['nome'] }}</h5>
            <p class="card-text">{{ $produto['descricao'] }}</p>
            <p class="card-text">Valor: R$ {{ $produto['valor'] }}</p>
            <p class="card-text">Estoque: {{ $produto['estoque'] }}</p>
          </div>
          <div class="card-footer d-flex justify-content-end">
            <a href="{{ route('produtos.update', ['id' => $produto['id']]) }}" class="btn btn-primary mr-2">
              <i class="fas fa-edit"></i>
            </a>
            <form action="{{ route('produtos.destroy', ['id' => $produto['id']]) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este produto?')">
                <i class="fas fa-trash"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
