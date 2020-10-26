<?php
session_start();
include "../includes/start.php";

if ($_SESSION['logado'] && $_SESSION['tipoUsuario'] == "administrador") {
    include "../includes/navbarAdministrador.php";
?>
    <link rel="stylesheet" href="../css/tabelas.css">
    <div class="container grey lighten-5" style="padding: 2rem;">
        <h4>Usuários <a class="waves-effect waves-light btn" href="add-usuario.php"><i class="material-icons right">add</i>Adicionar</a></h4>
        <div class="container-tabela">
            <table id="example" class="display">
                <thead>
                    <tr>
                        <th>Matrícula</th>
                        <th>Nome</th>
                        <th>Tipo de Usuário</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $arquivoUsuarios = "../model/usuarios.txt";
                    $tamanhoArquivo = filesize($arquivoUsuarios);
                    $arquivoAberto = fopen($arquivoUsuarios, "r");

                    $arrayUsuarios = array();

                    while (!feof($arquivoAberto)) {
                        $linha = fgets($arquivoAberto, $tamanhoArquivo);
                        array_push($arrayUsuarios, $linha);
                    }


                    for ($i = 0; $i < count($arrayUsuarios); $i++) {
                        $informacoes = explode(';', $arrayUsuarios[$i]); ?>
                        <tr>
                            <td><?php echo ($informacoes[1]); ?></td>
                            <td><?php echo ($informacoes[3]); ?></td>
                            <td><?php echo ($informacoes[0]); ?></td>
                            <td class="center">
                                <a class="waves-effect waves-light btn-floating orange" href="editar-usuario.php?matricula=<?php echo $informacoes[1] ?>" title="Editar"><i class="material-icons center">edit</i></a>
                                <a class="waves-effect waves-light btn-floating red modal-trigger" title="Remover" href="#modal<?php echo $informacoes[1] ?>"><i class="material-icons center">delete</i></a>
                            </td>
                            <!-- Modal delete -->
                            <div id="modal<?php echo $informacoes[1] ?>" class="modal">
                                <div class="modal-content">
                                    <h4>Opa!</h4>
                                    <p>Tem certeza que deseja excluir esse item?</p>
                                </div>
                                <div class="modal-footer">
                                    <form action="../actions/excluir_usuario_action.php" method="POST">
                                        <input type="hidden" name="matricula" value="<?php echo $informacoes[1] ?>">
                                        <button type="submit" name="btn-deletar" class="btn red">Quero remover</button>
                                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                    </form>
                                </div>
                            </div>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>



    <script src="../js/datatables-init.js"></script>
    <script src="../js/select-m.js"></script>
    <script src="../js/modal-m.js"></script>

<?php
} else {
    header("Location: login.php");
}
include "../includes/end.php";
?>