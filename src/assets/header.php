<header>
    <h1 class="text-body"> Bem vindo, <?php echo $_SESSION["user"]; ?>! </h1>

    <button id="sair" type="submit" class="btn btn-success" onclick="volta()">Sair</button>
    <a href="fixos.php">Página de custos fixos</a>
    <a href="relatorio.php">Página de relatório</a>
    <a href="main.php">Página de movimentações</a>
</header>