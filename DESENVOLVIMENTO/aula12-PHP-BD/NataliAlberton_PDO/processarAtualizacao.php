<?php

require_once("conexao.php");

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $conexao = conectarBanco();

    $sql = "UPDATE cliente SET cli_nome, cli_endereco, cli_telefone, cli_email WHERE pk_cli = $pk_cli";

    $stmt = $conexao-> prepare($sql);
    $stmt-> bindParam(":cli_nome", $_POST["cli_nome"]);
    $stmt-> bindParam(":cli_endereco", $_POST["cli_endereco"]);
    $stmt-> bindParam(":cli_telefone", $_POST["cli_telefone"]);
    $stmt-> bindParam(":cli_email", $_POST["cli_email"]);

    try {
        $stmt-> execute();
        echo "Cliente cadastrado com sucesso!";
    } catch (PDOException $e) {
        error_log("Erro ao inserir cliente: ". $e->getMessage());
        echo "Erro ao cadastrar cliente";
    }
}

?>