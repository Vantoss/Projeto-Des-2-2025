<?php 

##  CONEXÃO AO BANCO ##

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

## CRIAÇÃO DO BANCO ##

function createBanco(){
    $host = "localhost";
    $user = "root";
    $senha = "";

    $conn = new mysqli($host, $user, $senha);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    $createdb = "CREATE DATABASE IF NOT EXISTS `financas`";

    $usedb = "USE `financas`";

    $createlancamentos = "CREATE TABLE `lancamentos` (
    `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `id_usuario` int(11) NOT NULL,
    `nome` varchar(30) NOT NULL,
    `validade` date NOT NULL,
    `valor` float NOT NULL,
    `foi_paga` tinyint(1) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    $createmovimentacoes = "CREATE TABLE `movimentacoes` (
    `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `id_usuario` int(11) NOT NULL,
    `nome` varchar(30) NOT NULL,
    `categoria` varchar(30) NOT NULL,
    `data` date NOT NULL,
    `valor` float NOT NULL,
    `tipo` varchar(30) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    $createusuarios = "CREATE TABLE `usuarios` (
    `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `nome` varchar(30) NOT NULL,
    `senha` varchar(30) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    $alterlanc = "ALTER TABLE `lancamentos`
    ADD CONSTRAINT `lancamentos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);";

    $altermovi = "ALTER TABLE `movimentacoes`
    ADD CONSTRAINT `movimentacoes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);";

    $insertusuarios = "INSERT INTO `usuarios` (`id`, `nome`, `senha`) VALUES
    (1, 'dev1', '12345'),
    (2, 'dev2', '12345')";

    $createprocedurefillmovi = "CREATE DEFINER=`root`@`localhost` PROCEDURE `encheMovi`() INSERT INTO movimentacoes (id, id_usuario, nome, categoria, data, valor, tipo) VALUES
    (NULL, 1, 'Condomínio', 'Moradia', '2024-12-10', '500', 'Despesa' ),
    (NULL, 1, 'Água', 'Moradia', '2024-12-10', '100.40', 'Despesa' ),
    (NULL, 1, 'Internet', 'Moradia', '2024-12-10', '85', 'Despesa' ),
    (NULL, 1, 'Videogame', 'Lazer', '2024-12-15', '80', 'Despesa' ),
    (NULL, 1, 'Luz', 'Moradia', '2024-12-07', '110.25', 'Despesa' ),
    (NULL, 1, 'Delivery', 'Alimentação', '2024-12-17', '30', 'Despesa' ),
    (NULL, 1, 'Consulta', 'Saúde', '2024-12-12', '50', 'Despesa' ),
    (NULL, 1, 'Curso', 'Educação', '2024-12-08', '100', 'Despesa' ),
    (NULL, 1, 'Combustível', 'Transporte', '2025-01-02', '6.20', 'Despesa' ),
    (NULL, 1, 'Salário', 'Trabalho', '2025-01-05', '2100', 'Receita' ),
    (NULL, 1, 'Condomínio', 'Moradia', '2025-01-07', '500', 'Despesa' ),
    (NULL, 1, 'Água', 'Moradia', '2025-01-07', '100.40', 'Despesa' ),
    (NULL, 1, 'Internet', 'Moradia', '2025-01-10', '85', 'Despesa' ),
    (NULL, 1, 'Luz', 'Moradia', '2025-01-07', '110.25', 'Despesa' ),
    (NULL, 1, 'Freelance', 'Trabalho', '2025-01-09', '120', 'Receita' ),
    (NULL, 1, 'Cinema', 'Lazer', '2025-01-12', '40', 'Despesa' ),
    (NULL, 1, 'Mercado', 'Alimentação', '2025-01-10', '90.43', 'Despesa' ),
    (NULL, 1, 'Medicamento', 'Saúde', '2025-01-12', '20', 'Despesa' ),
    (NULL, 1, 'Material', 'Educação', '2025-01-19', '75', 'Despesa' ),
    (NULL, 1, 'Transporte público', 'Transporte', '2025-01-24', '5', 'Despesa' ),
    (NULL, 1, 'Salário', 'Trabalho', '2025-02-05', '2000', 'Receita' ),
    (NULL, 1, 'Condomínio', 'Moradia', '2025-02-10', '500', 'Despesa' ),
    (NULL, 1, 'Luz', 'Moradia', '2025-02-07', '110.25', 'Despesa' ),
    (NULL, 1, 'Água', 'Moradia', '2025-02-10', '100.40', 'Despesa' ),
    (NULL, 1, 'Internet', 'Moradia', '2025-02-10', '85', 'Despesa' ),
    (NULL, 1, 'Evento', 'Lazer', '2025-02-13', '80', 'Despesa' ),
    (NULL, 1, 'Restaurante', 'Alimentação', '2025-02-13', '33.5', 'Despesa' ),
    (NULL, 1, 'Consulta', 'Saúde', '2025-02-21', '50', 'Despesa' ),
    (NULL, 1, 'Curso', 'Educação', '2025-02-10', '100', 'Despesa' ),
    (NULL, 1, 'Mecânico', 'Transporte', '2025-02-20', '640', 'Despesa' ),
    (NULL, 1, 'Salário', 'Trabalho', '2025-03-05', '2150', 'Receita' ),
    (NULL, 1, 'Condomínio', 'Moradia', '2025-03-10', '500', 'Despesa' ),
    (NULL, 1, 'Água', 'Moradia', '2025-03-10', '100.40', 'Despesa' ),
    (NULL, 1, 'Luz', 'Moradia', '2025-03-07', '110.25', 'Despesa' ),
    (NULL, 1, 'Internet', 'Moradia', '2025-03-10', '85', 'Despesa' ),
    (NULL, 1, 'Freelance', 'Trabalho', '2025-03-15', '200', 'Receita' ),
    (NULL, 1, 'Videogame', 'Lazer', '2025-03-17', '55', 'Despesa' ),
    (NULL, 1, 'Mercado', 'Alimentação', '2025-03-11', '60.30', 'Despesa' ),
    (NULL, 1, 'IPTU', 'Moradia', '2025-03-23', '400', 'Despesa' ),
    (NULL, 1, 'Consulta', 'Saúde', '2025-03-18', '30', 'Despesa' ),
    (NULL, 1, 'Curso', 'Educação', '2025-03-12', '100', 'Despesa' ),
    (NULL, 1, 'Transporte público', 'Transporte', '2025-03-29', '5', 'Despesa' ),
    (NULL, 1, 'Salário', 'Trabalho', '2025-04-05', '2000', 'Receita' ),
    (NULL, 1, 'Condomínio', 'Moradia', '2025-04-10', '500', 'Despesa' ),
    (NULL, 1, 'Luz', 'Moradia', '2025-04-07', '110.25', 'Despesa' ),
    (NULL, 1, 'Água', 'Moradia', '2025-04-10', '100.40', 'Despesa' ),
    (NULL, 1, 'Internet', 'Moradia', '2025-04-10', '85', 'Despesa' ),
    (NULL, 1, 'Freelance', 'Trabalho', '2025-04-09', '150', 'Receita' ),
    (NULL, 1, 'Cinema', 'Lazer', '2025-04-21', '40', 'Despesa' ),
    (NULL, 1, 'Delivery', 'Alimentação', '2025-04-13', '58.99', 'Despesa' ),
    (NULL, 1, 'Consulta', 'Saúde', '2025-04-23', '40', 'Despesa' ),
    (NULL, 1, 'Material', 'Educação', '2025-04-24', '60', 'Despesa' ),
    (NULL, 1, 'Uber', 'Transporte', '2025-04-17', '24.50', 'Despesa' ),
    (NULL, 1, 'Salário', 'Trabalho', '2025-05-05', '2100', 'Receita' ),
    (NULL, 1, 'Condomínio', 'Moradia', '2025-05-10', '500', 'Despesa' ),
    (NULL, 1, 'Luz', 'Moradia', '2025-05-07', '110.25', 'Despesa' ),
    (NULL, 1, 'Água', 'Moradia', '2025-05-10', '100.40', 'Despesa' ),
    (NULL, 1, 'Internet', 'Moradia', '2025-05-10', '85', 'Despesa' ),
    (NULL, 1, 'Evento', 'Lazer', '2025-05-13', '30', 'Despesa' ),
    (NULL, 1, 'Restaurante', 'Alimentação', '2025-05-20', '25', 'Despesa' ),
    (NULL, 1, 'Gás', 'Moradia', '2025-05-09', '40', 'Despesa' ),
    (NULL, 1, 'Consulta', 'Saúde', '2025-05-18', '50', 'Despesa' ),
    (NULL, 1, 'Curso', 'Educação', '2025-05-12', '100', 'Despesa' ),
    (NULL, 1, 'Combustível', 'Transporte', '2025-05-20', '6.20', 'Despesa' ),
    (NULL, 1, 'Salário', 'Trabalho', '2025-06-05', '2050', 'Receita' )";

    $execfillmovi = "CALL `encheMovi` ();";
    
    if (!mysqli_query($conn, $createdb)){
        die("Falha ao criar banco");
    }

    if (!mysqli_query($conn, $usedb)){
        die("Falha ao conectar-se ao banco");
    }

    if (!mysqli_query($conn, $createlancamentos)){
        die("Falha ao criar a tabela Lançamentos");
    }

    if (!mysqli_query($conn, $createmovimentacoes)){
        die("Falha ao criar a tabela Movimentações");
    }

    if (!mysqli_query($conn, $createusuarios)){
        die("Falha ao criar a tabela Usuarios");
    }

    if (!mysqli_query($conn, $alterlanc)){
        die("Falha ao definir a foreign key da tabela Lançamentos");
    }

    if (!mysqli_query($conn, $altermovi)){
        die("Falha ao definir a foreign key da tabela Movimentações");
    }

    if (!mysqli_query($conn, $insertusuarios)){
        die("Falha ao inserir usuários");
    }

    if (!mysqli_query($conn, $createprocedurefillmovi)){
        die("Falha ao criar procedure de movimentações");
    }

    if (!mysqli_query($conn, $execfillmovi)){
        die("Falha ao executer a procedure de movimentações");
    }


    return $conn;
}

?>