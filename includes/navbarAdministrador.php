<nav class="orange">
    <div class="nav-wrapper container">
        <a href="index-administrador.php" class="brand-logo">Noodle <img src="../img/ramen.svg" style="height: 30px" alt=""></a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="usuarios-administrador.php">Usuários<span class="new badge" data-badge-caption="novos">100</span></a></li>
            <li><a href="atividades-administrador.php">Atividades<span class="new badge" data-badge-caption="novos">100</span></a></li>
            <li><a class="waves-effect waves-light btn red" href="../actions/logout.php"><i class="material-icons right">exit_to_app</i>Sair</a></li>

        </ul>
    </div>
</nav>

<ul class="sidenav" id="mobile-demo">
    <li><a href="usuarios-administrador.php">Usuários<span class="new badge" data-badge-caption="novos">100</span></a></li>
    <li><a href="atividades-administrador.php">Atividades<span class="new badge" data-badge-caption="novos">100</span></a></li>
    <li><a class="waves-effect waves-light btn red" href="../actions/logout.php">Sair</a></li>
</ul>



<script>
    $(document).ready(function() {
        $(".sidenav").sidenav();
    });
</script>