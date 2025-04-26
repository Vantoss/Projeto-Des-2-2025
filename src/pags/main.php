<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Página Principal</title>
    <script src="../functions.js" defer></script>
    <script src="../javascript/main.js" defer></script>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <h1> Bem vindo, usuário! </h1>

    <button type="submit" class="sair" onclick="volta()">Sair</button>
    
    <button type="submit" class="get" id="get" onclick="getBanco()">Encher tabela</button>
    <table>
        <tr>
            <th>Usuário</th>
            <th>Senha</th>
        </tr>
        <tr>
            <td id="user">a</td>
            <td id="pass">a</td>
        </tr>
    </table>
</body>
</html>