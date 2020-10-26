<?php
session_start();

$tipoUsuario = $_POST['tipoUsuario'];
$matricula = strtoupper($_POST['matricula']);
$nome = $_POST['nome'];
$senha = "aabbccdd";

$arquivoUsuarios = "../model/usuarios.txt";
$tamanhoArquivo = filesize($arquivoUsuarios);
$arquivoAberto = fopen($arquivoUsuarios, "r+");

$arrayUsuarios = array();

while (!feof($arquivoAberto)) {
    $linha = fgets($arquivoAberto, $tamanhoArquivo);
    array_push($arrayUsuarios, $linha);
}

$usuarioRepetido = false;
for ($i = 0; $i < count($arrayUsuarios); $i++) {
    $usuarioDoArquivo = explode(';', $arrayUsuarios[$i]);
    if (in_array($matricula, $usuarioDoArquivo)) {
        $usuarioRepetido = true;
        break;
    }
}

if(!$usuarioRepetido){
    $conteudo = "\n$tipoUsuario;$matricula;$senha;$nome";
    fwrite($arquivoAberto, $conteudo);
    header('Location: ../views/usuarios-administrador.php');
}else{
    header('Location: ../views/add-usuario.php');
}

fclose($arquivoAberto);

    
