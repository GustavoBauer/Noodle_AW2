<nav class="orange">
    <div class="nav-wrapper container">
        <a href="index-aluno.php" class="brand-logo">Noodle <img src="../img/ramen.svg" style="height: 30px" alt=""></a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <!-- <li><a href="sass.html">Sass</a></li>
            <li><a href="badges.html">Components</a></li>
            <li><a href="collapsible.html">Javascript</a></li>
            <li><a href="mobile.html">Mobile</a></li> -->
            <a class="waves-effect waves-light btn red" href="../actions/logout.php"><i class="material-icons right">exit_to_app</i>Sair</a>

        </ul>
    </div>
</nav>

<ul class="sidenav" id="mobile-demo">
    <!-- <li><a href="sass.html">Sass</a></li>
    <li><a href="badges.html">Components</a></li>
    <li><a href="collapsible.html">Javascript</a></li>
    <li><a href="mobile.html">Mobile</a></li> -->
</ul>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(".sidenav").sidenav();
    });
</script>