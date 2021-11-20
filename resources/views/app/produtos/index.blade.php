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
                            <th scope="col">PESO</th>
                            <th scope="col">UNIDADE DE MEDIDA (ID)</th>
                            <th scope="col">DATA DE CRIAÇÃO</th>
                            <th scope="col">DATA DE ATUALIZAÇÃO</th>
                            <th scope="col">
                                <div class="form-group">
                                    <a href="{{route('produtos.create')}}" class="btn btn-primary btn-sm">Criar Produto</a>
                                </div>
                            </th>
                            <th scope="col">
                                <div class="form-group">
                                    <a href="{{route('unidades.create')}}" class="btn btn-primary btn-sm">Criar Unidade de medida</a>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <th scope="row">{{$produto['id']}}</th>
                                <td>{{$produto['nome']}}</td>
                                <td>{{$produto['descricao']}}</td>
                                <td>{{$produto['peso']}}</td>
                                <td>{{$produto['unidade_id']}}</td>
                                <td>{{date('d/m/Y h:m:s', strtotime($produto['created_at']))}}</td>
                                <td>{{date('d/m/Y h:m:s', strtotime($produto['updated_at']))}}</td>
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
                    <h5 class="modal-title link-light" id="TituloModalCentralizado">Deletar Produto</h5>
                    <button type="button btn-dark" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Tem certeza que você deseja deletar o Produto <b></b>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-dismiss="modal">Cancelar</button>
                    <form method="post" action="">
                        @csrf
                        <input type="hidden" name="idusuario" value="" class="idusuario"/>
                        <input type="hidden" name="nomeusuario" value="" class="nomeusuario"/>
                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.deletar, .close').click(function () {
                $('#modalDeletar').modal('toggle');
                $('.modal-body b').html($(this).attr("data-name"));
                $('.nomeusuario').html($(this).attr("data-name"));
                $('.idusuario').val($(this).attr("data-id"));
            });
        });
    </script>
@endsection

