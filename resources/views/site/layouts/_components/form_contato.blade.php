{{$slot}}
<form method="post" action="{{route('site.contato')}}">
    @csrf
    <div class="form-group mb-3">
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
    </div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone">
    </div>
    <div class="form-group mb-3">
        <input type="email" class="form-control" id="email" name="email" placeholder="Seu email">
        <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
    </div>
    <div class="form-group mb-3">
        <select id="assunto" name="assunto" class="form-control">
            <option>Assunto</option>
            <option value="1">Dúvida</option>
            <option value="2">Motivo</option>
            <option value="3">Reclamação</option>
            <option value="4">Outros</option>
        </select>
    </div>
    <div class="form-group mb-3">
        <textarea class="form-control" id="mensagem" name="mensagem" rows="3"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>
