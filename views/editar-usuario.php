<?php
session_start();
include "../includes/start.php";

if ($_SESSION['logado'] && $_SESSION['tipoUsuario'] == "administrador") {
    include "../includes/navbarAdministrador.php";

    if (isset($_GET["matricula"]))
        $matricula = $_GET["matricula"];

    $arquivoUsuarios = "../model/usuarios.txt";
    $tamanhoArquivo = filesize($arquivoUsuarios);
    $arquivoAberto = fopen($arquivoUsuarios, "r+");

    $arrayUsuarios = array();

    while (!feof($arquivoAberto)) {
        $linha = fgets($arquivoAberto, $tamanhoArquivo);
        array_push($arrayUsuarios, $linha);
    }

    for ($i = 0; $i < count($arrayUsuarios); $i++) {
        $usuarioDoArquivo = explode(';', $arrayUsuarios[$i]);
        if (in_array($matricula, $usuarioDoArquivo)) {
            $tipoUsuario = $usuarioDoArquivo[0];
            $nome = $usuarioDoArquivo[3];
            break;
        }
    }
?>
    <div class="container grey lighten-5" style="padding: 2rem;">
        <a href="usuarios-administrador.php" class="btn waves-effect waves-light  deep-orange lighten-1 left"><i class="material-icons left">arrow_back</i>Voltar</a><br>
        <h4 class="center">Editar Usuário</h4>
        <form action="../actions/editar_usuario_action.php" method="post" class="container" style="padding: 2rem">
            <div class="input-field">
                <input readonly value="<?php echo ($matricula); ?>" id="matricula" type="text" required maxlength="9" name="matricula">
                <label for="matricula">Matrícula</label>
            </div>
            <div class="input-field">
                <select name="tipoUsuario" required>
                    <option value="aluno" <?php echo $tipoUsuario == 'aluno' ? 'selected' : ''; ?>>Aluno</option>
                    <option value="professor" <?php echo $tipoUsuario == 'professor' ? 'selected' : ''; ?>>Professor</option>
                    <option value="administrador" <?php echo $tipoUsuario == 'administrador' ? 'selected' : ''; ?>>Administrador</option>
                </select>
                <label>Tipo de usuário</label>
            </div>

            <div class="input-field">
                <input value="<?php echo ($nome); ?>" id="nome" type="text" class="validate" required maxlength="80" name="nome">
                <label for="nome">Nome</label>
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