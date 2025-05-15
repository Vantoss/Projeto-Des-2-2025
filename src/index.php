<?php 

require_once 'functions.php';

$conn = iniBanco();

if ($conn){
    header("location: pags/login.php");
} else{
    die("Banco não existe!");
}

?>