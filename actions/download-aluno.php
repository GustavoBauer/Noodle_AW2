<?php
session_start();
if (isset($_POST['file'])) {

    $arquivoDownloads = "../model/downloads_atividades.txt";
    $tamanhoArquivoDownloads = filesize($arquivoDownloads);
    $arquivoAbertoDownloads = fopen($arquivoDownloads, "r+");

    $arrayDownloads = array();

    while (!feof($arquivoAbertoDownloads)) {
        $linhaDownload = fgets($arquivoAbertoDownloads, $tamanhoArquivoDownloads);
        array_push($arrayDownloads, $linhaDownload);
    }

    $downloadRepetido = false;
    for ($j = 0; $j < count($arrayDownloads); $j++) {
        $infoDownload = explode(';', $arrayDownloads[$j]);
        if ($infoDownload[0] == $_POST['id'] && $infoDownload[1] == $_SESSION["matricula"]) {
            $downloadRepetido = true;
            break;
        }
    }

    if (!$downloadRepetido) {
        $conteudo = "\n" . $_POST['id']. ";" . $_SESSION["matricula"] . ";" . $_SESSION["nome"];
        fwrite($arquivoAbertoDownloads, $conteudo);
    }

    fclose($arquivoAbertoDownloads);

    header('Location: ../model/content/' . $_POST['file']);
}

?>