<form method="post" action="{{ route('pedido-produtos.store', ['pedidos' => $pedidos]) }}">
    @csrf
    <div class="form-group mb-3">
        <select class="form-control" name="produto_id" id="produto_id">
            <option value="">Escolha o produto</option>
            @foreach ($produtos as $produto)
                <option value="{{$produto['id']}}" {{ (old('nome')) == $produto['nome'] ? 'selected' : '' }}>{{$produto['nome']}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group mt-3">
        <button type="submit" class="btn btn-primary">Cadastrar Produto </button>
    </div>
</form>
