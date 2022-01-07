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
                            <th scope="col">E-MAIL</th>
                            <th scope="col">UF</th>
                            <th scope="col">DATA DE CRIAÇÃO</th>
                            <th scope="col">DATA DE ATUALIZAÇÃO</th>
                            <th scope="col">
                                <div class="form-group">
                                    <a href="{{ route('app.criarFornecedor') }}" class="btn btn-primary btn-sm">Criar Fornecedor</a>
                                </div>
                            </th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fornecedores as $fornecedor)
                            <tr>
                                <th scope="row">{{$fornecedor['id']}}</th>
                                <td>{{$fornecedor['nome']}}</td>
                                <td>{{$fornecedor['email']}}</td>
                                <td>{{$fornecedor['uf']}}</td>
                                <td>{{date('d/m/Y h:m:s', strtotime($fornecedor['created_at']))}}</td>
                                <td>{{date('d/m/Y h:m:s', strtotime($fornecedor['updated_at']))}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm listar" data-toggle="modal" data-id="{{$fornecedor->nome}}"
                                        data-name='<table class="table table-sm table-hover">
                                            <tbody>
                                                @foreach( $fornecedor->produtos as $key => $produto )
                                                    <tr>
                                                        <th scope="row">{{$produto->id}}</th>
                                                        <td>{{$produto->nome}}</td>
                                                        <td>{{$produto->descricao}}</td>
                                                        <td>{{$produto->peso}} {{$produto->unidade->unidade ?? ''}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>' data-target="#modalListaProdutos">
                                        Listar Produtos
                                    </button>
                                </td>
                                <td><a href="{{route('app.editarFornecedores', $fornecedor['id'])}}" class="btn btn-warning btn-sm">Editar Fornecedor</a></td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm deletar" data-toggle="modal" data-id="{{$fornecedor['id']}}" data-name="{{$fornecedor['nome']}}" data-target="#modalDeletar">
                                        Deletar Fornecedor
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
                    <h5 class="modal-title link-light" id="TituloModalCentralizado">Deletar Fornecedor</h5>
                    <button type="button btn-dark" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Tem certeza que você quer deletar o fornecedor <b></b>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-dismiss="modal">Cancelar</button>
                    <form method="post" action="{{route('app.fornecedores')}}">
                        @csrf
                        <input type="hidden" name="idusuario" value="" class="idusuario"/>
                        <input type="hidden" name="nomeusuario" value="" class="nomeusuario"/>
                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalListaProdutos" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title link-light" id="TituloModalCentralizado">Lista de Produtos do fornecedor <p></p></h5>
                    <button type="button btn-dark" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"></div>
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
                $('.modal-body b').html($(this).attr("data-name"));
                $('.nomeusuario').html($(this).attr("data-name"));
                $('.idusuario').val($(this).attr("data-id"));
            });
            $('.listar, #modalListaProdutos .close').click(function () {
                $('#modalListaProdutos').modal('toggle');
                $('#modalListaProdutos .modal-title p').html($(this).attr("data-id"));
                $('#modalListaProdutos .modal-body').html($(this).attr("data-name"));
            });
        });
    </script>
@endsection

