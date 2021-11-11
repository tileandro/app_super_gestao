<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-center">
    <!-- Brand -->
    <a class="navbar-brand" href="{{ route('site.index')}}">Super Gestão</a>
    <!-- Links -->
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link {{ $titulo == 'Sobre Nós' ? 'active' : ''}}" href="{{route('site.sobrenos')}}">Sobre Nós</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $titulo == 'Clientes' ? 'active' : ''}}" href="{{route('app.clientes')}}">Clientes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $titulo == 'Fornecedores' || $titulo == 'Editar Fornecedor' || $titulo == 'Criar Fornecedor' ? 'active' : ''}}" href="{{route('app.fornecedores')}}">Fornecedores</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $titulo == 'Produtos' ? 'active' : ''}}" href="{{route('app.produtos')}}">Produtos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $titulo == 'Contato' ? 'active' : ''}}" href="{{route('site.contato')}}">Contato</a>
        </li>
        @if (isset($usuario)  && $usuario != '')
            <li class="nav-item">
                <a class="nav-link" href="{{route('app.sair')}}">Sair</a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link {{ $titulo == 'Login' ? 'active' : ''}}" href="{{route('site.login')}}">Login</a>
            </li>
        @endif
    </ul>
</nav>
