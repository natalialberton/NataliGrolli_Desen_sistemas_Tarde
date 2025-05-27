<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_clean(); //LIMPA QUALQUER SAÍDA INESPERADA ANTES DO HEADER

//INCLUI O ARQUIVO DE CONEXÃO COM O BANCO DE DADOS
require_once('conexao.php');

//OBTÉM O ID DA IMAGEM DA URL, GARANTINDO QUE SEJA INT
$id_imagem = isset($_GET['id']) ? intval($_GET['id']) : 0;

//CRIA CONSULTA PARA BUSCAR A IMAGEM NO BANCO DE DADOS
$querySelecionaPorCodigo = "SELECT imagem, tipo_imagem FROM tabela_imagem WHERE pk_tabela_imagem = ?";

//USA PREPARED STATEMENT PARA MAIOR SEGURANÇA
$stmt = $conexao-> prepare($querySelecionaPorCodigo);
$stmt-> bind_param("i", $id_imagem);
$stmt-> execute();
$resultado = $stmt-> get_result();

//VERIFICA SE A IMAGEM EXISTE NO BANCO DE DADOS
if ($resultado -> num_rows > 0) {
    $imagem = $resultado-> fetch_object();

    //DEFINE O TIPO CORRETO DA IMAGEM (fallback para JPEG caso esteja vazio)
    $tipo_imagem = !empty($imagem-> tipo_imagem) ? $imagem-> tipo_imagem : "imagem/jpeg";
    header("Content-type: ".$tipo_imagem);

    //EXIBE A IMAGEM ARMAZENADA NO BANCO DE DADOS
    echo $imagem-> imagem;
} else {
    echo "Imagem não encontrada.";
}

//FECHA CONSULTA
$stmt-> close();

?>