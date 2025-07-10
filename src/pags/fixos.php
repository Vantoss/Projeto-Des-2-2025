<?php require_once "../assets/head.php" ?>
<body onload="tabelaFixo()">
    <?php require_once "../assets/header.php"?>
    

    <div class="container mt-2">
        <div class="row">
            <div class="col" id="resumofixos">
                <h3>Seus lançamentos fixos</h3>
                <div class="desc">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Mauris et ante sed est laoreet dapibus. 
                        Proin erat magna, pharetra in augue eget, ultrices volutpat nunc. 
                        Mauris augue ipsum, interdum id lorem a, placerat pulvinar est. 
                        Vestibulum a magna neque. Aenean et semper erat, eget pharetra felis. 
                        Nulla facilisi. Phasellus tristique consectetur libero, eget fermentum justo consectetur sed. 
                        Duis sed risus condimentum, pellentesque sapien viverra, tempus arcu. 
                        In id ligula lacinia, ullamcorper felis sed, gravida lorem. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>  
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
                        <label for="validade">Validade:</label><br>
                        <input type="date" name="validade" id="validade" placeholder="Prazo" required><br>
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
                        <label for="validadeput">Validade:</label><br>
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

    <footer id="footer"></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>