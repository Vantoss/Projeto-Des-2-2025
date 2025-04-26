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

}

function put(){

}

function del(){

}


if (isset($_REQUEST["get"])){
    get();
}







?>