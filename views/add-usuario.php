<?php
session_start();
include "../includes/start.php";

if ($_SESSION['logado'] && $_SESSION['tipoUsuario'] == "administrador") {
    include "../includes/navbarAdministrador.php";
?>
    <link rel="stylesheet" href="../css/principal-administrador.css">

    <div class="container grey lighten-5" style="padding: 2rem;">
        <h4 class="center">Adicionar Usuário</h4><br>
        <form action="../actions/add_usuario_action.php" method="post" class="container" style="padding: 2rem">
            <div class="input-field">
                <select name="tipoUsuario" required>
                    <option value="" disabled selected >Escolha uma opção</option>
                    <option value="aluno">Aluno</option>
                    <option value="professor">Professor</option>
                    <option value="administrador">Administrador</option>
                </select>
                <label>Tipo de usuário</label>
            </div>
            <div class="input-field">
                <input id="matricula" type="text" class="validate" required maxlength="9" name="matricula">
                <label for="matricula">Matrícula</label>
            </div>
            <div class="input-field">
                <input id="nome" type="text" class="validate" required maxlength="80" name="nome">
                <label for="nome">Nome</label>
            </div>
            <button class="btn waves-effect waves-light right" type="submit" name="submit">Avançar
                <i class="material-icons right">send</i>
            </button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('select').formSelect();
        });
    </script>
<?php
} else {
    header("Location: login.php");
}
include "../includes/end.php";
?>