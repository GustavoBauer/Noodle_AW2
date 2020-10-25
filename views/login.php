<?php
session_start();
include "../includes/start.php";
if (!isset($_SESSION['mensagemErroLogin'])) {
    $_SESSION['mensagemErroLogin'] = "";
}
if ($_SESSION['logado'] == false) {
?>
    <link rel="stylesheet" href="../css/login.css">

    <nav class="orange">
        <div class="nav-wrapper">
            <a href="login.php" class="brand-logo center">Noodle <img src="../img/ramen.svg" style="height: 30px" alt=""></a>
        </div>
    </nav>

    <div class="container z-depth-2" id="container-login">

        <h4 class="black-text">Login <i class="material-icons">login</i></h4>

        <div class="row valign-wrapper">

            <div class="col m3 hide-on-small-only">
                <img class="responsive-image" src="../img/noodles.svg" alt="noodle">
            </div>

            <div class="col m9 s12">

                <form action="../actions/login_action.php" method="post">

                    <div class="input-field">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="matricula" type="text" class="validate" required maxlength="9" name="matricula">
                        <label for="matricula">Matrícula</label>
                        <span class="helper-text" data-error="Matrícula inválida" data-success="Matrícula válida">Não esqueça do prefixo SP</span>
                    </div>

                    <div class="input-field">

                        <i class="material-icons prefix">lock</i>
                        <input id="senha" type="password" class="validate" required maxlength="20" minlength="7" name="senha">
                        <label for="senha">Senha</label>
                        <span class="helper-text" data-error="Senha inválida" data-success="Senha válida"></span>
                    </div>

                    <button class="btn waves-effect waves-light right" type="submit" name="submit">Avançar
                        <i class="material-icons right">send</i>
                    </button>

                </form>

            </div>

        </div>
        <div class="center">
            <strong class="red-text"><?php echo ($_SESSION['mensagemErroLogin']); ?></strong>
        </div>


    </div>

<?php
} else {
    header("Location: ../views/index-" . $_SESSION['tipoUsuario'] . ".php");
}

include "../includes/end.php"; ?>