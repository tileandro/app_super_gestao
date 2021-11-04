@extends('site.layouts.basico')
@section('conteudo')
  <h1>{{ $titulo }}</h1>
  <div class="row">
    <div class="col">
      @component('site.layouts._components.form_contato')

      @endcomponent
    </div>
  </div>
@endsection
