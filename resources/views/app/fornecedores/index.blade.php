@extends('site.layouts.basico')
@section('conteudo')
    <h1>{{$titulo}}</h1>
    <div class="row">
        <div class="col">
            <div class="mt-10">
                <table class="table table-sm table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NOME</th>
                            <th scope="col">E-MAIL</th>
                            <th scope="col">UF</th>
                            <th scope="col">DATA DE CRIAÇÃO</th>
                            <th scope="col">DATA DE ATUALIZAÇÃO</th>
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
                                <td><a href="{{route('app.editarFornecedores')}}" class="btn btn-warning btn-sm">Editar</a></td>
                                <td><a href="#" class="btn btn-danger btn-sm">Deletar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
