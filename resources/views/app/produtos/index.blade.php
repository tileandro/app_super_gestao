@extends('site.layouts.basico')
@section('conteudo')
    <h1>{{$titulo}}</h1>
    <div class="row">
        <div class="col">
            <div class="mt-10">
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
                <table class="table table-sm table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NOME</th>
                            <th scope="col">DESCRIÇÃO</th>
                            <th scope="col">FORNECEDOR</th>
                            <th scope="col">PESO</th>
                            <th scope="col">COMPRIMENTO</th>
                            <th scope="col">LARGURA</th>
                            <th scope="col">ALTURA</th>
                            <th scope="col">DATA DE CRIAÇÃO</th>
                            <th scope="col">DATA DE ATUALIZAÇÃO</th>
                            <th scope="col">
                                <div class="form-group">
                                    <a href="{{route('produtos.create')}}" class="btn btn-primary btn-sm">Cadastrar Produto</a>
                                </div>
                            </th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <th scope="row">{{$produto['id']}}</th>
                                <td>{{$produto['nome']}}</td>
                                <td>{{$produto['descricao']}}</td>
                                <td>{{$produto->fornecedor->nome ?? ''}}</td>
                                <td>{{$produto['peso']}} {{$produto->unidade->unidade ?? ''}}</td>
                                <td>{{$produto->produtoDetalhe->comprimento ?? ''}} {{$produto->produtoDetalhe->unidade->unidade ?? ''}}</td>
                                <td>{{$produto->produtoDetalhe->largura ?? ''}} {{$produto->produtoDetalhe->unidade->unidade ?? ''}}</td>
                                <td>{{$produto->produtoDetalhe->altura ?? ''}} {{$produto->produtoDetalhe->unidade->unidade ?? ''}}</td>
                                <td>{{date('d/m/Y h:m:s', strtotime($produto['created_at']))}}</td>
                                <td>{{date('d/m/Y h:m:s', strtotime($produto['updated_at']))}}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm listar" data-toggle="modal"
                                        data-pedido="
                                        @foreach ($produto->pedidos as $pedido)
                                            <p>Pedido nº {{$pedido->id}} <a href='{{ route('pedido-produtos.create', ['pedidos' => $pedido->id]) }}' class='btn btn-success btn-sm' target='_blank'>Ver pedido</a></p>
                                        @endforeach
                                        " data-name="{{$produto['nome']}}" data-target="#modalListar">
                                            Ver Pedidos
                                    </button>
                                </td>
                                <td><a href="{{route('produtos.edit', $produto['id'])}}" class="btn btn-warning btn-sm">Editar Produto</a></td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm deletar" data-toggle="modal" data-id="{{$produto['id']}}" data-name="{{$produto['nome']}}" data-target="#modalDeletar">
                                        Deletar Produto
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
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
    <div class="modal fade" id="modalListar" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title link-light" id="TituloModalCentralizado">Pedidos do Produto <span></span></h5>
                    <button type="button btn-dark" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.deletar, #modalDeletar .close').click(function () {
                $('#modalDeletar').modal('toggle');
                $('#modalDeletar .modal-body b, #modalDeletar .modal-title span').html($(this).attr("data-name"));
                $('#modalDeletar .modal-footer form').attr("action", "/app/produtos/" + $(this).attr("data-id") + "");
            });

            $('.listar, #modalListar .close').click(function () {
                $('#modalListar').modal('toggle');
                $('#modalListar .modal-title span').html($(this).attr("data-name"));
                $('#modalListar .modal-body').html($(this).attr("data-pedido"));
            });
        });
    </script>
@endsection
