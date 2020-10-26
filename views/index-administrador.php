<?php
session_start();
include "../includes/start.php";

if ($_SESSION['logado'] && $_SESSION['tipoUsuario'] == "administrador") {
    include "../includes/navbarAdministrador.php";
?>
    <link rel="stylesheet" href="../css/principal-administrador.css">

    <div class="container grey lighten-5" id="info">
        <h4><strong class="deep-orange-text">Bem-vindo!</strong></h4>
        <h6>Confira as novidades:</h6><br>
        <div class="collection">
            <a href="usuarios-administrador.php" class="collection-item"><span class="new badge" data-badge-caption="novos">100</span>Usuários</a>
            <a href="atividades-administrador.php" class="collection-item"><span class="new badge" data-badge-caption="novos">100</span>Atividades</a>
        </div>

        <div class="row">
            <div class="col s12 m6">
                <div class="card hoverable">
                    <div class="card-image">
                        <img src="../img/card-usuarios.jpg">
                        <a class="btn-floating halfway-fab waves-effect waves-light red" href="usuarios-administrador.php"><i class="material-icons">edit</i></a>
                    </div>
                    <div class="card-content">
                        <span class="card-title">Usuários</span>
                        <p>Edite, atualize, remova e adicione usuários.</p>
                        <br>
                        <div class="center"><a class="waves-effect waves-light btn" href="usuarios-administrador.php"><i class="material-icons right">send</i>ABRIR</a></div>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card hoverable">
                    <div class="card-image">
                        <img src="../img/card-atividades.png">
                        <a class="btn-floating halfway-fab waves-effect waves-light red" href="atividades-administrador.php"><i class="material-icons">edit</i></a>
                    </div>
                    <div class="card-content">
                        <span class="card-title">Atividades</span>
                        <p>Edite, atualize e remova atividades.</p>
                        <br>
                        <div class="center"><a class="waves-effect waves-light btn" href="atividades-administrador.php"><i class="material-icons right">send</i>ABRIR</a></div>
                    </div>
                </div>
            </div>
        </div>

    </div>


<?php
} else {
    header("Location: login.php");
}
include "../includes/end.php";
?>