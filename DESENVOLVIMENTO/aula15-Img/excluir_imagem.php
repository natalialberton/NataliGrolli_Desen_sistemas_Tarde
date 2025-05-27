<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_clean(); //LIMPA QUALQUER SAÍDA INESPERADA ANTES DO HEADER

//INCLUI O ARQUIVO DE CONEXÃO COM O BANCO DE DADOS
require_once('conexao.php');

//OBTÉM O ID DA IMAGEM DA URL, GARANTINDO QUE SEJA INT
$id_imagem = isset($_GET['id']) ? intval($_GET['id']) : 0;

//VERIFICA SE O ID É VÁLIDO (MAIOR QUE 0)
if ($id_imagem > 0) {
    //CRIA A QUERY SEGURA USANDO O PREPARED STATEMENT
    $queryExclusao = "DELETE FROM tabela_imagem WHERE pk_tabela_imagem = ?";

    //PREPARA A QUERY
    $stmt = $conexao-> prepare($queryExclusao);
    $stmt-> bind_param("i", $id_imagem); //DEFINE O ID COMO UM INTEIRO
    
    //EXECUTA A EXCLUSÃO
    if ($stmt-> execute()) {
        echo "Imagem excluída com sucesso!";
    } else {
        die("Erro ao excluir a imagem: ".$stmt-> error);
    }

    $stmt-> close();
} else {
    echo "ID inválido!";
}

//REDIRECIONA PARA A INDEX.PHP E GARANTE QUE O SCRIPT PARE
header("Location: index.php");
exit();

?>