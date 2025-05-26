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
    
    <div class="container mt-2">
        <div class="row" id="">
            <div class="containertable col-md-5 rounded" id="tabeladesp">
                <p class="h3">Despesas</p>
                <div id="cadbtns">
                    <button type='submit' id='cadd' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#caddmodal'>Adicionar Despesa</button>
                </div>
                <table id="despesas" class="table table-bordered table-striped">
                </table>
            </div>

            <div class="containertable col-md-5 offset-md-2 rounded" id="tabelaconta">
                <p class="h3">Contas</p>
                <div id="cadbtns">
                    <button type='submit' id='cadc' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#cadcmodal'>Adicionar Conta</button>
                </div>
                <table id="contas" class="table table-bordered table-striped">
                </table>
            </div>
        </div>
    </div>

<!---------------------------------- MODALS ---------------------------------->   

    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="caddmodal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Cadastrar Despesa</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <label for="tipodesp">Nome da despesa:</label><br>
                <input type="text" name="tipod" id="tipodesp" placeholder="(Supermercado, gasolina...)" required><br>
                <label for="data">Dia da despesa:</label><br>
                <input type="date" name="datad" id="data" placeholder="Data" required><br>
                <label for="hora">Hora da despesa (opcional):</label><br>
                <input type="time" name="horad" id="hora" placeholder="Hora"><br>
                <label for="valordesp">Valor:</label><br>
                <input type="number" name="valord" id="valordesp" placeholder="" required>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="enviar" onclick="cadDesp()" data-bs-dismiss="modal">Cadastrar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>

            </div>
        </div>
    </div>

    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="cadcmodal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Cadastrar Conta</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <label for="tipoconta">Nome da conta:</label><br>
                <input type="text" name="tipoc" id="tipoconta" placeholder="(Luz, água, parcela...)" required><br>
                <label for="prazo">Prazo da conta:</label><br>
                <input type="date" name="prazo" id="prazo" placeholder="Prazo" required><br>
                <label for="valorconta">Valor:</label><br>
                <input type="number" name="valorc" id="valorconta" placeholder="Valor" required>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="enviar" onclick="cadConta()" data-bs-dismiss="modal">Cadastrar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>

            </div>
        </div>
    </div>

    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="eddmodal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Editar Despesa</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                Não terminado!
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>

            </div>
        </div>
    </div>

    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="apdmodal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Apagar Despesa</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                Não terminado!
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>

            </div>
        </div>
    </div>

    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="edcmodal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Editar Conta</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                Não terminado!
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>

            </div>
        </div>
    </div>

    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="apcmodal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Apagar Conta</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                Não terminado!
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>

            </div>
        </div>
    </div>

    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="bmodal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Dar Baixa na Conta</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                Não terminado!
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>

            </div>
        </div>
    </div>

<!----------------------------------------------------------------------------->  

    <footer id="footer"></footer> <!--Adicionar a soma das despesas e contas -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>