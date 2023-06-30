@extends("template.layout")
@section("main")
<div class="container">
    <h1 class="mt-4">Carrinho de Compras</h1>
    @php
        $total = 0;
    @endphp
    @foreach ($produtos as $produto)
    <div class="card card-item mt-3">
        <div class="row g-0">
            @if (isset($produto['imagem_link']))
            <div class="col-md-4 d-flex justify-content-center">
                <img src="{{ $produto['imagem_link'] }}" class="img-fluid" width="200px" alt="Imagem do Produto">
            </div>
            @endif
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $produto['nome'] }}</h5>
                    <p class="card-text">{{ $produto['descricao'] }}</p>
                    <p class="card-text"><small class="text-muted">Estoque: {{ $produto['estoque'] }}</small></p>
                    <p class="card-text"><small class="text-muted">Valor: R$ {{ $produto['valor'] }}</small></p>
                    @php
                        $total += $produto['valor'] * $produto['quantidade'];
                    @endphp
                    <div class="d-flex justify-content-between">
                        <div class="quantity">
                            <button id="remItem" class="btn btn-sm btn-secondary" onclick="updateQuantity({{ $produto['id'] }}, -1)">-</button>
                            <span id="quantity{{ $produto['id'] }}" class="mx-2">{{ $produto['quantidade'] }}</span>
                            <button id="addItem" class="btn btn-sm btn-secondary" onclick="updateQuantity({{ $produto['id'] }}, 1)">+</button>
                        </div>
                        <form action="{{ route('carrinho.remove', ['carrinho_id' => $produto['carrinho_id'], 'produto_id' => $produto['produto_id']]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Remover produto?')">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="text-end">
        <p class="h5 mt-2" id="totalValue">Total: R$ {{ $total }}</p>
        <button class="btn btn-success my-3">Finalizar Compra</button>
    </div>
</div>

<script>
    function updateQuantity(productId, amount) {
        var quantityElement = document.getElementById('quantity' + productId);
        var currentQuantity = parseInt(quantityElement.innerHTML);
        var newQuantity = currentQuantity + amount;
        if (newQuantity >= 0) {
            quantityElement.innerHTML = newQuantity;
            updateTotal();
        }
    }

    function updateTotal() {
        var total = 0;
        var quantities = document.querySelectorAll('[id^="quantity"]');
        var prices = document.querySelectorAll('[data-price]');
        for (var i = 0; i < quantities.length; i++) {
            var quantity = parseInt(quantities[i].innerHTML);
            var price = parseFloat(prices[i].getAttribute('data-price'));
            total += quantity * price;
        }
        document.getElementById('totalValue').innerHTML = 'Total: R$ ' + total.toFixed(2);
    }
</script>
@endsection
