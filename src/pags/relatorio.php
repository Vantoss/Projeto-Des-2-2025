<?php require_once "../assets/head.php" ?>
<body onload="loadRel()">
    <?php require_once "../assets/header.php"?>

    <div class="container mt-2">
        <div class="row">
            <div class="col" id="resumorel">
                <h3>Relatório Geral</h3>
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
            </div>
        </div>
        <div class="row" id="graficos">
            <div class="col">
                <div id="grafico1">
                    <canvas id="myChart1"></canvas>
                </div>
            </div>
            <div class="col">
                <div id="grafico2">
                    <canvas id="myChart2"></canvas>
                </div>
            </div>
            <div class="col">
                <div id="grafico3">
                    <canvas id="myChart3"></canvas>
                </div>
            </div>
        </div>
    </div>

    <footer id="footer"></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>