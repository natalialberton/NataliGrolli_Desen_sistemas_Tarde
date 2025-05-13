<?php

require_once("conexao.php");

$conexao = conectarBanco();

$busca = $_GET['busca']??null;

if(!$busca) { ?>

    <form action="pesquisarCliente.php" method="GET">
        <label for="busca">Digite o ID ou Nome:</label>
        <input type="text" id="busca" name="busca" required>
        <button type="submit">Pesquisar</button>
    </form>

<?php
    exit;
} 

//Escolha entre busca por ID ou Nome e faz a consulta diretamente
if(is_numeric($busca)) {
    $stmt=$conexao-> prepare("SELECT pk_cli, cli_nome, cli_endereco, cli_telefone, cli_email FROM cliente WHERE pk_cli=:pk_cli");
    $stmt-> bindParam(":pk_cli", $busca, PDO::PARAM_INT);
} else {
    $stmt = $conexao-> prepare("SELECT pk_cli, cli_nome, cli_endereco, cli_telefone, cli_email FROM cliente WHERE cli_nome LIKE :cli_nome");
    $buscaNome = "%$busca%";
    $stmt-> bindParam(":cli_nome", $buscaNome, PDO::PARAM_STR);
}

$stmt-> execute();
$clientes = $stmt-> fetchAll();

if(!$clientes) {
    die("Erro: Nenhum cliente encontrado.");
} 

?>

<table border="2">
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