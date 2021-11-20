@extends('site.layouts.basico')
@section('conteudo')
  <h1>{{ $titulo }}</h1>
  <div class="row">
    <div class="col-6" style="margin:auto;">
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
                <th scope="col">UNIDADE</th>
                <th scope="col" colspan="2">DESCRIÇÃO</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$unidade->id}}</td>
                <td>{{$unidade->unidade}}</td>
                <td>{{$unidade->descricao}}</td>
            </tr>
        </tbody>
      </table>
    </div>
  @endsection
