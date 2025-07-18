<!--A FAZER -->
<!--Consertar a pesquisa de movimentações -->
<!--Fazer com que as linhas dos lançamentos pagos se tornem cinzas ou algo parecido-->
<!--Fazer a edição do usuário ao clicar no nome--> 
<!--Ver a questão do cache-->
<!--Fazer a puxada de dados por ano-->
<?php require_once "../assets/head.php" ?>
<body onload="tabelaMovi()">
    <?php require_once "../assets/header.php"?>
    
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-6 mx-auto" id="resumomovi">
                <h3>Suas movimentações</h3>
                <div class="desc">
                    <p>Aqui você poderá cadastrar suas despesas e receitas e visualizá-las na tabela abaixo.</p>
                </div>
                <div class="total">
                    <div class="card">
                        <div class="card-body">
                            <p id="totald" class="card-text">Total de despesas: <span id="numd"></span></p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <p id="totalr" class="card-text">Total de receitas: <span id="numr"></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-md-6" id="">
            <div class="containertable col rounded" id="tabelamovi">
                <div id="btns">
                    <button type='submit' id='cadm' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#cadmmodal' onclick="autofillcadMovi()">Registrar gasto/receita</button>
                    <button class="btn btn-success" id="pm" type="button" data-bs-toggle="collapse" data-bs-target="#pesquisar" aria-expanded="false" aria-controls="collapse">
                    Pesquisar
                    </button>
                </div>
                <div id="pesquisar" class="collapse">
                    <form id="formpesquisar">
                        <label for="nomep">Nome:</label>
                        <input type="text" name="nomem" id="nomep">
                        <label for="categoria">Categoria:</label>
                        <select name="categoriap" id="categoriap">
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
                        <input type="date" name="datam" id="datap">
                        <label for="valorp">Valor:</label>
                        <input type="number" name="valorm" id="valorp" >
                        <label for="tipop">Tipo:</label>
                        <select name="tipom" id="tipop">
                            <option value="Qualquer">Qualquer</option>
                            <option value="Despesa">Despesa</option>
                            <option value="Receita">Receita</option>
                        </select>
                        <button type="submit" id="pesqbtn" class="btn btn-success" onclick="pesqMovi()">Pesquisar</button>
                        <button type="reset" id="resetpesq" class="btn btn-success">Apagar campos</button>
                    </form>
                </div>
                <div id="periodo">
                    <div class="dropdown" id="ano">
                        <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Ano
                        </button>
                        <ul class="dropdown-menu">
                            <li class="anolista"></li>
                        </ul>
                    </div>
                    <div class="btn-group" role="group">
                        <input type="radio" class="mes btn-check" name="meses" id="jan" value="janeiro">
                        <label class="btn btn-outline-success" for="jan" id="janeiro" onclick="bringMesMovi('janeiro')">Janeiro</label>
                        <input type="radio" class="mes btn-check" name="meses" id="fev" value="fevereiro">
                        <label class="btn btn-outline-success" for="fev" id="fevereiro" onclick="bringMesMovi('fevereiro')">Fevereiro</label>
                        <input type="radio" class="mes btn-check" name="meses" id="mar" value="março">
                        <label class="btn btn-outline-success" for="mar" id="março" onclick="bringMesMovi('março')">Março</label>
                        <input type="radio" class="mes btn-check" name="meses" id="abr" value="abril">
                        <label class="btn btn-outline-success" for="abr" id="abril" onclick="bringMesMovi('abril')">Abril</label>
                        <input type="radio" class="mes btn-check" name="meses" id="mai" value="maio">
                        <label class="btn btn-outline-success" for="mai" id="maio" onclick="bringMesMovi('maio')">Maio</label>
                        <input type="radio" class="mes btn-check" name="meses" id="jun" value="junho">
                        <label class="btn btn-outline-success" for="jun" id="junho" onclick="bringMesMovi('junho')">Junho</label>
                        <input type="radio" class="mes btn-check" name="meses" id="jul" value="julho">
                        <label class="btn btn-outline-success" for="jul" id="julho" onclick="bringMesMovi('julho')">Julho</label>
                        <input type="radio" class="mes btn-check" name="meses" id="ago" value="agosto">
                        <label class="btn btn-outline-success" for="ago" id="agosto" onclick="bringMesMovi('agosto')">Agosto</label>
                        <input type="radio" class="mes btn-check" name="meses" id="set" value="setembro">
                        <label class="btn btn-outline-success" for="set" id="setembro" onclick="bringMesMovi('setembro')">Setembro</label>
                        <input type="radio" class="mes btn-check" name="meses" id="out" value="outubro">
                        <label class="btn btn-outline-success" for="out" id="outubro" onclick="bringMesMovi('outubro')">Outubro</label>
                        <input type="radio" class="mes btn-check" name="meses" id="nov" value="novembro">
                        <label class="btn btn-outline-success" for="nov" id="novembro" onclick="bringMesMovi('novembro')">Novembro</label>
                        <input type="radio" class="mes btn-check" name="meses" id="dez" value="dezembro">
                        <label class="btn btn-outline-success" for="dez" id="dezembro" onclick="bringMesMovi('dezembro')">Dezembro</label>
                    </div>
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="document.getElementById('formmovi').reset()"></button>
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="document.getElementById('formmoviput').reset()"></button>
                </div>

                <div class="modal-body">
                    <form id="formmoviput">
                        <input hidden type="text" name="id" id="idputm" required>
                        <label for="nomeputm">Nome:</label><br>
                        <input type="text" name="nomem" id="nomeputm" placeholder="(Supermercado, gasolina...)" required><br>
                        <label for="categoriaput">Categoria:</label><br>
                        <select name="categoriaput" id="categoriaput">
                            <option value="Moradia">Moradia</option>
                            <option value="Alimentação">Alimentação</option>
                            <option value="Lazer">Lazer</option>
                            <option value="Saúde">Saúde</option>
                            <option value="Educação">Educação</option>
                            <option value="Transporte">Transporte</option>
                            <option value="Trabalho">Trabalho</option>
                        </select><br>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="document.getElementById('formmoviput').reset()">Cancelar</button>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cancelar</button>
                </div>

            </div>
        </div>
    </div>
<!----------------------------------------------------------------------------->  

    <footer id="footer"></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>