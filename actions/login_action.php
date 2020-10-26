<?php
session_start();
$_SESSION['logado'] = false;

$matricula = $_POST['matricula'];
$senha = $_POST['senha'];

$arquivoUsuarios = "../model/usuarios.txt";
$tamanhoArquivo = filesize($arquivoUsuarios);
$arquivoAberto = fopen($arquivoUsuarios, "r");

$arrayUsuarios = array();

while (!feof($arquivoAberto)) {
    $linha = fgets($arquivoAberto, $tamanhoArquivo);
    array_push($arrayUsuarios, $linha);
}

for ($i = 0; $i < count($arrayUsuarios); $i++) {
    $usuarioDoArquivo = explode(';', $arrayUsuarios[$i]);
    print_r($usuarioDoArquivo);
    if (trim(strtoupper($usuarioDoArquivo[1])) == strtoupper($matricula) && trim($usuarioDoArquivo[2]) == $senha) {
        $_SESSION['matricula'] = $matricula;
        $_SESSION['nome'] = trim($usuarioDoArquivo[3]);
        $_SESSION['tipoUsuario'] =  trim($usuarioDoArquivo[0]);
        $_SESSION['logado'] = true;
        break;
    }
}

if ($_SESSION["logado"]) {
    header("Location: ../views/index-" . $_SESSION['tipoUsuario'] . ".php");
} else {
    $_SESSION['mensagemErroLogin'] = "Falha ao processar login";
    header('Location: ../views/login.php');
}


fclose($arquivoAberto);
