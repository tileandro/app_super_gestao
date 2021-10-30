@extends('site.layouts.basico')
@section('conteudo')
    <h1>{{$titulo}}</h1>
    <div class="row">
        <div class="col">
            Texto
        </div>
        <div class="col">
            @component('site.layouts._components.form_contato')
                <legend>Formulário de Contato</legend>
            @endcomponent
        </div>
    </div>
@endsection
