<?php
session_start();
include "../includes/start.php";

if ($_SESSION['logado']){
    include "../includes/navbarAluno.php";
?>


<?php
}else{
    header("Location: login.php");
}
include "../includes/end.php"; 
?>