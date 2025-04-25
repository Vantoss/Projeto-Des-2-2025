<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <script src="../javascript/main.js" defer></script>
    <link rel="stylesheet" href="../css/main.css">
</head>
<?php 
    require_once '../functions.php';
    if (isset($_POST['get'])){
        //a ver
    }
?>
<body>
    <h1> Bem vindo, usuário! </h1>

    <button type="submit" class="sair" onclick="volta()">Sair</button>
    
    <form action="" method="post">
        <button type="submit" class="get" id="get">Encher tabela</button>
    </form>
    <table>
        <tr>
            <th>Usuário</th>
            <th>Senha</th>
        </tr>
        <tr>
            <td>a</td>
            <td>a</td>
        </tr>
    </table>
</body>
</html>