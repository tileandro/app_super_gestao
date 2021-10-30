<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-center">
    <!-- Brand -->
    <a class="navbar-brand" href="{{ route('site.index')}}">Logo</a>
    <!-- Links -->
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link  {{ $titulo == 'Sobre Nós' ? 'active' : ''}}" href="{{route('site.sobrenos')}}">Sobre Nós</a>
        </li>
        <!-- Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            APP
            </a>
            <div class="dropdown-menu">
            <a class="dropdown-item" href="{{route('app.clientes')}}">Clientes</a>
            <a class="dropdown-item" href="{{route('app.fornecedores')}}">Fornecedores</a>
            <a class="dropdown-item" href="{{route('app.produtos')}}">Produtos</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $titulo == 'Contato' ? 'active' : ''}}" href="{{route('site.contato')}}">Contato</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $titulo == 'Login' ? 'active' : ''}}" href="{{route('site.login')}}">Login</a>
        </li>
    </ul>
</nav>
