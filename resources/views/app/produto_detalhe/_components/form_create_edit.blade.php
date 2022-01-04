@if (isset($produto_detalhe->id))
<form method="post" class action="{{ route('produto-detalhe.update', $produto_detalhe['id']) }}">
    @csrf
    @method('PUT')
    <input type="hidden" name="produto_id" value="{{$produto_detalhe->produto->id}}" />
@else
<form method="post" action="{{ route('produto-detalhe.store') }}">
    @csrf
    <div class="form-group mb-3">
        <select class="form-control" name="produto_id" id="produto_id">
            <option value="">Escolha produto</option>
            @foreach ($produtos as $produto)
            <option value="{{$produto['id']}}" {{ ($produto_detalhe->produto_id ?? old('produto_id')) == $produto['id'] ? 'selected' : '' }}>{{$produto['nome']}}</option>
            @endforeach
        </select>
    </div>
@endif
    <div class="form-group mb-3">
        <input type="number" class="form-control" value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}" id="comprimento" name="comprimento"
        placeholder="Comprimento do produto">
    </div>
    <div class="form-group mb-3">
        <input type="number" class="form-control" value="{{ $produto_detalhe->largura ?? old('largura') }}" id="largura" name="largura" placeholder="Largura do produto">
    </div>
    <div class="form-group mb-3">
        <input type="number" class="form-control" value="{{ $produto_detalhe->altura ?? old('altura') }}" id="altura" name="altura" placeholder="Altura do produto">
    </div>
    <div class="form-group">
        <select class="form-control" name="unidade_id" id="unidade_id">
            <option value="">Escolha a unidade de medida</option>
            @foreach ($unidades as $unidade)
            <option value="{{$unidade['id']}}" {{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade['id'] ? 'selected' : '' }}>{{$unidade['descricao']}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group mt-3">
        <button type="submit" class="btn btn-primary">@if (isset($produto_detalhe->id)) Editar @else Cadastrar @endif Detalhe Produto </button>
    </div>
</form>
