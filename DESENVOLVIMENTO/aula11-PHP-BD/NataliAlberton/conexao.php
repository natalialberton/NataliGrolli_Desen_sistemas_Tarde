<?php

//Habilita relatório detalhado de erros no MySQL
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//Função para conectar ao BD; retorna um objeto ou interrompe em caso de erro
function conectaBD() {
    $endereco = 'localhost:3307';
    $usuario = 'root';
    $senha = 'root';
    $banco = 'empresa';

    try {
        $connect = new mysqli($endereco, $usuario, $senha, $banco);

        //Definição do conjunto de caracteres para evitar problemas de acentuação
        $connect->set_charset("utf8mb4");
        return $connect;
    } catch (Exception $e) {
        die("Erro na conexão".$e->getMessage());
    }
}

?>