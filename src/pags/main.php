<!--A FAZER -->
<!--Consertar a pesquisa de movimentações -->
<!--Fazer a edição do usuário ao clicar no nome-->
<!--Paginação das tabelas, dividir por mês-->
<!--Escrever as descrições -->
<!--Fazer a página de Relatório (talvez tornar ela a inicial) -->
<?php require_once "../assets/head.php" ?>
<body onload="tabelaMovi()">
    <?php require_once "../assets/header.php"?>
    
    <div class="container mt-2">
        <div class="row">
            <div class="col" id="resumomovi">
                <h3>Suas movimentações</h3>
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
                    <p id="totald">Total de despesas: <span id="numd"></span></p>
                    <p id="totalr">Total de receitas: <span id="numr"></span></p>
                </div>
            </div>
        </div>
        <div class="row" id="">
            <div class="containertable col rounded" id="tabelamovi">
                <div id="btns">
                    <button type='submit' id='cadm' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#cadmmodal'>Registrar gasto/receita</button>
                    <button class="btn btn-success" id="pm" type="button" data-bs-toggle="collapse" data-bs-target="#pesquisar" aria-expanded="false" aria-controls="collapse">
                    Pesquisar
                    </button>
                </div>
                <div id="pesquisar" class="collapse">
                    <form id="formpesquisar">
                        <label for="nomep">Nome:</label>
                        <input type="text" name="nomem" id="nomep">
                        <label for="categoria">Categoria:</label>
                        <select name="categoriap" id="categoria">
                            <option value="Qualquer">Qualquer</option>
                            <option value="Moradia">Moradia</option>
                            <option value="Alimentação">Alimentação</option>
                            <option value="Lazer">Lazer</option>
                            <option value="Saúde">Saúde</option>
                            <option value="Educação">Educação</option>
                            <option value="Transporte">Transporte</option>
                            <option value="Trabalho">Trabalho</option>
                        </select>
                        <label for="datap">Data:</label>
                        <input type="date" name="datam" id="datap" >
                        <label for="valorp">Valor:</label>
                        <input type="number" name="valorm" id="valorp" >
                        <label for="tipop">Tipo:</label>
                        <select name="tipom" id="tipop">
                            <option value="Qualquer">Qualquer</option>
                            <option value="Despesa">Despesa</option>
                            <option value="Receita">Receita</option>
                        </select>
                        <button type="submit" id="pesqbtn" class="btn btn-success" onclick="pesqMovi()">Pesquisar</button>
                    </form>
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
                        <select name="categoriam" id="categoria">
                            <option value="Moradia">Moradia</option>
                            <option value="Alimentação">Alimentação</option>
                            <option value="Lazer">Lazer</option>
                            <option value="Saúde">Saúde</option>
                            <option value="Educação">Educação</option>
                            <option value="Transporte">Transporte</option>
                            <option value="Trabalho">Trabalho</option>
                        </select><br>
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
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('formmovi').reset()" data-bs-dismiss="modal">Cancelar</button>
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
                        <input hidden type="text" name="id" id="idputm" required>
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
                    <p>Você tem certeza que quer apagar essa movimentação?</p>
                    <form id="formmovidel">
                        <input hidden type="text" name="id" id="iddelm" required>                  
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