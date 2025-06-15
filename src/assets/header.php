<header>
    <h1 class="text-body"> Bem vindo, <?php echo $_SESSION["user"]; ?>! </h1>

    <button id="sair" type="submit" class="btn btn-success" onclick="volta()">Sair</button>
    <ul>
        <li><a class="btn btn-success" href="main.php">Página de movimentações</a></li>
        <li><a class="btn btn-success" href="fixos.php">Página de custos fixos</a></li>
        <li><a class="btn btn-success" href="relatorio.php">Página de relatório</a></li>
    </ul>
</header>