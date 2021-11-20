@extends('site.layouts.basico')
@section('conteudo')
  <h1>{{ $titulo }} - {{$unidade->unidade}}</h1>
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
      <form method="post" action="{{route('unidades.update', $unidade->id)}}">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
          <input type="text" class="form-control" value="{{ $unidade->unidade ?? old('unidade') }}" id="unidade" name="unidade"
            placeholder="Nome do produto">
        </div>
        <div class="form-group mb-3">
          <input type="text" class="form-control" value="{{ $unidade->descricao ?? old('descricao') }}" id="descricao" name="descricao"
            placeholder="Descrição do produto">
        </div>
        <div class="form-group mt-3">
          <button type="submit" class="btn btn-primary">Editar Unidade</button>
        </div>
      </form>
    </div>
  @endsection
