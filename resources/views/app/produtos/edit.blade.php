@extends('site.layouts.basico')
@section('conteudo')
  <h1>{{ $titulo }}</h1>
  <div class="row">
    <div class="col-6" style="margin:auto;">
      @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
          @foreach ($errors->all() as $erro)
            <p>{{ $erro }}</p>
          @endforeach
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      <form method="post" action="{{ route('produtos.update', $produto['id']) }}">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <select class="form-control" name="fornecedor_id" id="fornecedor_id">
                <option value="">Escolha o Fornecedor</option>
                @foreach ($fornecedores as $fornecedor)
                <option value="{{$fornecedor['id']}}" {{ ($produto->fornecedor->id ?? old('fornecedor_id')) == $fornecedor['id'] ? 'selected' : '' }}>{{ $produto->fornecedor->id  == $fornecedor['id'] ? $produto->fornecedor->nome : $fornecedor['nome']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
          <input type="text" class="form-control" value="{{ $produto['nome'] ?? old('nome') }}" id="nome" name="nome"
            placeholder="Nome do produto">
        </div>
        <div class="form-group mb-3">
          <input type="text" class="form-control" value="{{ $produto['descricao'] ?? old('descricao') }}" id="descricao" name="descricao"
            placeholder="Descrição do produto">
        </div>
        <div class="form-group mb-3">
            <input type="number" class="form-control" value="{{ $produto['peso'] ?? old('peso') }}" id="peso" name="peso" placeholder="Peso do produto">
        </div>
        <div class="form-group mb-3">
            <select class="form-control" name="unidade_id" id="unidade_id">
                <option value="">Escolha a unidade de medida</option>
                @foreach ($unidades as $unidade)
                <option value="{{$unidade['id']}}" {{($produto['unidade_id'] ?? old('unidade_id')) == $unidade['id'] ? 'selected' : ''}}>{{$unidade['descricao']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">Detalhes do Produto clique <a href="{{ route('produto-detalhe.edit', $produto->produtoDetalhe->id) }}">aqui</a> para editar</div>
        <div class="form-group mb-3">
            Comprimento: {{ $produto->produtoDetalhe->comprimento ?? old('comprimento') }} {{ $produto->unidade->unidade_id == $unidade['id'] ? $produto->unidade->unidade : $unidade['unidade'] }}
        </div>
        <div class="form-group mb-3">
            Largura: {{ $produto->produtoDetalhe->largura ?? old('largura') }} {{ $produto->unidade->unidade_id == $unidade['id'] ? $produto->unidade->unidade : $unidade['unidade'] }}
        </div>
        <div class="form-group mb-3">
            Altura: {{ $produto->produtoDetalhe->altura ?? old('altura') }} {{ $produto->unidade->unidade_id == $unidade['id'] ? $produto->unidade->unidade : $unidade['unidade'] }}
        </div>
        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Editar Produto</button>
        </div>
      </form>
    </div>
  @endsection
