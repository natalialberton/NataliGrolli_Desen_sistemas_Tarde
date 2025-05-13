<?php

require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $conexao = conectarBanco();

    $pk_cli = filter_var($_POST["pk_cli"],FILTER_SANITIZE_NUMBER_INT);

    if(!$pk_cli) {
        die("Erro: ID inválido.");
    }

    $sql = "DELETE FROM cliente WHERE pk_cli=:pk_cli";
    $stmt = $conexao-> prepare($sql);
    $stmt-> bindParam(":pk_cli", $pk_cli, PDO::PARAM_INT);

    try {
        $stmt-> execute();
        echo "Cliente excluído com sucesso";
    } catch(PDOException $e) {
        error_log("Erro ao excluir cliente: ".$e->getMessage());
        echo "Erro ao excluir cliente.";
    }

}



?>