<?php 

require_once 'mysql.php';

try{
    $conn = iniBanco();
    if ($conn){
        header("location: pags/login.php");
    }
} catch (Exception $e){
    $conn = createBanco();
    if ($conn){
        header("location: pags/login.php");
    }
}

?>