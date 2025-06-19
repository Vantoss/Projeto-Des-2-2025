<?php
function active($pag){
    $url = $_SERVER['PHP_SELF'];
    if($pag == $url){
        echo 'active';
    }
}
?>
<header>
    <h1 class="text-body"> Bem vindo, <?php echo $_SESSION["user"]; ?>! </h1>

    <button id="sair" type="submit" class="btn btn-success" onclick="volta()">Sair</button>
    <ul>
        <li><a class="btn btn-success <?php active('/Projeto-Des-2-2025/src/pags/main.php') ?>" href="main.php">Movimentações</a></li>
        <li><a class="btn btn-success <?php active('/Projeto-Des-2-2025/src/pags/fixos.php') ?>" href="fixos.php">Lançamentos Fixos</a></li>
        <li><a class="btn btn-success <?php active('/Projeto-Des-2-2025/src/pags/relatorio.php') ?>" href="relatorio.php">Relatório</a></li>
    </ul>
</header>