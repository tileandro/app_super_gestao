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
      <form method="post" action="{{ route('produtos.store') }}">
        @csrf
        <div class="form-group mb-3">
          <input type="text" class="form-control" value="{{ old('nome') }}" id="nome" name="nome"
            placeholder="Nome do produto">
        </div>
        <div class="form-group mb-3">
          <input type="text" class="form-control" value="{{ old('descricao') }}" id="descricao" name="descricao"
            placeholder="Descrição do produto">
        </div>
        <div class="form-group mb-3">
            <input type="number" class="form-control" value="{{ old('peso') }}" id="peso" name="peso" placeholder="Peso do produto">
        </div>
        <div class="form-group">
            <select class="form-control" name="unidade_id" id="unidade_id">
                <option value="">Escolha a unidade de medida</option>
                @foreach ($unidades as $unidade)
                <option value="{{$unidade['id']}}">{{$unidade['descricao']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-3">
          <button type="submit" class="btn btn-primary">Cadastrar Produto</button>
        </div>
      </form>
    </div>
  @endsection
