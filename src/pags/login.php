<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="../javascript/login.js" defer></script>
    <link rel="stylesheet" href="../css/login.css">
</head>

<?php 
    if (isset($_POST['enviar'])){
        header("location: main.php");
    }
?>

<body>
    <h1>Faça seu login</h1>

    <form action="" method="post">
        <input type="text" name="nome" id="nome" placeholder="Nome de usuário" required>
        <input type="password" name="senha" id="senha" placeholder="Senha" required>
        <input type="submit" name="enviar" id="enviar" value="Enviar"></input>
    </form>
</body>
</html>