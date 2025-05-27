<?php

//INCLUI O ARQUIVO DE CONEXÃO COM O BANCO DE DADOS
require_once('conexao.php');

//OBTÉM OS DADOS ENVIADOS PELO FORMULÁRIO
$evento = $_POST['evento'];
$descricao = $_POST['descricao'];
$imagem = $_FILES['imagem']['tmp_name'];
$tamanho = $_FILES['imagem']['size'];
$tipo = $_FILES['imagem']['type'];
$nome = $_FILES['imagem']['name'];

//VERIFICA SE O ARQUIVO FOI ENVIADO CORRETAMENTE
if (!empty($imagem) && $tamanho > 0) {
    //LÊ O CONTEÚDO DO ARQUIVO
    $fp = fopen($imagem, "rb");
    $conteudo = fread($fp, filesize($imagem));
    fclose($fp);

    //PROTEGE CONTRA PROBLEMAS DE CARACTERES NO SQL
    $conteudo = mysqli_real_escape_string($conexao, $conteudo);

    //INSERE OS DADOS NO BANCO DE DADOS
    $queryInsercao = "INSERT INTO tabela_imagem(evento, descricao, nome_imagem, tamanho_imagem, tipo_imagem, imagem)
                      VALUES ('$evento', '$descricao', '$nome', '$tamanho', '$tipo', '$conteudo')";
    $resultado = mysqli_query($conexao, $queryInsercao);

    //VERIFICA SE A INSERÇÃO FOI BEM SUCEDIDA
    if ($resultado) {
        echo "<script> alert('Registro inserido com sucesso!'); </script>";
        header('Location: index.php');
        exit();
    } else {
        die('Erro: Nenhuma mensagem foi enviada!');
    }
} else {
    echo "<script> alert('Erro: Nenhuma mensagem foi enviada!'); </script>";
}

?>