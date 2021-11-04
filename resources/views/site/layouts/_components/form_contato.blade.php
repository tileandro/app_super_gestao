{{$slot}}
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
        @foreach ($errors->all() as $erro)
            <p>{{ $erro }}</p>
        @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<form method="post" action="{{route('site.contato')}}">
    @csrf
    <div class="form-group mb-3">
        <input type="text" class="form-control" value="{{old('nome')}}" id="nome" name="nome" placeholder="Nome">
    </div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" value="{{old('telefone')}}" id="telefone" name="telefone" placeholder="Telefone">
    </div>
    <div class="form-group mb-3">
        <input type="email" class="form-control" value="{{old('email')}}" id="email" name="email" placeholder="Seu email">
        <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
    </div>
    <div class="form-group mb-3">
        <select id="assunto" name="assunto" class="form-control">
            <option value="">Assunto</option>
            <option value="1" {{old('assunto') == 1 ? 'selected' : ''}}>Dúvida</option>
            <option value="2" {{old('assunto') == 2 ? 'selected' : ''}}>Motivo</option>
            <option value="3" {{old('assunto') == 3 ? 'selected' : ''}}>Reclamação</option>
            <option value="4" {{old('assunto') == 4 ? 'selected' : ''}}>Outros</option>
        </select>
    </div>
    <div class="form-group mb-3">
        <textarea class="form-control" id="mensagem" name="mensagem" rows="3">{{old('mensagem')}}</textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>
