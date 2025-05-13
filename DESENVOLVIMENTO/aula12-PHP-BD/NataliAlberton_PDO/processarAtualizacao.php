<?php

require_once("conexao.php");

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $conexao = conectarBanco();

    //filter_var --> verifica se os caracteres da variável são válidos
    //FILTER_SANITIZE_NUMBER_INT --> remove caracteres não numéricos
    //FILTER_VALIDATE_EMAIL --> checando se o email é válido (usuario@dominio.com)
    $pk_cli = filter_var($_POST['pk_cli'],FILTER_SANITIZE_NUMBER_INT);
    $cli_nome = htmlspecialchars(trim($_POST["cli_nome"]));
    $cli_endereco = htmlspecialchars(trim($_POST["cli_endereco"]));
    $cli_telefone = htmlspecialchars(trim($_POST["cli_telefone"]));
    $cli_email = filter_var($_POST["cli_email"],FILTER_VALIDATE_EMAIL);

    if(!$pk_cli || !$cli_email) {
        die("Error: ID inválido ou email incorreto.");
    }

    $sql = "UPDATE cliente SET cli_nome=:cli_nome, cli_endereco=:cli_endereco, cli_telefone=:cli_telefone, cli_email=:cli_email WHERE pk_cli=:pk_cli";

    $stmt = $conexao-> prepare($sql);
    $stmt->bindParam(":pk_cli", $pk_cli, PDO::PARAM_INT);
    $stmt->bindParam(":cli_nome", $cli_nome);
    $stmt->bindParam(":cli_endereco", $cli_endereco);
    $stmt->bindParam(":cli_telefone", $cli_telefone);
    $stmt->bindParam(":cli_email", $cli_email);

    try {
        $stmt-> execute();
        echo "Cliente atualizado com sucesso!";
    } catch(PDOException $e) {
        error_log("Erro ao atualizar cliente: ".$e->getMessage());
        echo "Erro ao atualizar registro";
    }
}

?>