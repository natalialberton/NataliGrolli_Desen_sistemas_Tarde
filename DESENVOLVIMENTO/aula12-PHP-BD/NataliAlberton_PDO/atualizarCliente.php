<?php

require_once("conexao.php");

$conexao = conectarBanco();

$pk_cli = $_GET["pk_cli"]??null;
$cliente = null;
$msgErro = null;

function buscarClientePorId($pk_cli, $conexao) {
    $stmt = $conexao->prepare("SELECT pk_cli, cli_nome, cli_endereco, cli_telefone, cli_email FROM cliente WHERE pk_cli = :pk_cli");
    $stmt->bindParam(":pk_cli", $pk_cli, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt-> fetch();
}

if($pk_cli && is_numeric($pk_cli)) {
    $cliente = buscarClientePorId($pk_cli, $conexao);

    if(!$cliente) {
        $msgErro = "Erro: Cliente não encontrado.";
    }
} else {
    $msgErro = "Digite o ID do cliente para buscar os dados.";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Cliente</title>
    <script>
        function habilitarEdicao(campo) {
            document.getElementById(campo).removeAttribute("readonly");
        }
    </script>
</head>
<body>
    <h2>Atualização de Cliente</h2>
    <?php if($msgErro):?>
        <p style="color:red;"><?=htmlspecialchars($msgErro); ?></p>

        <form action="processarAtualizacao.php" method="GET">
            <label for="pk_cliente">ID do Cliente: </label>
            <input type="text" id="pk_cli" name="pk_cli" required>
            <button type="submit">Buscar</button>
        </form>

    <?php else: ?>
        <form action="processarAtualizacao.php" method="POST">
            <input type="hidden" name="pk_cli" value="<?=htmlspecialchars($cliente['pk_cli'])?>">
            
            <label for="cli_nome">Nome: </label>
            <input type="text" name="cli_nome" id="cli_nome" value="<?=htmlspecialchars($cliente['cli_nome'])?>" readonly onclick="habilitarEdicao('cli_nome')">
            
            <label for="cli_endereco">Endereço: </label>
            <input type="text" name="cli_endereco" id="cli_endereco" value="<?=htmlspecialchars($cliente['cli_endereco'])?>" readonly onclick="habilitarEdicao('cli_endereco')">
            
            <label for="cli_telefone">Telefone: </label>
            <input type="text" name="cli_telefone" id="cli_telefone" value="<?=htmlspecialchars($cliente['cli_telefone'])?>" readonly onclick="habilitarEdicao('cli_telefone')">
            
            <label for="cli_email">Email: </label>
            <input type="email" name="cli_email" id="cli_email" value="<?=htmlspecialchars($cliente['cli_email'])?>" readonly onclick="habilitarEdicao('cli_email')">
            
            <button type="submit">Atualizar</button>
        </form>
    <?php endif; ?>
</body>
</html>