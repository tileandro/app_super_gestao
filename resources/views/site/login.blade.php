@extends('site.layouts.basico')
@section('conteudo')
  <div class="row">
    <div class="col">
      <div class="card dark mb-3 col-5" style="margin:auto;">
        <div class="card-header">
          <h3>{{ $titulo }}</h3>
        </div>
        <div class="card-body">
          @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
              @foreach ($errors->all() as $erro)
                <p>{{ $erro }}</p>
              @endforeach
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
            @if(isset($erro) && $erro != '')
            <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                <p>{{ $erro }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
          <form method="post" action="{{ route('site.login') }}">
            @csrf
            <div class="form-group mb-3">
              <input type="email" class="form-control" value="{{ old('email') }}" id="email" name="email"
                placeholder="E-mail">
            </div>
            <div class="form-group mb-3">
              <input type="password" class="form-control" value="" id="password" name="password" placeholder="Senha">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary float-right">Enviar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
