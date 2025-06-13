<!--A FAZER -->
<!--Testar as requisições-->
<!--Fazer a pesquisa de movimentações -->
<!--Fazer as páginas de custos fixos e relatório -->
<!--Descobrir como integrar gráficos ao projeto (provavelmente através de bibliotecas ou Python) -->
<?php require_once "../assets/head.php" ?>
<body onload="tabelas()">
    <?php require_once "../assets/header.php"?>
    
    <div class="container mt-2">
        <div class="row" id="">
            <div class="containertable col rounded" id="tabeladesp">
                <div id="cadbtns">
                    <button type='submit' id='cadm' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#cadmmodal'>Registrar gasto/receita</button>
                </div>
                <table id="movimentacoes" class="table table-bordered table-striped">
                </table>
            </div>


        </div>
    </div>

<!---------------------------------- MODALS ---------------------------------->   

    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="cadmmodal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Registrar movimentação</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form id="formmovi">
                    <label for="nome">Nome:</label><br>
                    <input type="text" name="nomem" id="nome" placeholder="(Supermercado, gasolina...)" required><br>
                    <label for="categoria">Categoria:</label><br>
                    <input type="text" name="categoriam" id="categoria" placeholder="(Lazer, alimentação...)" required><br>
                    <label for="data">Data:</label><br>
                    <input type="date" name="datam" id="data" placeholder="Data" required><br>
                    <label for="valor">Valor:</label><br>
                    <input type="number" name="valorm" id="valor" placeholder="" required><br>
                    <label>Despesa ou receita?</label><br>
                    <select name="tipom" id="tipo">
                        <option value="Despesa">Despesa</option>
                        <option value="Receita">Receita</option>
                    </select>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="enviar" onclick="cadMovi()" data-bs-dismiss="modal">Cadastrar</button>
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