<?php

//Inclui o arquivo de conexão com o banco de dados
require_once "conexao.php";

//Estabelece a conexão
$conexao = conectaBD();

//Define novos valores
$cli_nome = "Carlos Souza";             //Carlos Souza
$cli_endereco = "Rua XV de Novembro, 50 - Curitiba/PR";      //Rua XV de Novembro, 50 - Curitiba/PR
$cli_telefone = "(41) 99876-5432";         //(41) 99876-5432
$cli_email = "carlos.souza@email.com";   //carlos.souza@email.com

//Define o ID do cliente a ser atualizado
$pk_cli = 3;

//Prepara a consulta SQL segura
$stmt = $conexao-> prepare("UPDATE cliente SET cli_nome=?, cli_endereco=?, cli_telefone=?, cli_email=? WHERE pk_cli=?");

//Associa os parâmetros aos valores da consulta
$stmt-> bind_param("ssssi", $cli_nome, $cli_endereco, $cli_telefone, $cli_email, $pk_cli);

//Executa a inserção
if ($stmt->execute()) {
    echo "Cliente alterado com sucesso!";
}

else {
    echo "Erro ao alterar dados do cliente.".$stmt-> error;
}

//Fecha a consulta e a conexão
$stmt->close();
$conexao->close();

?>