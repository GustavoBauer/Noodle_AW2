<?php
session_start();


$tipoUsuario = $_POST['tipoUsuario'];
$matricula = $_POST['matricula'];
$nome = $_POST['nome'];
$senha = "aabbccdd";

$arquivoUsuarios = "../model/usuarios.txt";
$tamanhoArquivo = filesize($arquivoUsuarios);
$arquivoAberto = fopen($arquivoUsuarios, "a");

$conteudo = "\n$tipoUsuario;$matricula;$senha;$nome";
fwrite($arquivoAberto,$conteudo);

fclose($arquivoAberto);

header('Location: ../views/usuarios-administrador.php');

?>

