<?php

require_once("conexao.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Cliente</title>
</head>
<body>
    <h2>Excluir Cliente</h2>

    <form action="processarDelecao.php" method="POST">
        <label for="pk_cli">ID do Cliente: </label>
        <input type="number" id="pk_cli" name="pk_cli" required>

        <button type="submit">Excluir Cliente</button>
    </form>
</body>
</html>