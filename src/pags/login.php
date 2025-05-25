<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <script src="../javascript/login.js" defer></script>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
</head>

<body>
    <h1 class="mt-4">Faça seu login</h1>

    <div class="container mx-auto mt-4" id="login">
        <div class="row">
            <div class="containerlogin col-5 rounded">
                <p>Login</p>
                <input type="text" name="nomelog" id="nomelog" placeholder="Nome de usuário" required>
                <input type="password" name="senhalog" id="senhalog" placeholder="Senha" required>
                <button id="enviar "type="submit" class="btn btn-success" onclick="login()">Enviar</input>
            </div>
        </div>
    </div>

    <!--<div class="containerlogin" id="cadastro">
        <p>Cadastro de usuário</p>
        <input type="text" name="nomecad" id="nomecad" placeholder="Nome de usuário" required>
        <input type="password" name="senhacad" id="senhacad" placeholder="Senha" required>
        <button type="submit" id="enviar" onclick="cadastro()">Enviar</input>
    </div>-->

<!--Existe o atualizar nome de usuário mas acho que não tem utilidade. -->

<!--Mudar para que o usuário possa selecionar o nome do usuário que ele quer apagar.-->
    <!--<div class="containerlogin" id="deletar">
        <p>Apagar usuário</p>
        <input type="text" name="iddel" id="iddel" placeholder="ID do usuário" required>
        <button type="submit" id="enviar" onclick="deletar()">Enviar</input>
    </div>-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>