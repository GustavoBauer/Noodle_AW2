<?php
session_start();

$tipoUsuario = $_POST['tipoUsuario'];
$matricula = strtoupper($_POST['matricula']);
$nome = $_POST['nome'];

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
    //REMOVER PRIMEIRO https://stackoverflow.com/questions/5712878/how-to-delete-a-line-from-the-file-with-php
    $contents = file_get_contents($arquivoUsuarios);
    $contents = str_replace($linhaDoArquivo, "", $contents);
    file_put_contents($arquivoUsuarios, $contents);
    fflush($arquivoAberto);
    fclose($arquivoAberto);

    //ADD
    $arquivoAberto = fopen($arquivoUsuarios, "a");
    $conteudo = "\n$tipoUsuario;$matricula;$usuarioDoArquivo[2];$nome";
    fwrite($arquivoAberto, $conteudo);
    fflush($arquivoAberto);
    header('Location: ../views/usuarios-administrador.php');
} else {
    header('Location: ../views/editar-usuario.php?matricula='.$matricula);
}

fclose($arquivoAberto);
