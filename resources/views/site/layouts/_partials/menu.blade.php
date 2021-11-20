<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-center">
    <!-- Brand -->
    <a class="btn btn-light link-dark mx-3" href="{{ route('site.index')}}">APP SG</a>
    <!-- Links -->
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link link-light {{ $titulo == 'Sobre Nós' ? 'active' : ''}}" href="{{route('site.sobrenos')}}">Sobre Nós</a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-light {{ $titulo == 'Clientes' ? 'active' : ''}}" href="{{route('app.clientes')}}">Clientes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-light {{ $titulo == 'Fornecedores' || $titulo == 'Editar Fornecedor' || $titulo == 'Criar Fornecedor' ? 'active' : ''}}" href="{{route('app.fornecedores')}}">Fornecedores</a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-light {{ $titulo == 'Produtos' ? 'active' : ''}}" href="{{route('produtos.index')}}">Produtos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-light {{ $titulo == 'Unidade de Medida' ? 'active' : ''}}" href="{{route('unidades.index')}}">Unidades</a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-light {{ $titulo == 'Contato' ? 'active' : ''}}" href="{{route('site.contato')}}">Contato</a>
        </li>
        @if (isset($usuario)  && $usuario != '')
            <li class="nav-item">
                <a class="nav-link link-light" href="{{route('app.sair')}}">Sair</a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link link-light {{ $titulo == 'Login' ? 'active' : ''}}" href="{{route('site.login')}}">Login</a>
            </li>
        @endif
    </ul>
</nav>
