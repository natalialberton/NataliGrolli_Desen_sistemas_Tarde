<?php

//DEFINIÇÃO DAS CREDENCIAIS DE CONEXÃO AO BANCO DE DADOS
$servername = "localhost:3307";
$username = "root";
$password = "root";
$dbname = "armazena_imagem";

//CRIANDO A CONEXÃO USANDO MYSQLI COM O BANCO DE DADOS
$conexao = new mysqli($servername, $username, $password, $dbname);

//VERIFICANDO SE HOUVE ERRO NA CONEXÃO
if ($conexao-> connect_error) {
    die("Falha na conexão: ".$conexao-> connect_error);
}

?>