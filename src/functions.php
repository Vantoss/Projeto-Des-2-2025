<?php 

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

















?>