@extends('site.layouts.basico')
@section('conteudo')
    <div class="row">
        <div class="col">
            <div class="card  border-dark mb-3 ">
                <div class="card-header"><h3>{{$titulo}}</h3></div>
                <div class="card-body">
                    <form method="post" action="{{route('site.contato')}}">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" value="{{old('usuario')}}" id="usuario" name="usuario" placeholder="Usuário">
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" class="form-control" value="" id="senha" name="senha" placeholder="Senha">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
