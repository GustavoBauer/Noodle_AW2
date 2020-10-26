<?php
session_start();

$matricula = strtoupper($_POST['matricula']);

$arquivoUsuarios = "../model/usuarios.txt";
$tamanhoArquivo = filesize($arquivoUsuarios);
$arquivoAberto = fopen($arquivoUsuarios, "r+");

$arrayUsuarios = array();

while (!feof($arquivoAberto)) {
    $linha = fgets($arquivoAberto, $tamanhoArquivo);
    array_push($arrayUsuarios, $linha);
}

$usuarioRepetido = false;
$linhaDoArquivo = '';
for ($i = 0; $i < count($arrayUsuarios); $i++) {
    $linhaDoArquivo = $arrayUsuarios[$i];
    $usuarioDoArquivo = explode(';', $arrayUsuarios[$i]);
    if (in_array($matricula, $usuarioDoArquivo)) {
        $usuarioRepetido = true;
        break;
    }
}

if ($usuarioRepetido) {
    $contents = file_get_contents($arquivoUsuarios);
    $contents = str_replace($linhaDoArquivo, "", $contents);
    file_put_contents($arquivoUsuarios, $contents);
}

header('Location: ../views/usuarios-administrador.php');


fclose($arquivoAberto);
