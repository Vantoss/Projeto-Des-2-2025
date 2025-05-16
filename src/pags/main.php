<!DOCTYPE html>
<html lang="en">
<head>
    <?php session_start(); //echo $_SESSION["user"]; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Página Principal</title>
    <script src="../functions.js" defer></script>
    <script src="../javascript/main.js" defer></script>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <header>
        <h1> Bem vindo, <?php echo $_SESSION["user"]; ?>! </h1>

        <button type="submit" class="sair" onclick="volta()">Sair</button>
    </header>
    
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
                <td class="tipodesp"></td>
                <td class="data"></td>
                <td class="hora"></td>
                <td class="valordesp"></td>
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
                <td class="tipoconta"></td>
                <td class="prazo"></td>
                <td class="valorconta"></td>
            </tr>
        </table>
    </div>

    <div class="container" id="caddesp">
        <p>Cadastro de Despesa</p>
        <input type="text" name="tipod" id="tipodesp" placeholder="Tipo de despesa" required>
        <input type="date" name="datad" id="data" placeholder="Data" required>
        <input type="time" name="horad" id="hora" placeholder="Hora">
        <input type="number" name="valord" id="valordesp" placeholder="Valor" required>
        <button type="submit" id="enviar" onclick="cadDesp()">Enviar</input>
    </div>

    <div class="container" id="cadconta">
        <p>Cadastro de conta</p>
        <input type="text" name="tipoc" id="tipoconta" placeholder="Tipo de conta" required>
        <input type="date" name="prazo" id="prazo" placeholder="Prazo" required>
        <input type="number" name="valorc" id="valorconta" placeholder="Valor" required>
        <button type="submit" id="enviar" onclick="cadConta()">Enviar</input>
    </div>
</body>
</html>