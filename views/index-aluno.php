<?php
session_start();
include "../includes/start.php";

if ($_SESSION['logado'] && $_SESSION['tipoUsuario'] == "aluno") {
    include "../includes/navbarAluno.php";
?>
    <link rel="stylesheet" href="../css/index-usuarios.css">

    <div class="container grey lighten-5" id="info">
        <h4><strong class="deep-orange-text">Bem-vindo, </strong><?php echo ($_SESSION['nome']) ?></h4>
        <h6>Confira aqui suas atividades:</h6><br>

        <ul class="collapsible">
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
                <li class="hoverable">
                    <div class="collapsible-header">
                        <i class="material-icons left">insert_drive_file</i><strong><span class="teal-text"><?php echo ($informacoes[0]); ?></span> <?php echo ($informacoes[1]); ?></strong>
                    </div>
                    <div class="collapsible-body">
                        <p><?php echo ($informacoes[2]); ?></p><br>
                        <form action="../actions/registrar_download.php" method="post" target="content">
                            <a href="../model/content/<?php echo ($informacoes[3]) ?>" download>
                                <button class="btn waves-effect waves-light" type="submit" name="<?php echo ($informacoes[0]) ?>">Baixar
                                    <i class="material-icons right">file_download</i>
                                </button>
                            </a> <br>
                        </form>
                    </div>
                <?php
            } ?>
        </ul>
    </div>


    <script src="../js/collapsible-m.js"></script>

    <iframe name="content" style="display: none;"></iframe>
<?php
    fclose($arquivoAberto);
} else {
    header("Location: login.php");
}
include "../includes/end.php";
?>