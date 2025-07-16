<?php require_once "../assets/head.php" ?>
<body onload="tabelaFixo()">
    <?php require_once "../assets/header.php"?>
    

    <div class="container mt-2">
        <div class="row">
            <div class="col" id="resumofixos">
                <h3>Seus lançamentos fixos</h3>
                <div class="desc">
                    <p>Aqui você pode cadastrar seus lançamentos fixos, ou seja, despesas que acontecem todos os meses (ex.: contas de luz, parcelas).<br>
                    Estes lançamentos serão automaticamente cadastrados como despesas quando a data de vencimento chegar, e poderão ser vistos na tabela da página "Movimentações"<br>
                    Você pode forçar o cadastro ao apertar tanto o botão "Lançar" quanto o botão "Lançar todos". 
                    O primeiro cadastrará apenas a despesa selecionada, enquanto o segundo cadastrará todas que não foram pagas ainda.
                    </p>  
                </div>
                <div class="total">
                    <p id="totalf">Total de lançamentos: <span id="numf"></span></p>
                </div>
            </div>
        </div>
        <div class="row" id="">
            <div class="containertable col rounded" id="tabelafixos">  
                <div id="btns">
                    <button type='submit' id='cadf' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#cadfmodal'>Registrar lançamento fixo</button>
                    <button type='submit' id='lancf' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#lancmodal' onclick="getNaoPagos()">Lançar todos</button>
                </div>
                <table id="fixos" class="table table-bordered">
                </table>
            </div>
        </div>
    </div>

<!---------------------------------- MODALS ---------------------------------->   

    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="cadfmodal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Cadastrar Lançamento</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="document.getElementById('formfixo').reset()"></button>
                </div>

                <div class="modal-body">
                    <form id="formfixo">
                        <label for="nome">Nome:</label><br>
                        <input type="text" name="tipoc" id="nome" placeholder="(Luz, água, parcela...)" required><br>
                        <label for="categoria">Categoria:</label><br>
                        <select name="categoriaf" id="categoria">
                            <option value="Moradia">Moradia</option>
                            <option value="Alimentação">Alimentação</option>
                            <option value="Lazer">Lazer</option>
                            <option value="Saúde">Saúde</option>
                            <option value="Educação">Educação</option>
                            <option value="Transporte">Transporte</option>
                            <option value="Trabalho">Trabalho</option>
                        </select><br>
                        <label for="validade">Vencimento:</label><br>
                        <input type="date" name="validade" id="validade" required><br>
                        <label for="valorconta">Valor:</label><br>
                        <input type="number" name="valorc" id="valorconta" placeholder="Valor" required>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="enviar" onclick="cadFixo()" data-bs-dismiss="modal">Cadastrar</button>
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('formfixo').reset()" data-bs-dismiss="modal">Cancelar</button>
                </div>

            </div>
        </div>
    </div>
        <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="edfmodal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Editar Lançamento</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="document.getElementById('formfixoput').reset()"></button>
                </div>

                <div class="modal-body">
                    <form id="formfixoput">
                        <input hidden type="text" name="id" id="idputf" required>
                        <label for="nomeputf">Nome:</label><br>
                        <input type="text" name="tipoc" id="nomeputf" placeholder="(Luz, água, parcela...)" required><br>
                        <label for="catputf">Categoria:</label><br>
                        <select name="categoriaf" id="catputf">
                            <option value="Moradia">Moradia</option>
                            <option value="Alimentação">Alimentação</option>
                            <option value="Lazer">Lazer</option>
                            <option value="Saúde">Saúde</option>
                            <option value="Educação">Educação</option>
                            <option value="Transporte">Transporte</option>
                            <option value="Trabalho">Trabalho</option>
                        </select><br>
                        <label for="validadeput">Vencimento:</label><br>
                        <input type="date" name="validade" id="validadeput" placeholder="Prazo" required><br>
                        <label for="valorputf">Valor:</label><br>
                        <input type="number" name="valorc" id="valorputf" placeholder="Valor" required>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="enviar" onclick="putFixo()" data-bs-dismiss="modal">Salvar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="document.getElementById('formfixoput').reset()">Cancelar</button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="apfmodal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Apagar Lançamento</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <p>Você tem certeza que quer apagar este lançamento?</p>
                    <form id="formfixodel">
                        <input hidden type="text" name="id" id="iddelf" required>                       
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="enviar" onclick="delFixo()" data-bs-dismiss="modal">Apagar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="bmodal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Lançar despesa</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <p>Você tem certeza que quer lançar esta despesa?</p>
                    <form id="formfixob">
                        <input hidden type="text" name="id" id="idb" required>
                        <input hidden type="text" name="nome" id="nomeb" required>                       
                        <input hidden type="text" name="cat" id="catb" required>        
                        <input hidden type="date" name="data" id="datab" required>                       
                        <input hidden type="number" name="valor" id="valorb" required>                   
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="enviar" onclick="lancFixo()" data-bs-dismiss="modal">Lançar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="document.getElementById('formfixob').reset()">Cancelar</button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="lancmodal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Lançar todas as despesas</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <p>Os seguintes lançamentos serão convertidos em despesas.</p>
                    <p>Os registros desta página serão atualizados como pagos.</p>
                    <p>Edite os valores se necessário:</p>
                    <table id="alltable" class="table table-borderless"></table>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="enviarall" onclick="lancNPagos()" data-bs-dismiss="modal">Lançar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>

            </div>
        </div>
    </div>
<!----------------------------------------------------------------------------->  

    <footer id="footer"></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>