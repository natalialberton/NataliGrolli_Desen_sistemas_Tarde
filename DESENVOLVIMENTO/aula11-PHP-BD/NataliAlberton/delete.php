<?php

//Inclui o arquivo de conexão com o banco de dados
require_once "conexao.php";

//Estabelece a conexão
$conexao = conectaBD();

//Define o ID do cliente que será excluído
$pk_cli = 2;

//Prepara a consulta SQL segura
$stmt = $conexao-> prepare("DELETE FROM cliente WHERE pk_cli=?");

//Associa os parâmetros aos valores da consulta
$stmt-> bind_param("i", $pk_cli);

//Executa a inserção
if ($stmt->execute()) {
    echo "Cliente deletado com sucesso!";
}

else {
    echo "Erro ao deletar dados do cliente.".$stmt-> error;
}

//Fecha a consulta e a conexão
$stmt->close();
$conexao->close();

?>