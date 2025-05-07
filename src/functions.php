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
    $preco = $_GET["senha"];
    if (!$nome || !$preco ){
        die("Dados não entraram!");
    }
    $sql = "INSERT INTO usuarios (id, nome, senha) VALUES (NULL, '$nome', '$preco')";
    $result = $dbconn->query($sql);
    echo $result;

    $dbconn->close();
}

function put(){

}

function del(){

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