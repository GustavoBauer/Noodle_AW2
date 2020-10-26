<?php
session_start();
include "../includes/start.php";

if ($_SESSION['logado'] && $_SESSION['tipoUsuario'] == "professor") {
    include "../includes/navbarProfessor.php";
?>

    <div class="container grey lighten-5" style="padding: 2rem;">
        <a href="index-professor.php" class="btn waves-effect waves-light  deep-orange lighten-1 left"><i class="material-icons left">arrow_back</i>Voltar</a><br>
        <h4 class="center">Adicionar Atividade</h4>
        <form action="../actions/add_atividade_action.php" method="post" class="container" style="padding: 2rem" enctype="multipart/form-data">
            <div class="input-field">
                <input id="titulo" type="text" class="validate" required minlength="4" name="titulo">
                <label for="titulo">Título da atividade</label>
            </div>
            <div class="input-field">
                <textarea id="descricao" class="materialize-textarea validate" required minlength="14" name="descricao"></textarea>
                <label for="descricao">Descrição</label>
            </div>
            <div class="row" style="max-width:100%">
                <div class="file-field input-field">
                    <div class="btn blue">
                        <span><i class="material-icons left">attach_file</i>ANEXO</span>
                        <input type="file" name="arquivo"/>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Arquivo da atividade" />
                    </div>

                </div>
            </div>
            <button class="btn waves-effect waves-light right" type="submit" name="submit">Avançar
                <i class="material-icons right">send</i>
            </button>
        </form>

    </div>

    <script src="../js/select-m.js"></script>
<?php
} else {
    header("Location: login.php");
}
include "../includes/end.php";
?>