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
                    <th scope="col">QTD</th>
                    <th scope="col">CRIADO</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos->produtos as $produto)
                    <tr>
                        <td scope="row">{{$produto['nome']}}</td>
                        <td scope="row">{{$produto->pivot->quantidade}}</td>
                        <td scope="row">{{$produto->pivot->created_at->format('d/m/Y')}}</td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm deletar" data-toggle="modal" data-id="{{$pedidos->id}}/{{$produto['id']}}" data-name="{{$produto['nome']}}" data-target="#modalDeletar">
                                Deletar Produto
                            </button>
                        </td>
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
    <div class="modal fade" id="modalDeletar" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title link-light" id="TituloModalCentralizado">Deletar Produto <span></span></h5>
                    <button type="button btn-dark" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Tem certeza que você deseja deletar o Produto <b></b>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-dismiss="modal">Cancelar</button>
                    <form method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.deletar, #modalDeletar .close').click(function () {
                $('#modalDeletar').modal('toggle');
                $('#modalDeletar .modal-body b, #modalDeletar .modal-title span').html($(this).attr("data-name"));
                $('#modalDeletar .modal-footer form').attr("action", "/app/pedido-produtos/destroy/" + $(this).attr("data-id") + "");
            });
        });
    </script>
@endsection
