<!--A FAZER -->
<!--Remover os JSONS do Git e fazer com que automaticamente sejam criados durante a primeira execução-->
<!--Fazer a pesquisa de movimentações -->
<!--Fazer as páginas de custos fixos e relatório -->
<!--Descobrir como integrar gráficos ao projeto (provavelmente através de bibliotecas ou Python) -->
<?php require_once "../assets/head.php" ?>
<body onload="tabelaMovi()">
    <?php require_once "../assets/header.php"?>
    
    <div class="container mt-2">
        <div class="row" id="">
            <div class="containertable col rounded" id="tabelamovi">
                <div id="cadbtns">
                    <button type='submit' id='cadm' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#cadmmodal'>Registrar gasto/receita</button>
                </div>
                <table id="movimentacoes" class="table table-bordered">
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
                        <label for="tipo">Despesa ou receita?</label><br>
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

    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="edmmodal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Editar Movimentação</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form id="formmoviput">
                        <label for="idputm">ID:</label><br>
                        <input type="text" name="id" id="idputm" required><br>
                        <label for="nomeputm">Nome:</label><br>
                        <input type="text" name="nomem" id="nomeputm" placeholder="(Supermercado, gasolina...)" required><br>
                        <label for="categoriaput">Categoria:</label><br>
                        <input type="text" name="categoriam" id="categoriaput" placeholder="(Lazer, alimentação...)" required><br>
                        <label for="dataput">Data:</label><br>
                        <input type="date" name="datam" id="dataput" placeholder="Data" required><br>
                        <label for="valorputm">Valor:</label><br>
                        <input type="number" name="valorm" id="valorputm" placeholder="" required><br>
                        <label for="tipoput">Despesa ou receita?</label><br>
                        <select name="tipom" id="tipoput">
                            <option value="Despesa">Despesa</option>
                            <option value="Receita">Receita</option>
                        </select>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="enviar" onclick="putMovi()" data-bs-dismiss="modal">Salvar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="apmmodal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Apagar Movimentação</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form id="formmovidel">
                        <label for="iddelm">ID:</label><br>
                        <input type="text" name="id" id="iddelm" required><br>                        
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="enviar" onclick="delMovi()" data-bs-dismiss="modal">Apagar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>

            </div>
        </div>
    </div>
<!----------------------------------------------------------------------------->  

    <footer id="footer"></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>