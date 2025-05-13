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
    
    <div class="containertable">
        <p>Despesas</p>
        <table id="despesas">
            <tr>
                <th>Tipo</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Valor</th>
            </tr>
            <tr>
                <td class="user">a</td>
                <td class="pass">a</td>
                <td class="pass">a</td>
                <td class="pass">a</td>
            </tr>
        </table>
    </div>

    <div class="containertable">
        <p>Contas</p>
        <table id="contas">
            <tr>
                <th>Tipo</th>
                <th>Prazo</th>
                <th>Valor</th>
            </tr>
            <tr>
                <td class="user">a</td>
                <td class="pass">a</td>
                <td class="pass">a</td>
            </tr>
        </table>
    </div>
</body>
</html>