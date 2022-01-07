@if (isset($clientes->id))
<form method="post" class action="{{ route('clientes.update', $clientes['id']) }}">
    @csrf
    @method('PUT')
    <input type="hidden" name="cliente_id" value="{{$clientes->id}}" />
@else
<form method="post" action="{{ route('clientes.store') }}">
    @csrf
@endif
    <div class="form-group mb-3">
        <input type="text" class="form-control" value="{{ $clientes->nome ?? old('nome') }}" id="nome" name="nome"
        placeholder="Nome do Cliente">
    </div>
    <div class="form-group mt-3">
        <button type="submit" class="btn btn-primary">@if (isset($clientes->id)) Editar @else Cadastrar @endif Cliente </button>
    </div>
</form>
