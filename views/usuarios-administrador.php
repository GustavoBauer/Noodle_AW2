<?php
session_start();
include "../includes/start.php";

if ($_SESSION['logado'] && $_SESSION['tipoUsuario'] == "administrador") {
    include "../includes/navbarAdministrador.php";
?>

    <div class="container grey lighten-5" style="padding: 2rem;">
        <h4>Usuários</h4>
        <a class="waves-effect waves-light btn" href="add-usuario.php"><i class="material-icons right">add</i>Adicionar</a>
        <div>
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Prontuário</th>
                        <th>Nome</th>
                        <th>Tipo de Usuário</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $arquivoUsuarios = "../model/usuarios.txt";
                    $tamanhoArquivo = filesize($arquivoUsuarios);
                    $arquivoAberto = fopen($arquivoUsuarios, "r");

                    $arrayUsuarios = array();

                    while (!feof($arquivoAberto)) {
                        $linha = fgets($arquivoAberto, $tamanhoArquivo);
                        array_push($arrayUsuarios, $linha);
                    }


                    for ($i = 0; $i < count($arrayUsuarios); $i++) {
                        $informacoes = explode(';', $arrayUsuarios[$i]); ?>
                        <tr>
                            <td><?php echo ($informacoes[1]); ?></td>
                            <td><?php echo ($informacoes[3]); ?></td>
                            <td><?php echo ($informacoes[0]); ?></td>
                            <td>
                                <a class="waves-effect waves-light btn-small orange"><i class="material-icons right">edit</i></a>
                                <a class="waves-effect waves-light btn-small red"><i class="material-icons right">remove_circle_outline</i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>

            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                language: {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    },
                    "select": {
                        "rows": {
                            "_": "Selecionado %d linhas",
                            "0": "Nenhuma linha selecionada",
                            "1": "Selecionado 1 linha"
                        }
                    },
                    "buttons": {
                        "copy": "Copiar para a área de transferência",
                        "copyTitle": "Cópia bem sucedida",
                        "copySuccess": {
                            "1": "Uma linha copiada com sucesso",
                            "_": "%d linhas copiadas com sucesso"
                        }
                    }
                },
                responsive: true,
                "autoWidth": false
            });
        });
    </script>
    <style>

    </style>
<?php
} else {
    header("Location: login.php");
}
include "../includes/end.php";
?>