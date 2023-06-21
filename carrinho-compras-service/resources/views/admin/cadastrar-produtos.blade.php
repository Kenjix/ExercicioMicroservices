@extends("template.layout")
@section('main')
<div class="container">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Cadastro de Produto</h5>
        <form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Foto do Produto</label>
                <input type="file" id="imagem" name="imagem" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do produto">
              </div>
              <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="3" placeholder="Digite a descrição do produto"></textarea>
              </div>
              <div class="form-group">
                <label for="nome">Codigo</label>
                <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Digite o codigo do produto">
              </div>
              <div class="form-group">
                <label for="estoque">Estoque</label>
                <input type="number" class="form-control" id="estoque" name="estoque" placeholder="Digite a quantidade em estoque">
              </div>
              <div class="form-group">
                <label for="valor">Valor</label>
                <input type="number" class="form-control" id="valor" name="valor" step="0.01" placeholder="Digite o valor do produto">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal de Produto Cadastrado com Sucesso -->
  <div class="modal fade" id="produtoCadastradoModal" tabindex="-1" role="dialog" aria-labelledby="produtoCadastradoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="produtoCadastradoModalLabel">Produto Cadastrado com Sucesso</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          O produto foi cadastrado com sucesso!
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
@endsection