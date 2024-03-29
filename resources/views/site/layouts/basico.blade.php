<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- Meta tags Obrigatórias -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" crossorigin="anonymous">
        <title>Super Gestão - {{$titulo}}</title>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header class="fixed-top">
            @include('site.layouts._partials.menu')
        </header>
        <main class="bd-content order-1 py-5 my-3" id="content">
            <div class="container">
                @yield('conteudo')
            </div>
        </main>
        <footer class="footer mt-auto py-3 bg-dark text-center link-light fixed-bottom">
            <div class="container">
                Todos os Direitos Reservados
            </div>
        </footer>
        <!-- JavaScript (Opcional) -->
        <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('js/bootstrap.min.js')}}" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.dropdown').click(function () {
                    $(this).find('.dropdown-menu').toggle();
                })

                $('.table').DataTable({
                    "language": {
                        "emptyTable": "Nenhum registro encontrado",
                        "info": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                        "infoEmpty": "Mostrando 0 até 0 de 0 registros",
                        "infoFiltered": "(Filtrados de _MAX_ registros)",
                        "infoThousands": ".",
                        "loadingRecords": "Carregando...",
                        "processing": "Processando...",
                        "zeroRecords": "Nenhum registro encontrado",
                        "search": "Pesquisar",
                        "paginate": {
                            "next": "Próximo",
                            "previous": "Anterior",
                            "first": "Primeiro",
                            "last": "Último"
                        },
                        "aria": {
                            "sortAscending": ": Ordenar colunas de forma ascendente",
                            "sortDescending": ": Ordenar colunas de forma descendente"
                        },
                        "select": {
                            "rows": {
                                "_": "Selecionado %d linhas",
                                "1": "Selecionado 1 linha"
                            },
                            "cells": {
                                "1": "1 célula selecionada",
                                "_": "%d células selecionadas"
                            },
                            "columns": {
                                "1": "1 coluna selecionada",
                                "_": "%d colunas selecionadas"
                            }
                        },
                        "buttons": {
                            "copySuccess": {
                                "1": "Uma linha copiada com sucesso",
                                "_": "%d linhas copiadas com sucesso"
                            },
                            "collection": "Coleção  <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
                            "colvis": "Visibilidade da Coluna",
                            "colvisRestore": "Restaurar Visibilidade",
                            "copy": "Copiar",
                            "copyKeys": "Pressione ctrl ou u2318 + C para copiar os dados da tabela para a área de transferência do sistema. Para cancelar, clique nesta mensagem ou pressione Esc..",
                            "copyTitle": "Copiar para a Área de Transferência",
                            "csv": "CSV",
                            "excel": "Excel",
                            "pageLength": {
                                "-1": "Mostrar todos os registros",
                                "_": "Mostrar %d registros"
                            },
                            "pdf": "PDF",
                            "print": "Imprimir"
                        },
                        "autoFill": {
                            "cancel": "Cancelar",
                            "fill": "Preencher todas as células com",
                            "fillHorizontal": "Preencher células horizontalmente",
                            "fillVertical": "Preencher células verticalmente"
                        },
                        "lengthMenu": "Exibir _MENU_ resultados por página",
                        "searchBuilder": {
                            "add": "Adicionar Condição",
                            "button": {
                                "0": "Construtor de Pesquisa",
                                "_": "Construtor de Pesquisa (%d)"
                            },
                            "clearAll": "Limpar Tudo",
                            "condition": "Condição",
                            "conditions": {
                                "date": {
                                    "after": "Depois",
                                    "before": "Antes",
                                    "between": "Entre",
                                    "empty": "Vazio",
                                    "equals": "Igual",
                                    "not": "Não",
                                    "notBetween": "Não Entre",
                                    "notEmpty": "Não Vazio"
                                },
                                "number": {
                                    "between": "Entre",
                                    "empty": "Vazio",
                                    "equals": "Igual",
                                    "gt": "Maior Que",
                                    "gte": "Maior ou Igual a",
                                    "lt": "Menor Que",
                                    "lte": "Menor ou Igual a",
                                    "not": "Não",
                                    "notBetween": "Não Entre",
                                    "notEmpty": "Não Vazio"
                                },
                                "string": {
                                    "contains": "Contém",
                                    "empty": "Vazio",
                                    "endsWith": "Termina Com",
                                    "equals": "Igual",
                                    "not": "Não",
                                    "notEmpty": "Não Vazio",
                                    "startsWith": "Começa Com"
                                },
                                "array": {
                                    "contains": "Contém",
                                    "empty": "Vazio",
                                    "equals": "Igual à",
                                    "not": "Não",
                                    "notEmpty": "Não vazio",
                                    "without": "Não possui"
                                }
                            },
                            "data": "Data",
                            "deleteTitle": "Excluir regra de filtragem",
                            "logicAnd": "E",
                            "logicOr": "Ou",
                            "title": {
                                "0": "Construtor de Pesquisa",
                                "_": "Construtor de Pesquisa (%d)"
                            },
                            "value": "Valor",
                            "leftTitle": "Critérios Externos",
                            "rightTitle": "Critérios Internos"
                        },
                        "searchPanes": {
                            "clearMessage": "Limpar Tudo",
                            "collapse": {
                                "0": "Painéis de Pesquisa",
                                "_": "Painéis de Pesquisa (%d)"
                            },
                            "count": "{total}",
                            "countFiltered": "{shown} ({total})",
                            "emptyPanes": "Nenhum Painel de Pesquisa",
                            "loadMessage": "Carregando Painéis de Pesquisa...",
                            "title": "Filtros Ativos"
                        },
                        "thousands": ".",
                        "datetime": {
                            "previous": "Anterior",
                            "next": "Próximo",
                            "hours": "Hora",
                            "minutes": "Minuto",
                            "seconds": "Segundo",
                            "amPm": [
                                "am",
                                "pm"
                            ],
                            "unknown": "-",
                            "months": {
                                "0": "Janeiro",
                                "1": "Fevereiro",
                                "10": "Novembro",
                                "11": "Dezembro",
                                "2": "Março",
                                "3": "Abril",
                                "4": "Maio",
                                "5": "Junho",
                                "6": "Julho",
                                "7": "Agosto",
                                "8": "Setembro",
                                "9": "Outubro"
                            },
                            "weekdays": [
                                "Domingo",
                                "Segunda-feira",
                                "Terça-feira",
                                "Quarta-feira",
                                "Quinte-feira",
                                "Sexta-feira",
                                "Sábado"
                            ]
                        },
                        "editor": {
                            "close": "Fechar",
                            "create": {
                                "button": "Novo",
                                "submit": "Criar",
                                "title": "Criar novo registro"
                            },
                            "edit": {
                                "button": "Editar",
                                "submit": "Atualizar",
                                "title": "Editar registro"
                            },
                            "error": {
                                "system": "Ocorreu um erro no sistema (<a target=\"\\\" rel=\"nofollow\" href=\"\\\">Mais informações<\/a>)."
                            },
                            "multi": {
                                "noMulti": "Essa entrada pode ser editada individualmente, mas não como parte do grupo",
                                "restore": "Desfazer alterações",
                                "title": "Multiplos valores",
                                "info": "Os itens selecionados contêm valores diferentes para esta entrada. Para editar e definir todos os itens para esta entrada com o mesmo valor, clique ou toque aqui, caso contrário, eles manterão seus valores individuais."
                            },
                            "remove": {
                                "button": "Remover",
                                "confirm": {
                                    "_": "Tem certeza que quer deletar %d linhas?",
                                    "1": "Tem certeza que quer deletar 1 linha?"
                                },
                                "submit": "Remover",
                                "title": "Remover registro"
                            }
                        },
                        "decimal": ","
                    }
                });
            } );
        </script>
    </body>
</html>
