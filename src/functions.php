<?php 

header("Content-type: application/json");

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
    $sql = "SELECT nome, senha FROM usuarios WHERE nome = '$nome' AND senha = '$senha'";
    $result = $dbconn->query($sql);
    if (mysqli_num_rows($result)){
        session_start();
        while($col = mysqli_fetch_assoc($result)){
            echo $col["nome"];
            $_SESSION["user"] = $col["nome"];
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

function cadDesp(){
    $dbconn = new mysqli("localhost", "root", "", "financas");

    if ($dbconn->connect_error){
        die("Conexão falhou");
    }
    $tipo = $_GET["tipo"];
    $data = $_GET["data"];
    $hora = $_GET["hora"];
    $valor = $_GET["valor"];
    if (!$tipo || !$data || !$valor ){
        die("Dados não entraram!");
    }
    $sql = "INSERT INTO despesas (id, id_usuario, tipo, data, hora, valor) VALUES (NULL, 1, '$tipo', '$data', '$hora', '$valor')";
    $result = $dbconn->query($sql);
    echo $result;

    $dbconn->close();
}

function putDesp(){
    $dbconn = new mysqli("localhost", "root", "", "financas");

    if ($dbconn->connect_error){
        die("Conexão falhou");
    }
    $tipo = $_GET["tipo"];
    $data = $_GET["data"];
    $hora = $_GET["hora"];
    $valor = $_GET["valor"];
    $id = $_GET["id"];
    if (!$tipo || !$data || !$valor || !$id ){
        die("Dados não entraram!");
    }
    $sql = "UPDATE despesas SET tipo = '$tipo', data = '$data', hora = '$hora', valor = '$valor' WHERE despesas.id = '$id'";
    $result = $dbconn->query($sql);
    echo $result;

    $dbconn->close();
}

function delDesp(){
    $dbconn = new mysqli("localhost", "root", "", "financas");

    if ($dbconn->connect_error){
        die("Conexão falhou");
    }
    $id = $_GET["id"];
    if (!$id ){
        die("Dados não entraram!");
    }
    $sql = "DELETE FROM despesas WHERE despesas.id = '$id'";
    $result = $dbconn->query($sql);
    echo $result;

    $dbconn->close();
}

function cadConta(){
    $dbconn = new mysqli("localhost", "root", "", "financas");

    if ($dbconn->connect_error){
        die("Conexão falhou");
    }
    $tipo = $_GET["tipo"];
    $prazo = $_GET["prazo"];
    $valor = $_GET["valor"];
    if (!$tipo || !$prazo || !$valor ){
        die("Dados não entraram!");
    }
    $sql = "INSERT INTO contas (id, id_usuario, tipo, prazo, valor) VALUES (NULL, 1, '$tipo', '$prazo', '$valor')";
    $result = $dbconn->query($sql);
    echo $result;

    $dbconn->close();
}

function putConta(){
    $dbconn = new mysqli("localhost", "root", "", "financas");

    if ($dbconn->connect_error){
        die("Conexão falhou");
    }
    $tipo = $_GET["tipo"];
    $data = $_GET["prazo"];
    $valor = $_GET["valor"];
    $id = $_GET["id"];
    if (!$tipo || !$prazo || !$valor || !$id ){
        die("Dados não entraram!");
    }
    $sql = "UPDATE contas SET tipo = '$tipo', prazo = '$prazo', valor = '$valor' WHERE contas.id = '$id'";
    $result = $dbconn->query($sql);
    echo $result;

    $dbconn->close();
}

function delConta(){
    $dbconn = new mysqli("localhost", "root", "", "financas");

    if ($dbconn->connect_error){
        die("Conexão falhou");
    }
    $id = $_GET["id"];
    if (!$id ){
        die("Dados não entraram!");
    }
    $sql = "DELETE FROM contas WHERE contas.id = '$id'";
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
if (isset($_REQUEST["caddesp"])){
    cadDesp();
}
if (isset($_REQUEST["putdesp"])){
    putDesp();
}
if (isset($_REQUEST["deldesp"])){
    delDesp();
}
if (isset($_REQUEST["cadconta"])){
    cadConta();
}
if (isset($_REQUEST["putconta"])){
    putConta();
}
if (isset($_REQUEST["delconta"])){
    delConta();
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