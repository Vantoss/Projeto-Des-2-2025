<?php 

header("Content-type: application/json");

function iniBanco(){
    $host = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "financas";

    $dbconn = mysqli_connect($host, $dbUser, $dbPass, $dbName);

    if ($dbconn->connect_error){
        die("Conexão falhou");
    }
    return $dbconn;
}

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
        while($col = mysqli_fetch_assoc($result)){
            echo $col["nome"];
        }
    } else {
        echo "Sem resultados!";
    }
    $dbconn->close();

}

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

if (isset($_REQUEST["login"])){
    login();
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