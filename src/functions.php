<?php 

#################### PAG LOGIN ####################

function login(){
    $dbconn = new mysqli("localhost", "root", "", "financas");

    if ($dbconn->connect_error){
        die("Conexão falhou");
    }
    $nome = $_GET["nome"];
    $senha = $_GET["senha"];
    if (!$nome || !$senha){
        die("Dados não entraram!");
    }
    $sql = "SELECT id, nome, senha FROM usuarios WHERE nome = '$nome' AND senha = '$senha'";
    $result = $dbconn->query($sql);
    if (mysqli_num_rows($result)){
        session_start();
        while($col = mysqli_fetch_assoc($result)){
            echo $col["nome"];
            $_SESSION["user"] = $col["nome"];
            $_SESSION["id"] = $col["id"];
        }
    } else {
        echo "Sem resultados!";
    }
    $dbconn->close();

}

function cadUser(){
    $dbconn = new mysqli("localhost", "root", "", "financas");

    if ($dbconn->connect_error){
        die("Conexão falhou");
    }
    $nome = $_GET["nome"];
    $senha = $_GET["senha"];
    if (!$nome || !$senha ){
        die("Dados não entraram!");
    }
    $sql = "INSERT INTO usuarios (id, nome, senha) VALUES (NULL, '$nome', '$senha')";
    $result = $dbconn->query($sql);
    echo $result;

    $dbconn->close();
}

function delUser(){
    $dbconn = new mysqli("localhost", "root", "", "financas");

    if ($dbconn->connect_error){
        die("Conexão falhou");
    }
    $id = $_GET["id"];
    if (!$id ){
        die("Dados não entraram!");
    }
    $sql = "DELETE FROM usuarios WHERE usuarios.id = '$id'";
    $result = $dbconn->query($sql);
    echo $result;

    $dbconn->close();
}

#################### PAG MAIN ####################

function getMovi(){
    session_start();
    $dbconn = new mysqli("localhost", "root", "", "financas");

    if ($dbconn->connect_error){
        die("Conexão falhou");
    }
    $id = $_SESSION["id"];
    $sql = "SELECT * FROM movimentacoes WHERE id_usuario = '$id'";
    $result = $dbconn->query($sql);
    $array = array();
    while($linha = mysqli_fetch_assoc($result)){
        $array[] = $linha;
    }
    $file = fopen("json/movi.json", "w");
    $json = '{ "movimentacoes" : ' . json_encode($array) . ' } ';
    fwrite($file, $json);
    fclose($file);

    $dbconn->close();

}

function cadMovi(){
    session_start();
    $dbconn = new mysqli("localhost", "root", "", "financas");

    if ($dbconn->connect_error){
        die("Conexão falhou");
    }
    $nome = $_GET["nome"];
    $data = $_GET["data"];
    $categoria = $_GET["categoria"];
    $valor = $_GET["valor"];
    $tipo = $_GET["tipo"];
    $userid = $_SESSION["id"];
    if (!$nome || !$data || !$categoria || !$valor || !$tipo ){
        die("Dados não entraram!");
    }
    $sql = "INSERT INTO movimentacoes (id, id_usuario, nome, categoria, data, valor, tipo) VALUES (NULL, '$userid', '$nome', '$categoria', '$data', '$valor', '$tipo')";
    $result = $dbconn->query($sql);
    echo $result;

    $dbconn->close();
}

function putMovi(){
    session_start();
    $dbconn = new mysqli("localhost", "root", "", "financas");

    if ($dbconn->connect_error){
        die("Conexão falhou");
    }
    $nome = $_GET["nome"];
    $data = $_GET["data"];
    $categoria = $_GET["categoria"];
    $valor = $_GET["valor"];
    $tipo = $_GET["tipo"];
    $id = $_GET["id"];
    if (!$nome || !$data || !$categoria || !$valor || !$tipo || !$id ){
        die("Dados não entraram!");
    }
    $sql = "UPDATE movimentacoes SET nome = '$nome', data = '$data', categoria = '$categoria', valor = '$valor', tipo = '$tipo' WHERE movimentacoes.id = '$id'";
    $result = $dbconn->query($sql);
    echo $result;

    $dbconn->close();
}

function delMovi(){
    session_start();
    $dbconn = new mysqli("localhost", "root", "", "financas");

    if ($dbconn->connect_error){
        die("Conexão falhou");
    }
    $id = $_GET["id"];
    if (!$id ){
        die("Dados não entraram!");
    }
    $sql = "DELETE FROM movimentacoes WHERE movimentacoes.id = '$id'";
    $result = $dbconn->query($sql);
    echo $result;

    $dbconn->close();
}

#-------------------------------------------------------------#

function getFixo(){
    session_start();
    $dbconn = new mysqli("localhost", "root", "", "financas");

    if ($dbconn->connect_error){
        die("Conexão falhou");
    }
    $id = $_SESSION["id"];
    $sql = "SELECT * FROM lancamentos WHERE id_usuario = '$id'";
    $result = $dbconn->query($sql);
    $array = array();
    while($linha = mysqli_fetch_assoc($result)){
        $array[] = $linha;
    }
    $file = fopen("json/fixos.json", "w");
    $json = '{ "fixos" : ' . json_encode($array) . ' } ';
    fwrite($file, $json);
    fclose($file);

    $dbconn->close();

}

function cadFixo(){
    session_start();
    $dbconn = new mysqli("localhost", "root", "", "financas");

    if ($dbconn->connect_error){
        die("Conexão falhou");
    }
    $nome = $_GET["nome"];
    $validade = $_GET["validade"];
    $valor = $_GET["valor"];
    $userid = $_SESSION["id"];
    if (!$nome || !$validade || !$valor ){
        die("Dados não entraram!");
    }
    $sql = "INSERT INTO lancamentos (id, id_usuario, nome, validade, valor, foi_paga) VALUES (NULL, '$userid', '$nome', '$validade', '$valor', 0)";
    $result = $dbconn->query($sql);
    echo $result;

    $dbconn->close();
}

function putFixo(){
    $dbconn = new mysqli("localhost", "root", "", "financas");

    if ($dbconn->connect_error){
        die("Conexão falhou");
    }
    $nome = $_GET["nome"];
    $validade = $_GET["validade"];
    $valor = $_GET["valor"];
    $id = $_GET["id"];
    if (!$nome || !$validade || !$valor || !$id ){
        die("Dados não entraram!");
    }
    $sql = "UPDATE lancamentos SET nome = '$nome', validade = '$validade', valor = '$valor' WHERE lancamentos.id = '$id'";
    $result = $dbconn->query($sql);
    echo $result;

    $dbconn->close();
}

function delFixo(){
    $dbconn = new mysqli("localhost", "root", "", "financas");

    if ($dbconn->connect_error){
        die("Conexão falhou");
    }
    $id = $_GET["id"];
    if (!$id ){
        die("Dados não entraram!");
    }
    $sql = "DELETE FROM lancamentos WHERE lancamentos.id = '$id'";
    $result = $dbconn->query($sql);
    echo $result;

    $dbconn->close();
}

#################### UTILITARIOS ####################

function get(){
    $dbconn = new mysqli("localhost", "root", "", "financas");

    if ($dbconn->connect_error){
        die("Conexão falhou");
    }

    $sql = "SELECT nome, senha FROM usuarios";
    $result = $dbconn->query($sql);
    $array = array();
    while($linha = mysqli_fetch_assoc($result)){
        $array[] = $linha;
    }
    echo '{ "usuarios" : ' . json_encode($array) . ' } ';

    $dbconn->close();

}

function post(){
    $dbconn = new mysqli("localhost", "root", "", "financas");

    if ($dbconn->connect_error){
        die("Conexão falhou");
    }
    $nome = $_GET["nome"];
    $senha = $_GET["senha"];
    if (!$nome || !$senha ){
        die("Dados não entraram!");
    }
    $sql = "INSERT INTO usuarios (id, nome, senha) VALUES (NULL, '$nome', '$senha')";
    $result = $dbconn->query($sql);
    echo $result;

    $dbconn->close();
}

function put(){
    $dbconn = new mysqli("localhost", "root", "", "financas");

    if ($dbconn->connect_error){
        die("Conexão falhou");
    }
    $nome = $_GET["nome"];
    $senha = $_GET["senha"];
    $id = $_GET["id"];
    if (!$nome || !$senha || !$id ){
        die("Dados não entraram!");
    }
    $sql = "UPDATE usuarios SET nome = '$nome', senha = '$senha' WHERE usuarios.id = '$id'";
    $result = $dbconn->query($sql);
    echo $result;

    $dbconn->close();
}

function del(){
    $dbconn = new mysqli("localhost", "root", "", "financas");

    if ($dbconn->connect_error){
        die("Conexão falhou");
    }
    $id = $_GET["id"];
    if (!$id ){
        die("Dados não entraram!");
    }
    $sql = "DELETE FROM usuarios WHERE usuarios.id = '$id'";
    $result = $dbconn->query($sql);
    echo $result;

    $dbconn->close();
}

################################################

if (isset($_REQUEST["login"])){
    login();
}
if (isset($_REQUEST["caduser"])){
    cadUser();
}
if (isset($_REQUEST["deluser"])){
    delUser();
}

if (isset($_REQUEST["getmovi"])){
    getMovi();
}
if (isset($_REQUEST["cadmovi"])){
    cadMovi();
}
if (isset($_REQUEST["putmovi"])){
    putMovi();
}
if (isset($_REQUEST["delmovi"])){
    delMovi();
}

if (isset($_REQUEST["getfixo"])){
    getFixo();
}
if (isset($_REQUEST["cadfixo"])){
    cadFixo();
}
if (isset($_REQUEST["putfixo"])){
    putFixo();
}
if (isset($_REQUEST["delfixo"])){
    delFixo();
}

if (isset($_REQUEST["get"])){
    get();
}
if (isset($_REQUEST["post"])){
    post();
}
if (isset($_REQUEST["put"])){
    put();
}
if (isset($_REQUEST["del"])){
    del();
}




?>