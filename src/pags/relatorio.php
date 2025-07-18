<?php require_once "../assets/head.php" ?>
<body onload="loadRel()">
    <?php require_once "../assets/header.php"?>

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-6 mx-auto" id="resumorel">
                <h3>Relatório Geral</h3>
                <div class="desc">
                    <p>Aqui é apresentado um resumo das suas despesas no mês selecionado e ao longo do ano.</p>  
                </div>
            </div>
        </div>
        <div class="row rounded" id="graficos">
            <div id="periodo2">
                <div class="btn-group" role="group">
                    <input type="radio" class="mes btn-check" name="meses" id="jan" value="janeiro">
                    <label class="btn btn-outline-success" for="jan" id="janeiro" onclick="bringMesRel('janeiro')">Janeiro</label>
                    <input type="radio" class="mes btn-check" name="meses" id="fev" value="fevereiro">
                    <label class="btn btn-outline-success" for="fev" id="fevereiro" onclick="bringMesRel('fevereiro')">Fevereiro</label>
                    <input type="radio" class="mes btn-check" name="meses" id="mar" value="março">
                    <label class="btn btn-outline-success" for="mar" id="março" onclick="bringMesRel('março')">Março</label>
                    <input type="radio" class="mes btn-check" name="meses" id="abr" value="abril">
                    <label class="btn btn-outline-success" for="abr" id="abril" onclick="bringMesRel('abril')">Abril</label>
                    <input type="radio" class="mes btn-check" name="meses" id="maio" value="maio">
                    <label class="btn btn-outline-success" for="maio" id="maio" onclick="bringMesRel('maio')">Maio</label>
                    <input type="radio" class="mes btn-check" name="meses" id="jun" value="junho">
                    <label class="btn btn-outline-success" for="jun" id="junho" onclick="bringMesRel('junho')">Junho</label>
                    <input type="radio" class="mes btn-check" name="meses" id="jul" value="julho">
                    <label class="btn btn-outline-success" for="jul" id="julho" onclick="bringMesRel('julho')">Julho</label>
                    <input type="radio" class="mes btn-check" name="meses" id="ago" value="agosto">
                    <label class="btn btn-outline-success" for="ago" id="agosto" onclick="bringMesRel('agosto')">Agosto</label>
                    <input type="radio" class="mes btn-check" name="meses" id="set" value="setembro">
                    <label class="btn btn-outline-success" for="set" id="setembro" onclick="bringMesRel('setembro')">Setembro</label>
                    <input type="radio" class="mes btn-check" name="meses" id="out" value="outubro">
                    <label class="btn btn-outline-success" for="out" id="outubro" onclick="bringMesRel('outubro')">Outubro</label>
                    <input type="radio" class="mes btn-check" name="meses" id="nov" value="novembro">
                    <label class="btn btn-outline-success" for="nov" id="novembro" onclick="bringMesRel('novembro')">Novembro</label>
                    <input type="radio" class="mes btn-check" name="meses" id="dez" value="dezembro">
                    <label class="btn btn-outline-success" for="dez" id="dezembro" onclick="bringMesRel('dezembro')">Dezembro</label>
                </div>
            </div>
            <div class="col-sm-4 colgraf">
                <div id="grafico1">
                    <canvas id="myChart1"></canvas>
                </div>
            </div>
            <div class="col-sm-4 colgraf">
                <div id="grafico2">
                    <canvas id="myChart2"></canvas>
                </div>
            </div>
            <div class="col-sm-4 colgraf">
                <div id="grafico3">
                    <canvas id="myChart3"></canvas>
                </div>
            </div>
        </div>
    </div>

    <footer id="footer"></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>