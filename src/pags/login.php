<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <script src="../javascript/login.js" defer></script>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container mx-auto mt-5" id="login">
        <div class="row">
            <h1 id="facalogin" class="">Faça seu login</h1>
            <div class="containerlogin col-md-5 rounded"> <!--Consertar o estilo do col do login -->
                <form id="loginform" method="POST">
                    <label for="nomelog">Nome:</label>
                    <input type="text" name="nomelog" id="nomelog" placeholder="" required><br>
                    <label for="senhalog">Senha:</label>
                    <input type="password" name="senhalog" id="senhalog" placeholder="" required><br>
                    <button id="enviar "type="submit" class="btn btn-success" onclick="login()">Enviar</button>
                </form>
            </div>
        </div>
        <div class="row mt-3"> <!--Fazer com que ao cadastrar o usuário os dados são inseridos nos campos do login (ou logar direto, um ou o outro) -->
            <div class="col-md-5 mx-auto">
                <p id="cadtext">Não tem uma conta ainda? <a data-bs-toggle='modal' data-bs-target='#cadusermodal' href="">Crie uma.</a></p>
            </div>
        </div>
    </div>

<!---------------------------------- MODALS/OUTROS ---------------------------------->   

    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="cadusermodal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Cadastrar Usuário</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="document.getElementById('caduserform').reset()"></button>
            </div>

            <div class="modal-body">
                <form id="caduserform">
                    <label for="nomecad">Nome:</label><br>
                    <input type="text" name="nomecad" id="nomecad" placeholder="" required><br>
                    <label for="senhacad">Senha:</label><br>
                    <input type="password" name="senhacad" id="senhacad" placeholder="" required>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="enviar" onclick="cadastro()" data-bs-dismiss="modal">Cadastrar usuário</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="document.getElementById('caduserform').reset()">Cancelar</button>
            </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>