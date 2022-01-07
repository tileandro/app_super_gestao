@extends('site.layouts.basico')
@section('conteudo')
  <h1>{{ $titulo }}</h1>
  <div class="row">
    <div class="col-12" style="margin:auto;">
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
    </div>
    <div class="col-6" style="margin:auto;">
        <h4>Produtos Adicionados neste Pedido</h4>
        <table class="table table-sm table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">NOME</th>
                    <th scope="col">DESCRIÇÃO</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos->produtos as $pedido)
                    <tr>
                        <th scope="row">{{$pedido['nome']}}</th>
                        <th scope="row">{{$pedido['descricao']}}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-6" style="margin:auto;">
        <h4>Adicionar Produto</h4>
        @component('app.pedido-produtos._components.form_create_edit', ['pedidos' => $pedidos, 'produtos' => $produtos])
        @endcomponent
    </div>
@endsection
