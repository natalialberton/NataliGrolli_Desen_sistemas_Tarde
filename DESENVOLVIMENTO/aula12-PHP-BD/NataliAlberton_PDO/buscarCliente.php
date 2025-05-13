<?php

require_once("conexao.php");

$conexao = conectarBanco();

//Consulta todos os clientes do banco
//Ordena por nome para melhor visualização
$sql = "SELECT pk_cli, cli_nome, cli_endereco, cli_telefone, cli_email FROM cliente ORDER BY cli_nome ASC";
$stmt = $conexao-> prepare($sql);
$stmt-> execute();
$clientes = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Clientes</title>
</head>
<body>
    <h2>Todos os Clientes Cadastrados</h2>
    <?php if(!$clientes): ?>
        <p style="red">Nenhum cliente encontrado no banco de dados.</p>
    
    <?php else:?>
        <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Ação</th>
        </tr>
        <?php foreach($clientes as $cliente): ?>
            <tr>
                <td><?=htmlspecialchars($cliente['pk_cli'])?></td>
                <td><?=htmlspecialchars($cliente['cli_nome'])?></td>
                <td><?=htmlspecialchars($cliente['cli_endereco'])?></td>
                <td><?=htmlspecialchars($cliente['cli_telefone'])?></td>
                <td><?=htmlspecialchars($cliente['cli_email'])?></td>
                <td>
                    <a href="atualizarCliente.php?pk_cli=<?=$cliente['pk_cli']?>">Editar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>