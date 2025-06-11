<?php

require_once 'config.php';

if(!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

$pdo = conectarBanco();

?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <style>
        body {
            font-family: Arial;
        }

        .header {
            background: #333;
            color: white;
            padding: 10px;
        }

        .menu {
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Bem-vindo, <?=htmlspecialchars($_SESSION['usuario_nome'])?></h1>
        <a href="logout.php">Sair</a>
    </div>
    <div class="menu">
        <a href="relatorio.php">Gerar Relatório PDF</a>
        <h2>Lista de Produtos</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Estoque</th>
                <th>Valor Unitário</th>
            </tr>
            <?php
                $stmt = $pdo-> query("SELECT * FROM produto");
                while($produto = $stmt-> fetch(PDO::FETCH_ASSOC)):
            ?>
            <tr>
                <td><?= $produto['id_produto'] ?></td>
                <td><?= htmlspecialchars($produto['nome_prod']) ?></td>
                <td><?= htmlspecialchars($produto['descricao']) ?></td>
                <td><?= htmlspecialchars($produto['qtde']) ?></td>
                <td><?= number_format($produto['valor_unit'], 2, ',', '.') ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>