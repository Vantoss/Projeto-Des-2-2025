<!DOCTYPE html>
<html lang="en">
<head>
    <?php session_start(); #echo $_SESSION["user"]; echo $_SESSION["id"]; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Página Principal</title>
    <script src="../javascript/main.js" defer></script>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body onload="tabelas()">
    <header>
        <h1> Bem vindo, <?php echo $_SESSION["user"]; ?>! </h1>

        <button type="submit" class="sair" onclick="volta()">Sair</button>
    </header>
    
    <div id="separador1">
        <div class="containertable" id="tabeladesp">
            <p>Despesas</p>
            <table id="despesas">
            </table>
        </div>

        <div class="containertable" id="tabelaconta">
            <p>Contas</p>
            <table id="contas">
            </table>
        </div>
    </div>

    <div id="separador2">
        <div class="container" id="caddesp"> 
            <p>Cadastro de Despesa</p>
            <input type="text" name="tipod" id="tipodesp" placeholder="Tipo de despesa" required> <!--Mudar para selecionar uma opção -->
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
    </div>

    <footer id="footer"></footer>
</body>
</html>