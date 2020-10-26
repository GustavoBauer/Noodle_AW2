<?php  //registra download
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
    $aux = explode(';', $arrayDownloads[$j]);
    if ($aux[0] == $informacoes[0] && $aux[1] == $_SESSION['matricula']) {
        $downloadRepetido = true;
        break;
    }
}

if (!$downloadRepetido) {
    $conteudo = "\n$informacoes[0];" . $_SESSION['matricula'];
    fwrite($arquivoAbertoDownloads, $conteudo);
}
fclose($arquivoAbertoDownloads);
