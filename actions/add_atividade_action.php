<?php

$id = uniqid();
$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];

$arquivo = isset($_FILES["arquivo"]) ? $_FILES["arquivo"] : FALSE;
$diretorio = '../model/content/';

if (move_uploaded_file($arquivo["tmp_name"], $diretorio . $arquivo["name"])) {

    $arquivoAtividades = "../model/atividades.txt";
    $tamanhoArquivo = filesize($arquivoAtividades);
    $arquivoAberto = fopen($arquivoAtividades, "a");

    $conteudo = "\n$id;$titulo;$descricao;".$arquivo['name'];
    fwrite($arquivoAberto, $conteudo);
    fflush($arquivoAberto);
    header('Location: ../views/index-professor.php');

} else {
    header('Location: ../views/add-atividade.php');
}


