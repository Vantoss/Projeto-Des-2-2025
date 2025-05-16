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

    $createcontas = "CREATE TABLE `contas` (
    `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `id_usuario` int(11) NOT NULL,
    `tipo` varchar(30) NOT NULL,
    `prazo` date NOT NULL,
    `valor` float NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    $createdespesas = "CREATE TABLE `despesas` (
    `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `id_usuario` int(11) NOT NULL,
    `tipo` varchar(30) NOT NULL,
    `data` date NOT NULL,
    `hora` time DEFAULT NULL,
    `valor` float NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    $createusuarios = "CREATE TABLE `usuarios` (
    `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `nome` varchar(30) NOT NULL,
    `senha` varchar(30) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    $altercontas = "ALTER TABLE `contas`
    ADD CONSTRAINT `contas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)";

    $alterdesp = "ALTER TABLE `despesas`
    ADD CONSTRAINT `despesas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)";

    $insertusuarios = "INSERT INTO `usuarios` (`id`, `nome`, `senha`) VALUES
    (1, 'dev1', '12345'),
    (2, 'dev2', '12345')";

    $insertdespesas = "INSERT INTO `despesas` (`id`, `id_usuario`, `tipo`, `data`, `hora`, `valor`) VALUES
    (1, 1, 'Pagamento a vista', '2025-05-14', '17:00:00', 190),
    (2, 1, 'Pix pro fulano', '2025-05-12', '22:05:00', 100),
    (3, 1, 'Pix pro armazém', '2025-05-13', '14:10:00', 35),
    (4, 1, 'Conserto do telhado', '2025-05-02', '12:43:00', 400),
    (5, 1, 'Teste da hora', '2025-05-14', '00:00:00', 20)";
    
    if (!mysqli_query($conn, $createdb)){
        die("Falha ao criar banco");
    }

    if (!mysqli_query($conn, $usedb)){
        die("Falha ao conectar-se ao banco");
    }

    if (!mysqli_query($conn, $createcontas)){
        die("Falha ao criar a tabela Contas");
    }

    if (!mysqli_query($conn, $createdespesas)){
        die("Falha ao criar a tabela Despesas");
    }

    if (!mysqli_query($conn, $createusuarios)){
        die("Falha ao criar a tabela Usuarios");
    }

    if (!mysqli_query($conn, $altercontas)){
        die("Falha ao definir a foreign key da tabela Contas");
    }

    if (!mysqli_query($conn, $alterdesp)){
        die("Falha ao definir a foreign key da tabela Despesas");
    }

    if (!mysqli_query($conn, $insertusuarios)){
        die("Falha ao inserir usuários");
    }

    if (!mysqli_query($conn, $insertdespesas)){
        die("Falha ao inserir despesas");
    }

    return $conn;
}

?>