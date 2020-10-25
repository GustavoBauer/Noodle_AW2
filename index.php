<?php
session_start();
// session_unset();
// session_destroy();
if($_SESSION['logado']){
    header("Location: views/" . $_SESSION['tipoUsuario'] . "/index.php");
}
else{
    $_SESSION['logado'] = false;
    header('Location: views/login.php');
}

?>