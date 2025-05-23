<!DOCTYPE html>
<html lang="en">
<head>
    <?php session_start(); if(!isset($_SESSION["user"])){die("Você não tem acesso à essa página");};#echo $_SESSION["user"]; echo $_SESSION["id"]; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Página Principal</title>
    <script src="../javascript/main.js" defer></script>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
</head>
<body onload="tabelas()">
    <header>
        <h1 class="text-body"> Bem vindo, <?php echo $_SESSION["user"]; ?>! </h1>

        <button id="sair" type="submit" class="btn btn-success" onclick="volta()">Sair</button>
    </header>
    
    <div class="container"> <!--Consertar o height dos separadores -->
        <div id="separador1">
            <div class="containertable rounded" id="tabeladesp"> <!--Adicionar botões de cadastrar, atualizar e deletar nas tabelas -->
                <p>Despesas</p>
                <table id="despesas" class="table table-bordered table-striped border-black">
                </table>
            </div>

            <div class="containertable rounded" id="tabelaconta">
                <p>Contas</p>
                <table id="contas" class="table table-bordered table-striped border-black">
                </table>
            </div>
        </div>
    </div>

   <div id="separador2">
        <div class="containerc" id="caddesp"> 
            <p>Cadastro de Despesa</p>
            <input type="text" name="tipod" id="tipodesp" placeholder="Tipo de despesa" required>
            <input type="date" name="datad" id="data" placeholder="Data" required>
            <input type="time" name="horad" id="hora" placeholder="Hora">
            <input type="number" name="valord" id="valordesp" placeholder="Valor" required>
            <button type="submit" id="enviar" onclick="cadDesp()">Enviar</input>
        </div>

        <div class="containerc" id="cadconta">
            <p>Cadastro de conta</p>
            <input type="text" name="tipoc" id="tipoconta" placeholder="Tipo de conta" required>
            <input type="date" name="prazo" id="prazo" placeholder="Prazo" required>
            <input type="number" name="valorc" id="valorconta" placeholder="Valor" required>
            <button type="submit" id="enviar" onclick="cadConta()">Enviar</input>
        </div>
    </div>

    <footer id="footer"></footer> <!--Adicionar a soma das despesas e contas -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js">
</body>
</html>