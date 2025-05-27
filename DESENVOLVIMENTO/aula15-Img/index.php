<?php

//INCLUI O ARQUIVO DE CONEXÃO COM O BANCO DE DADOS
require_once('conexao.php');

//CRIA A CONSULTA SQL PARA SELECIONAR OS DADOS PRINCIPAIS (SEM A COLUNA IMAGEM)
$querySelecao = "SELECT pk_tabela_imagem, evento, descricao, nome_imagem, tamanho_imagem FROM tabela_imagem";

$resultado = mysqli_query($conexao, $querySelecao);

if(!$resultado) {
    die("Erro na consulta: ".mysqli_error($conexao));
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Armazenamento Imagens no Banco de Dados</title>
</head>
<body>
    <h2>Selecione um novo arquivo de imagem</h2>
    <form enctype="multipart/form-data" action="upload.php" method="POST">
        <input type="hidden" name="MAX_FILE_SIZE" value="99999999">
        <input type="text" name="evento" placeholder="Nome do Evento">
        <input type="text" name="descricao" placeholder="Descrição">
        <input type="file" name="imagem">
        <input type="submit" value="Salvar">
    </form>
    <br><br>

    <table border='1'>
        <tr>
            <td style="align: center;">Código</td>
            <td style="align: center;">Evento</td>
            <td style="align: center;">Descrição</td>
            <td style="align: center;">Nome da Imagem</td>
            <td style="align: center;">Tamanho</td>
            <td style="align: center;">Visualizar Imagem</td>
            <td style="align: center;">Excluir Imagem</td>
        </tr>
        <?php while($arquivos = mysqli_fetch_array($resultado)) { ?>
        <tr>
            <td style="align: center;"><?php echo $arquivos['pk_tabela_imagem'];?></td>
            <td style="align: center;"><?php echo $arquivos['evento'];?></td>
            <td style="align: center;"><?php echo $arquivos['descricao'];?></td>
            <td style="align: center;"><?php echo $arquivos['nome_imagem'];?></td>
            <td style="align: center;"><?php echo $arquivos['tamanho_imagem'];?></td>
            <td style="align: center;">
                <a href="ver_imagem.php?id=<?php echo $arquivos['pk_tabela_imagem'];?>">Ver Imagem</a>
            </td>
            <td style="align: center;">
                <a href="excluir_imagem.php?id=<?php echo $arquivos['pk_tabela_imagem'];?>">Excluir Imagem</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>