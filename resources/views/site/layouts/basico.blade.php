<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- Meta tags Obrigatórias -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" crossorigin="anonymous">
        <title>Super Gestão - {{$titulo}}</title>
    </head>
    <body>
        <header>
            @include('site.layouts._partials.menu')
        </header>
        <main class="bd-content order-1 py-5" id="content">
            <div class="container">
                @yield('conteudo')
            </div>
        </main>
        <!-- JavaScript (Opcional) -->
        <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('js/bootstrap.min.js')}}" crossorigin="anonymous"></script>
        <script>
            $('.dropdown').click(function () {
                $(this).find('.dropdown-menu').toggle();
            })
        </script>
    </body>
</html>
