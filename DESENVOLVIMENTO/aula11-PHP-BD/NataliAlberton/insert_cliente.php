<?php

//Inclui o arquivo de conexão com o banco de dados
require_once "conexao.php";

//Estabelece a conexão
$conexao = conectaBD();

//Definição dos valores para inserção
$cli_nome = "Natalí Alberton Grolli";
$cli_endereco = "Rua Kalamango, 32";
$cli_telefone = "(41) 5555-5555";
$cli_email = "natali_grolli@estudante.sesisenai.org.br";

//Prepara a consulta SQL usando prepare() para evitar SQL injection
$stmt = $conexao->prepare("INSERT INTO cliente (cli_nome, cli_endereco, cli_telefone, cli_email) VALUES (?, ?, ?, ?)");

//Associa os parâmetros aos valores da consulta
//ssss --> Utilizado para proteger de ataques, indica que são 4 dados do tipo string
$stmt->bind_param("ssss", $cli_nome, $cli_endereco, $cli_telefone, $cli_email);

//Executa a inserção
if ($stmt->execute()) {
    echo "Cliente adicionado com sucesso!";
}

else {
    echo "Erro ao adicionar cliente.".$stmt-> error;
}

//Fecha a consulta e a conexão
$stmt->close();
$conexao->close();

?>