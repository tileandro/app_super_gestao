@extends('site.layouts.basico')
@section('conteudo')
    <h1>{{$titulo}}</h1>
    <div class="row">
        <div class="col">
            @component('site.layouts._components.form_contato')
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Erro</h5>
                    <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
                </div>
            </div>
            @endcomponent
        </div>
    </div>
@endsection
