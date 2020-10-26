<?php
session_start();
include "../includes/start.php";

if ($_SESSION['logado'] && $_SESSION['tipoUsuario']=="aluno"){
    include "../includes/navbarAluno.php";
?>


<?php
}else{
    header("Location: login.php");
}
include "../includes/end.php"; 
?>