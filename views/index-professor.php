<?php
session_start();
include "../includes/start.php";

if ($_SESSION['logado'] && $_SESSION['tipoUsuario'] == "professor") {
    include "../includes/navbarProfessor.php";
?>
    <link rel="stylesheet" href="../css/index-usuarios.css">

    <div class="container grey lighten-5" id="info">
        <h4><strong class="deep-orange-text">Bem-vindo, </strong><?php echo ($_SESSION['nome']) ?></h4>
        <h6>Confira aqui suas atividades:</h6><br>
        <a class="waves-effect waves-light btn red" href="add-atividade.php"><i class="material-icons right">add</i>Nova atividade</a>


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
                        <a href="../model/content/<?php echo ($informacoes[3]) ?>" download class="btn waves-effect waves-light">
                            <i class="material-icons right">file_download</i>Baixar
                        </a> <br> <br>
                        <p class="teal-text">Visualizado por: </p>
                        <ul style="margin-left: 1rem;">
                            <?php
                            $arquivoDownloads = "../model/downloads_atividades.txt";
                            $tamanhoArquivoDownloads = filesize($arquivoDownloads);
                            $arquivoAbertoDownloads = fopen($arquivoDownloads, "r");

                            $arrayDownloads = array();

                            while (!feof($arquivoAbertoDownloads)) {
                                $linhaDonwloads = fgets($arquivoAbertoDownloads, $tamanhoArquivoDownloads);
                                array_push($arrayDownloads, $linhaDonwloads);
                            }

                            for ($j = 0; $j < count($arrayDownloads); $j++) {
                                $aux = explode(';', $arrayDownloads[$j]);
                                if ($aux[0] == $informacoes[0]) {
                                    echo ("<li>- " . $aux[1] . "</li>");
                                }
                            }
                            fclose($arquivoAbertoDownloads);
                            ?>
                        </ul>
                    </div>
                <?php
            }
            fclose($arquivoAberto);

                ?>
        </ul>
    </div>

    <script src="../js/collapsible-m.js"></script>

<?php
} else {
    header("Location: login.php");
}
include "../includes/end.php";
?>