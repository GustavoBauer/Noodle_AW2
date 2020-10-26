<?php
session_start();
include "../includes/start.php";

if ($_SESSION['logado'] && $_SESSION['tipoUsuario'] == "administrador") {
    include "../includes/navbarAdministrador.php";
?>
    <link rel="stylesheet" href="../css/tabelas.css">
    <div class="container grey lighten-5" style="padding: 2rem;">
        <h4>Atividades</h4>
        <div class="container-tabela">
            <table id="example" class="display">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $arquivoAtividades = "../model/atividades.txt";
                    $tamanhoArquivo = filesize($arquivoAtividades);
                    $arquivoAberto = fopen($arquivoAtividades, "r");

                    $arrayAtividades = array();

                    while (!feof($arquivoAberto)) {
                        $linha = fgets($arquivoAberto, $tamanhoArquivo);
                        array_push($arrayAtividades, $linha);
                    }


                    for ($i = 0; $i < count($arrayAtividades); $i++) {
                        $informacoes = explode(';', $arrayAtividades[$i]); ?>
                        <tr>
                            <td><?php echo ($informacoes[0]); ?></td>
                            <td><?php echo ($informacoes[1]); ?></td>
                            <td><?php echo ($informacoes[2]); ?></td>
                            <td class="center">
                                <a class="waves-effect waves-light btn-floating blue modal-trigger" title="Baixar material" href="../model/content/<?php echo ($informacoes[3]) ?>" download><i class="material-icons center">file_download</i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>



    <script src="../js/datatables-init.js"></script>
    <script src="../js/select-m.js"></script>

<?php
} else {
    header("Location: login.php");
}
include "../includes/end.php";
?>