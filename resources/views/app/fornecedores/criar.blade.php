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
      <form method="post" action="{{ route('app.criarFornecedor') }}">
        @csrf
        <div class="form-group mb-3">
          <input type="text" class="form-control" value="{{ old('nome') }}" id="nome" name="nome"
            placeholder="Nome do fornecedor">
        </div>
        <div class="form-group mb-3">
          <input type="email" class="form-control" value="{{ old('email') }}" id="email" name="email"
            placeholder="E-mail do fornecedor">
          <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
        </div>
        <div class="form-group mb-3">
          <input type="text" class="form-control" value="{{ old('uf') }}" id="uf" name="uf" placeholder="Estado do Fornecedor">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Criar</button>
        </div>
      </form>
    </div>
  @endsection
