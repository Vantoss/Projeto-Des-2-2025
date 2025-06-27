<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php session_start(); if(!isset($_SESSION["user"])){die("Você não tem acesso à essa página");} #echo $_SESSION["user"]; echo $_SESSION["id"];
    require_once "../functions.php"; setlocale(LC_TIME, "pt-BR")?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Página Principal</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.0/dist/chart.umd.min.js"></script>
    <script src="../javascript/main.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
</head>