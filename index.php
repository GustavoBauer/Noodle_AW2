<?php
session_start();
// session_unset();
// session_destroy();
if($_SESSION['logado']){
    header("Location: views/index-" . $_SESSION['tipoUsuario'] . ".php");
}
else{
    $_SESSION['logado'] = false;
    header('Location: views/login.php');
}

?>