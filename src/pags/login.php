<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <script src="../functions.js" defer></script>
    <script src="../javascript/login.js" defer></script>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <h1>Faça seu login</h1>


        <input type="text" name="nome" id="nome" placeholder="Nome de usuário" required>
        <input type="password" name="senha" id="senha" placeholder="Senha" required>
        <button type="submit" id="enviar" onclick="login()">Enviar</input>

</body>
</html>