@if (isset($pedidos->id))
<form method="post" class action="{{ route('pedidos.update', $pedidos['id']) }}">
    @csrf
    @method('PUT')
@else
<form method="post" action="{{ route('pedidos.store') }}">
    @csrf
@endif
<div class="form-group mb-3">
    <select class="form-control" name="cliente_id" id="cliente_id">
        <option value="">Escolha o cliente</option>
        @foreach ($clientes as $cliente)
            <option value="{{$cliente['id']}}" {{ ($pedidos->nome ?? old('nome')) == $cliente['nome'] ? 'selected' : '' }}>{{$cliente['nome']}}</option>
        @endforeach
    </select>
</div>
    <div class="form-group mt-3">
        <button type="submit" class="btn btn-primary">@if (isset($pedidos->id)) Editar @else Cadastrar @endif Pedido </button>
    </div>
</form>
